//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;

var gumStream; 						//stream from getUserMedia()
var rec; 							//Recorder.js object
var input; 							//MediaStreamAudioSourceNode we'll be recording

// shim for AudioContext when it's not avb. 
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext //audio context to help us record

var recordButton = document.getElementById("recordButton");
var stopButton = document.getElementById("stopButton");
var pauseButton = document.getElementById("pauseButton");

//add events to those 2 buttons
recordButton.addEventListener("click", startRecording);
stopButton.addEventListener("click", stopRecording);
pauseButton.addEventListener("click", pauseRecording);

function startRecording() {
	console.log("recordButton clicked");

	/*
		Simple constraints object, for more advanced audio features see
		https://addpipe.com/blog/audio-constraints-getusermedia/
	*/
    
    var constraints = { audio: true, video:false }

 	/*
    	Disable the record button until we get a success or fail from getUserMedia() 
	*/

	recordButton.disabled = true;
	stopButton.disabled = false;
	pauseButton.disabled = false

	/*
    	We're using the standard promise based getUserMedia() 
    	https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
	*/

	navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
		console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

		/*
			create an audio context after getUserMedia is called
			sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
			the sampleRate defaults to the one set in your OS for your playback device

		*/
		audioContext = new AudioContext();

		//update the format 
		document.getElementById("formats").innerHTML="Format: 1 channel pcm @ "+audioContext.sampleRate/1000+"kHz"

		/*  assign to gumStream for later use  */
		gumStream = stream;
		
		/* use the stream */
		input = audioContext.createMediaStreamSource(stream);

		/* 
			Create the Recorder object and configure to record mono sound (1 channel)
			Recording 2 channels  will double the file size
		*/
		rec = new Recorder(input,{numChannels:1})

		//start the recording process
		rec.record()
		 
		timer();
        console.log("timer started");

		console.log("Recording started...");
        document.getElementById("demo").innerHTML = "<b>" + "Recording Started.." + "</b>";
		
	 
		
	}).catch(function(err) {
	  	//enable the record button if getUserMedia() fails
    	recordButton.disabled = false;
    	stopButton.disabled = true;
    	pauseButton.disabled = true
	});
}

function pauseRecording(){
	console.log("pauseButton clicked rec.recording=",rec.recording );
	
	//stop the timer
	 
    clearTimeout(t);
   
	
	document.getElementById("demo").innerHTML = "<b>" + "Recording paused.." + "</b>";
	
	if (rec.recording){
		//pause
		rec.stop();
		pauseButton.innerHTML="Resume";
	}else{
		//resume
		rec.record()
		pauseButton.innerHTML="Pause";
			document.getElementById("demo").innerHTML = "<b>" + "Recording resumed.." + "</b>";
		timer();
		 
	}
}

function stopRecording() {
	console.log("stopButton clicked");
	 

	//disable the stop button, enable the record too allow for new recordings
	stopButton.disabled = true;
	recordButton.disabled = false;
	pauseButton.disabled = true;

	//reset button just in case the recording is stopped while paused
	pauseButton.innerHTML="Pause";
	
	//tell the recorder to stop the recording
	rec.stop();
    document.getElementById("demo").innerHTML = "<b>" + "Recording Stopped :" + "</b>";
	
	//stop the timer
	 
    clearTimeout(t);
   
	
	//stop microphone access
	gumStream.getAudioTracks()[0].stop();

	rec.exportWAV(createDownloadLink);
}

