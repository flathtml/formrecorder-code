<?php
$formname = $_POST["Formname"];
$email = $_POST["Email"];
$yourname = $_POST["yourname"];
$sheetapi = $_POST["SheetAPI"];
$sheeturl = $_POST["SheetURL"];
 

$header1 = ' 
     
<!DOCTYPE html>
<html>
<title>Record Audio and share it instantly via a link</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
   
	  <!//https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css !>
      <link rel="stylesheet" href="references/bootstrap.min.css">
   
      <!//https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js !>
	  <script src="references/bootstrap.min.js"></script>
	  
	  <!//https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js !>
	  <script src="references/jquery.min.js"></script>
	 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
	  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<!--  <link rel="stylesheet" type="text/css" href="simplerecorder.css">-->
	<!--https://addpipe.com/simple-recorderjs-demo/style.css-->
<Style>
 .navbar .navbar-nav {
    display: inline-block;
    float: none;
}
 .navbar .navbar-collapse {
    text-align: left;
}
 

 .footer {
    text-align: center;
}

 .padding {
    padding-left: 3%;
    padding-right: 3%;
    padding-top: 3%;
    padding-bottom: 3%;
    text-align: justify;
}
  
 .top {
    position: relative;
    background-color: #EAEDED;
	border: 1px solid green;
    height: 68px;
    padding-top: 20px;
    line-height: 50px;
    overflow: hidden;
    z-index: 1;
}
.w3-right {
    float: right!important}
	
.w3-wide {
    letter-spacing: 2px;
	color: #922B21;}
 .w3schools-logo {
    font-family: Pacifico;
    text-decoration: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 37px;
    letter-spacing: 3px;
    color: #480BF7;
    display: block;
    position: absolute;
    top: 17px;
    padding-left: 2px;
}
.w3schools-logo .dotcom {
    color: #F70B2B;
}
.w3schools-logo:hover {
   
	text-decoration: none;
}

@media (max-width: 992px) {
    .top {
    height: 100px;
}
 .top .w3schools-logo {
    position: relative;
    top: 0;
    width: 100%;
    text-align: center;
    margin: auto;
}
 .toptext {
    width: 100%;
    text-align: center;
}
 }
  
  
 
 button {
  padding : 10px;
  background: #F91506;
  color:#ffffff;
  font-weight: bold;
}
 
button:active {
 background: #F91506;
}
button:disabled {
  pointer-events: none;
  background:grey;
}
button:first-child {
  margin-left: 0;
}
  
  button.uploadbut {
  background: #16FA41;
  padding: 0.5rem 0.75rem;
  font-size: 0.8rem;
  color:black;
}

button.uploadbut:disabled {
  pointer-events: none;
  background: #444242;
  color:#ffffff;
}

 
  
audio {
  display: block;
  width: 100%;
  margin-top: 0.2rem;
}
li {
  list-style: none;
  margin-bottom: 1rem;
}
#formats {
  margin-top: 0.5rem;
  font-size: 80%;
}
 

	 
	
	h3.title{
	  background-color:#A6DEF6;
	}
	
	div.timer{
	  color:#06F915;
	  background-color:black;
	  padding : 5px;
	}
	
	div.formats{
	display:hide;
	color:lightblue;
	}
	
	
	</style>
	<style>
 

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 800px;
    max-width: 100%;
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
     
}

/* Modal Content */
.modal-content {
    background-color: #DDDDD6;
    margin: auto;
    padding: 20px;
    border: 2px solid blue;
    width: 70%;
}

/* The Close Button */
.close {
    position: absolute;
  
  /* donot need to go crazy with z-index here, just sits over .modal-guts */
  z-index: 1;
  
  top: 10px;
  
  /* needs to look OK with or without scrollbar */
  right: 20px;
  
  border: 0;
  background: black;
  color: white;
  padding: 5px 10px;
  font-size: 1.3rem;
     
}

 
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

button.copytext {
  background: green;
  padding: 0.5rem 0.75rem;
  font-size: 0.8rem;
  color:white;
  width: 100px;
  max-width: 100%;
  text-align:center;
}
</style>
</head>
<body>
 
