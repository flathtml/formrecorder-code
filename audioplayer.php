<?php
$filwav = $_POST["filwav"];
$filhtml = $_POST["filhtml"];
$filname = $_POST["clipName"];
$dispmmddyyyy = $_POST["dispmmddyyyy"];
 

$header1 = '     
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
	 <h6>AUDIO CLIP NAME :';
	 
$header2 = '</h6>
	 <h6>DATE RECORDED :'.$dispmmddyyyy.'</h6>
	 	 </div>
    <div>
      <div class="mediaContainer" style="width:220px"><audio id="mwe_player_0" controls="" preload="none" style="width:220px" class="kskin" data-durationhint="255.12925170068" data-startoffset="0" data-mwtitle="1914_-_Edison_Light_Opera_Company_-_Favorite_airs_from_The_Mikado_(restored).ogg" data-mwprovider="wikimediacommons">
	  <source src="'.$filwav.'" type="audio/wav; codecs="vorbis"" data-title="Original Ogg file (119 kbps)" data-shorttitle="Ogg source" data-width="0" data-height="0" data-bandwidth="118859" />
	  </div>
	</div>
   </div>
   <div>&nbsp;</div>
    
      <div class="col-md-12">
         <div class="footer">&copy;2018 Formrecorder.com</div>
         <div class="row">&nbsp;</div>
      </div>
   </div>
   
 
 
</body>
</html>';

		 
$content3 = $header1.$filname.$header2;
$abc = UPLOAD_DIR .$filhtml;
define('UPLOAD_DIR', 'uploads/');
$abc = UPLOAD_DIR .$filhtml;
file_put_contents($abc,$content3);
?>