function createDownloadLink(blob) {
	 var clipName = prompt('Enter a name for your sound clip?','My unnamed clip');
	 var clipLabel = document.createElement('p');
	 
	 if(clipName === null) {
        clipLabel.textContent = 'My unnamed clip';
      } else {
        clipLabel.textContent = clipName;
      }
	 console.log(clipName);
     var uploadButton = document.createElement('button');
	 uploadButton.className = 'uploadbut';
	  
 
	var url = URL.createObjectURL(blob);
	var au = document.createElement('audio');
	var li = document.createElement('li');
	var link = document.createElement('a');
	 

	//name of .wav file to use during upload and download (without extendion)
	var filename = new Date().toISOString();

	//add controls to the <audio> element.
	au.controls = true;
	au.src = url;

	//save to device link 
	link.href = url;
	link.download = filename+".wav"; //download forces the browser to donwload the file using the  filename
	link.innerHTML = "Save to device";


	//add the new audio element to li
 
	li.appendChild(au);
	
	//add the filename to the li
	//li.appendChild(saveButton);
	li.appendChild(document.createTextNode(clipName + " "));
	
	//add the save to disk link to li
	//li.appendChild(link);
	 
	li.appendChild(link);
	li.appendChild(uploadButton);
	
	//upload link
	 
	var upload = document.createElement('a');
	 	
	uploadButton.appendChild(upload);
	uploadButton.href="#";
	uploadButton.innerHTML = "Share";
	uploadButton.addEventListener("click", function(event){
		  var xhr=new XMLHttpRequest();
		  xhr.onload=function(e) {
		      if(this.readyState === 4) {
		          console.log("Server returned: ",e.target.responseText);
				  
				  //Get Info from php - start
				   var filid = e.target.responseText; 
				   var js_fileout1 = filid.trim();
				   var js_fileout = js_fileout1 + ".html";
						// Get File name created by PHP
				   var audiourl = "https://www.formrecorder.com/uploads/" + js_fileout;		 
					console.log("audiourl......");	  
					console.log(audiourl);
						var texturl = '<a href="'+ audiourl +'"target=_blank>Audio URL</a>';
						var urlinfo = "File :" + clipName + "<br>" + "uploaded to.. "+ texturl;
						var mydiv = document.getElementById("audio");
                        var div = document.createElement("div");
  mydiv.appendChild(div);
  div.className ="dynamicDiv";
  div.innerHTML = urlinfo;
  
  console.log("About to populate share" + audiourl);  
  shareurl.style.display = "block";
  document.getElementById("shareurl").value = audiourl;   
  
 //This has been commented out as now we are dispalying the URL in popup box using modal
 // div.innerHTML = urlinfo + "<p>" + "<input class='form-control' style='background-color:#04089F; color: white' type='text'  name='mytext' onfocus = 'this.select()' onmouseup = 'return false' value=" + audiourl +" />"
 //                  + "<p>" + "<i>Click on the above text box to select the Audio URL and feel free to share it!!!</i>" + "<p>"
 //				   "<button onclick='myFunction()'>Copy text</button>";


// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
 
    modal.style.display = "block";
    document.getElementById("myInput").value = audiourl;   
     

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

 
// When the user clicks anywhere outside of the modal, close it
//window.onclick = function(event) {
//    if (event.target == modal) {
//        modal.style.display = "none";
//    }
//}
 
 
 
  //	 commented out because Simplerecorder does not need it. Instead need to populate ShareURL form			   
 //  document.getElementById("AudioURL").value = audiourl;		
   
    
   			  
				   console.log("calling audio player");	
				
				var d= new Date();
				var dispmm = d.getMonth() + 1;
				var dispdd = d.getDate();
				var dispyy = d.getFullYear();
				var dispmmddyyyy = dispmm + "/" + dispdd + "/" + dispyy;
				
				  var filhtml = js_fileout;
				  var filwav = js_fileout1 + ".wav";
				  $.ajax({ url: 'audioplayer.php',
								data: {filwav,filhtml,clipName, dispmmddyyyy},
								type: 'post',
									success: function(output) {
				//					alert(output);
				    				}
					});
					console.log("Endaudio player");	 
					//we are doing this to get the last occurence of the button
					var d1 =  document.getElementsByClassName("uploadbut").length;
					var e1 = d1-1;
					document.getElementsByClassName("uploadbut")[e1].disabled = true;
				
				$.ajax({ url: 'append-upload-xml.php',
								data: {filhtml,clipName, dispmmddyyyy},
								type: 'post',
									success: function(output) {
				//					alert(output);
				    				}
					});
					console.log("uploaded xml info");	
					
				  
		      }
		  };
		  var fd=new FormData();
		  fd.append("audio_data",blob, filename);
		  xhr.open("POST","simplerecorder.php",true);
		  xhr.send(fd);
	})
	 
	recordingsList.appendChild(li);
}

//Timer code - starts

var h1 = document.getElementsByTagName('h4')[0],
     
    seconds = 0, minutes = 0, hours = 0,
    t;

function add() {
    seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
    
    h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

    timer();
}
function timer() {
	
    t = setTimeout(add, 1000);
}
 
//Timer code - ends

// Function for Copy Text button
function copyFunction(){
    var copyText = document.getElementById("myInput");
    copyText.select();
    document.execCommand("copy");
   
   
   };

 