<div class="container-fluid">
 

    <div class="row">&nbsp;</div>
   <div class="top">
     
      <a class="w3schools-logo" href="index.html">&nbsp;Form<span class="dotcom">Recorder&nbsp;</span></a>
      <div class="w3-right  toptext w3-wide ">Record Audio via Google Form&nbsp;&nbsp;</div>
   </div>
     <div>&nbsp;</div>
   <div align="center"><a href="simplerecorder.html">Simple Audio Recorder</a></div>
     <div>&nbsp;</div>
   <div class="col-md-12 shadow p-4 mb-4 border border-primary" style="background-color:pink">
     <b>PLEASE NOTE :</b>&nbsp;Currently this app does not work in Facebook browser. In case you have opened this via Facebook then you can tap on the three dots at the top right section and a popup window will open up where in you can choose to open it in Chrome. For iphone users, you can open in safari.
   
   </div>
   <div>&nbsp;</div>
   <div class="col-md-12 shadow p-4 mb-4 border border-primary">
 <h5>Welcome to Form Recorder. It is a Customized Google form through which the user can record the audio and submit it via the form.</h5>
<p>&nbsp;</p>
<p>
STEP-1 : Record the Audio and Upload it.The Uploaded URL will be populated in the form</p>

<p>
STEP-2 : Complete the Audio form details and  click on SUBMIT button.</p>
<p>
Once the above two steps are completed then the Audio form details along with audio URL are sent
to the Google sheet attached to the customized audio form.</p>
</div>
  <div>&nbsp;</div>
   <div class="col-md-12 shadow p-4 mb-4 border border-primary" style="background-color:lightblue">
    
	<div>&nbsp;</div>
	 
      <div id="controls" align="center">
  	 <button id="recordButton">Record</button>
  	 <button id="pauseButton" disabled>Pause</button>
  	 <button id="stopButton" disabled>Stop</button>
 
	  
    </div>
	<div>&nbsp;</div>
	 
	<div id="timer" class="timer" align="center">Recording Timer :<h4><time>00:00:00</time></h4></div> 
	 <div>&nbsp;</div>
  	<ol id="recordingsList"></ol>
    <div>&nbsp;</div>
	<section class="sound-clips" align="center">
	<div>&nbsp;</div>
	<div id="demo" class="status"></div>
	<div>&nbsp;</div>
	<div id ="audio" class="info"></div>

	<div id="myModal" class="modal">
    <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
          <div>&nbsp;</div>
            <i>Link to your Recorded Audio URL</i>
          <div>&nbsp;</div>
           <input type="text" value="https://www.formrecorder.com" id="myInput"><div>&nbsp;</div>
          <div style="text-align: center;"><button onclick="copyFunction()" id ="main" class="copytext">Copy URL </button></div>
      </div>
    </div>
 
    <div id="formats" class="formats"></div>
  	 	  
	</div>
		<div>&nbsp;</div>
	 <div class="col-md-12 shadow p-4 mb-4 border border-primary" style="background-color:pink">
<h3 align="center">'.$formname.'</h3>
  <form name="contact"> 
  
    <div class="form-group">
      <label for="AudioURL">Audio URL</label>
      <input type="text" name="AudioURL" class="form-control" id="AudioURL"  required>
    </div>
	
    <div class="form-group">
      <label for="FirstName">First Name</label>
      <input type="text" name="FirstName" class="form-control" id="FirstName" required>
    </div>
	
	<div class="form-group">
      <label for="LastName">Last Name</label>
      <input type="text" name="LastName" class="form-control" id="LastName" required>
    </div>
     
    <div class="form-group">
      <label for="Grade">Grade</label>
      <input type="text" name="Grade" class="form-control" id="Grade"  required>
    </div>
	 
	
	<div class="form-group">
      <label for="Notes">Notes</label>
      <input type="text" name="Notes" class="form-control" id="Notes">
    </div>
    
     <button type="submit">SUBMIT</button>  
      <p>&nbsp;</p>
     </form>
    
	<script>     
  const scriptURL = "'.$sheetapi.'"
  const form = document.forms["contact"]  
  form.addEventListener("submit", e => {  
   e.preventDefault()  
   fetch(scriptURL, { method: "POST", body: new FormData(form)})  
  //  .then(response => console.log("Successmmm!", response))  
  //  .catch(error => console.error("Error!", error.message))  
      .then(response => success())  
      .catch(error => console.error("Error!", error.message))  
  })  
  function success() {
  document.getElementById("status1").innerHTML = "Form Submitted to Google sheet."; 
   
   clear();
 
  }
  
  function clear () {
   
  }
  
  $(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
});
 </script> 
 </div>
 <p>&nbsp;</p>
  
