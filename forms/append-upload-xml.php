<?php
$xmldoc = new DomDocument( '1.0' );
$xmldoc->preserveWhiteSpace = false;
$xmldoc->formatOutput = true;

$filhtml1 = $_POST["filhtml"];
$filhtml = 'https://www.formrecorder.com/uploads/'.$filhtml1;
$clipName = $_POST["clipName"];
$dispmmddyyyy = $_POST["dispmmddyyyy"];
 

if( $xml = file_get_contents( 'upload-info.xml') ) {
    $xmldoc->loadXML( $xml, LIBXML_NOBLANKS );

    // find the headercontent tag
    $root = $xmldoc->getElementsByTagName('headercontent')->item(0);

    // create the <upload> tag
    $upload = $xmldoc->createElement('upload');
     

    // add the upload tag before the first element in the <headercontent> tag
    $root->insertBefore( $upload, $root->firstChild );

    // create other elements and add it to the <product> tag.
    $fileElement = $xmldoc->createElement('file');
    $upload->appendChild($fileElement);
    $fileText = $xmldoc->createTextNode($filhtml);
    $fileElement->appendChild($fileText);
	
	$nameElement = $xmldoc->createElement('name');
    $upload->appendChild($nameElement);
    $nameText = $xmldoc->createTextNode($clipName);
    $nameElement->appendChild($nameText);

	$dateElement = $xmldoc->createElement('date');
    $upload->appendChild($dateElement);
    $dateText = $xmldoc->createTextNode($dispmmddyyyy);
    $dateElement->appendChild($dateText);
     
    $xmldoc->save('upload-info.xml');
 
 }
?>
 