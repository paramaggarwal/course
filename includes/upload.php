<?php

session_start();

//Get Session Data
$name = $_SESSION['name'];
$rollno = $_SESSION['rollno'];

//Set email preferences
$from = "IIIT CSL Central <admin@iiitcslcentral.co.cc>" ;
$subject = "File uploaded by " . $name . " - " . $rollno;
$headers = 'From: ' . $from . "\r\n";
$message = "File Uploaded is attached.\n\n" ;
$to = "paramaggarwal@gmail.com";


///////////////FILE UPLOADED///////////////////////////
if( $_SESSION['level'] == 1 )
{
	echo "Upload: " . $_FILES["file"]["name"] . "<br />";
	echo "Type: " . $_FILES["file"]["type"] . "<br />";
	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
	echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

		if (file_exists("upload/" . $_FILES["file"]["name"]))
		{
			echo $_FILES["file"]["name"] . " already exists. ";
		}
		else {
			move_uploaded_file($_FILES["file"]["tmp_name"],
			"./upload/" . $_FILES["file"]["name"]);
			echo "Stored in: " . "./upload/" . $_FILES["file"]["name"];
		}
}
else {
	echo "Sorry! Upload Not Allowed!!";
}

/////////////////READ FILE//////////////////////////////
$fileatt = "./upload/" . $_FILES["file"]["name"];
$fileatttype = $_FILES["file"]["type"]; 
$fileattname = $_FILES["file"]["name"];

$file = fopen( $fileatt, 'rb' ); 
$data = fread( $file, filesize( $fileatt ) ); 
fclose( $file );

$semi_rand = md5( time() ); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

$headers .= "\nMIME-Version: 1.0\n" . 
	    "Content-Type: multipart/mixed;\n" . 
	    " boundary=\"{$mime_boundary}\"";

$message = "This is a multi-part message in MIME format.\n\n" . 
	"--{$mime_boundary}\n" . 
	"Content-Type: text/plain; charset=\"iso-8859-1\"\n" . 
	"Content-Transfer-Encoding: 7bit\n\n" . 
	$message . "\n\n";

$data = chunk_split( base64_encode( $data ) );
	 
$message .= "--{$mime_boundary}\n" . 
	 "Content-Type: {$fileatttype};\n" . 
	 " name=\"{$fileattname}\"\n" . 
	 "Content-Disposition: attachment;\n" . 
	 " filename=\"{$fileattname}\"\n" . 
	 "Content-Transfer-Encoding: base64\n\n" . 
	 $data . "\n\n" . 
	 "--{$mime_boundary}--\n"; 


//Send mail
if( $_SESSION['level'] == 1 )
{
	mail( $to, $subject, $message, $headers );
	echo "<br />Mail sent successfully...";
}
else {
	echo "Sorry! Not Allowed!!";
}

?>	