<p id="status1"></p>
<div class="col-md-12 shadow p-4 mb-4 border border-primary" style="background-color:lightblue">
	 
	  PLEASE NOTE : The above form is just a demo form. The form layout, fields and other behaviors can be customized based on your needs
	   If you need further help or have any questions then please <a href="contact.html">Contact us</a>
   
	  </div> 

     </div>
      
	  
     </div>
 
	</div>
	 
    <!-- inserting these scripts at the end to be able to use all the elements in the DOM -->
  	<!--<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>-->
	<script src="simplerecorder2.js"></script>
	
  	<!--<script src="js/app.js"></script>-->
	<!--<script src="https://addpipe.com/simple-recorderjs-demo/js/app.js"></script>-->
	<script src="simplerecorder1.js"></script>
   <div class="row">
       
      <div class="col-md-12">
         <div class="footer">&copy;2018 Formrecorder.com&nbsp;&nbsp;<a href="privacypolicy.html">Privacy Policy</a></div>
         <div class="row">&nbsp;</div>
      </div>
   </div>
   
 
 
</body>
</html>';

		 
$content3 = $header1;
define('UPLOAD_DIR', 'forms/');
$filhtml = rand();
$formfile = UPLOAD_DIR .'form-'.$filhtml.'.html';
file_put_contents($formfile,$content3);

echo $formfile. ' created';


$formurl = 'https://www.formrecorder.com/'.$formfile; 
 

$header4 = '     
<!DOCTYPE html>
<html>
<title>Record Audio and share it instantly via a link</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	
<Style>
 .navbar .navbar-nav {
    display: inline-block;
    float: none;
}
 .navbar .navbar-collapse {
    text-align: left;
}
 

 .footer {
    text-align: center;
}

 .padding {
    padding-left: 3%;
    padding-right: 3%;
    padding-top: 3%;
    padding-bottom: 3%;
    text-align: justify;
}
  
 .top {
    position: relative;
    background-color: #EAEDED;
	border: 1px solid green;
    height: 68px;
    padding-top: 20px;
    line-height: 50px;
    overflow: hidden;
    z-index: 1;
}
.w3-right {
    float: right!important}
	
.w3-wide {
    letter-spacing: 2px;
	color: #922B21;}
 .w3schools-logo {
    font-family: Pacifico;
    text-decoration: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 37px;
    letter-spacing: 3px;
    color: #480BF7;
    display: block;
    position: absolute;
    top: 17px;
    padding-left: 2px;
}
.w3schools-logo .dotcom {
    color: #F70B2B;
}
.w3schools-logo:hover {
   
	text-decoration: none;
}

@media (max-width: 992px) {
    .top {
    height: 100px;
}
 .top .w3schools-logo {
    position: relative;
    top: 0;
    width: 100%;
    text-align: center;
    margin: auto;
}
 .toptext {
    width: 100%;
    text-align: center;
}
 }
  
  
 
 button {
  padding : 10px;
  background: #F91506;
  color:#ffffff;
  font-weight: bold;
}
 
button:active {
 background: #F91506;
}
button:disabled {
  pointer-events: none;
  background: #444242;
}
button:first-child {
  margin-left: 0;
}
  
  button.upload {
  background: #16FA41;
  padding: 0.5rem 0.75rem;
  font-size: 0.8rem;
  color:black;
}
  
audio {
  display: block;
  width: 100%;
  margin-top: 0.2rem;
}
li {
  list-style: none;
  margin-bottom: 1rem;
}
#formats {
  margin-top: 0.5rem;
  font-size: 80%;
}
 

	 
	
	h3.title{
	  background-color:#A6DEF6;
	}
	
	div.timer{
	  color:#06F915;
	  background-color:black;
	  padding : 5px;
	}
	
	div.formats{
	display:hide;
	color:lightblue;
	}
	
	
	</style>
</head>
<body>
 
<div class="container-fluid">
 

    <div class="row">&nbsp;</div>
   <div class="top">
     
      <a class="w3schools-logo" href="https://www.formrecorder.com/">&nbsp;Form<span class="dotcom">Recorder&nbsp;</span></a>
      <div class="w3-right  toptext w3-wide ">Record Audio via Google Form&nbsp;&nbsp;</div>
   </div>
     <div>&nbsp;</div>
   <div align="center"><a href="https://www.formrecorder.com/simplerecorder.html"target=_blank><b>Simple Recorder</b> : Record Audio and Share Instantly</a></div>
     <div>&nbsp;</div>
   <div class="col-md-12 shadow p-4 mb-4 border border-primary" style="background-color:pink">
     <div style="padding:4px 0">
	 <h6>FORM NAME :'.$formname. '</h6>
	 <h6><a href="'.$formurl.'"target=_blank><h6>Customized Google form:</h6>
	 <h6><a href="'.$sheeturl.'"target=_blank><h6>Google Form Tracker</h6>
	 	 </div>
     
    
      <div class="col-md-12">
         <div class="footer">&copy;2018 Formrecorder.com</div>
         <div class="row">&nbsp;</div>
      </div>
   </div>
   
 
 
</body>
</html>';

$content4 = $header4;
define('UPLOAD_DIR', 'forms/');
$trackerfile = UPLOAD_DIR .'tracker-'.$filhtml.'.html';
file_put_contents($trackerfile,$content4);

$trackerurl = 'https://www.formrecorder.com/'.$trackerfile;  


$xmldoc = new DomDocument( '1.0' );
$xmldoc->preserveWhiteSpace = false;
$xmldoc->formatOutput = true;

if( $xml = file_get_contents( 'form-info.xml') ) {
    $xmldoc->loadXML( $xml, LIBXML_NOBLANKS );

    // find the headercontent tag
    $root = $xmldoc->getElementsByTagName('headercontent')->item(0);

    // create the <form> tag
    $form = $xmldoc->createElement('form');
     

    // add the upload tag before the first element in the <headercontent> tag
    $root->insertBefore( $form, $root->firstChild );

    // create other elements and add it to the <form> tag.
    $formnameElement = $xmldoc->createElement('formname');
    $form->appendChild($formnameElement);
    $formnameText = $xmldoc->createTextNode($formname);
    $formnameElement->appendChild($formnameText);
	
	$emailElement = $xmldoc->createElement('email');
    $form->appendChild($emailElement);
    $emailText = $xmldoc->createTextNode($email);
    $emailElement->appendChild($emailText);

	$formlinkElement = $xmldoc->createElement('formlink');
    $form->appendChild($formlinkElement);
    $formlinkText = $xmldoc->createTextNode($formurl);
    $formlinkElement->appendChild($formlinkText);
	
	$sheetlinkElement = $xmldoc->createElement('sheetlink');
    $form->appendChild($sheetlinkElement);
    $sheetlinkText = $xmldoc->createTextNode($trackerurl);
    $sheetlinkElement->appendChild($sheetlinkText);
     
    $xmldoc->save('form-info.xml');

	}


require 'C:\xampp\htdocs\FORMRECORDER\gmail-smtp\PHPMailer\class.phpmailer.php';
require 'C:\xampp\htdocs\FORMRECORDER\gmail-smtp\PHPMailer\class.smtp.php';
 
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "gator3264.hostgator.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);              // SMTP username
    	
$mail->Username = 'dan@formrecorder.com';                 // SMTP username
$mail->Password = 'october2018';                           // SMTP password

 //Recipients
 
$mail->setFrom('dan@formrecorder.com', 'Formrecorder');
$mail->addAddress($email, $yourname);     // Add a recipient
$mail->Subject  = 'Formrecorder : Your Customized Google Form';


$mail->Body     = '<h3>Hi!&nbsp;'.$yourname.'&nbsp;</h3>'
                  .'<h3>Following is your customized Google Form</h3>'
				  .'<h3>'.$formurl. '</h3>'
				  .'<h3>Following is your Form Tracker</h3>'
				  .'<h3>'.$trackerurl. '</h3>'
				  .'<h3>Thanks for using Formrecorder.</h3>';
    
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
 
echo "<script> location.href='https://www.formrecorder.com/formconfirmation.html'; </script>"; 
		    
?>