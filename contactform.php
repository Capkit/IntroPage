<?php 

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$mailFrom = $_POST['email'];
	$message = $_POST['message'];
	
	$mailTo = "info@pepperwrapper.com";
	$headers = "From: My website".$mailFrom;
	$txt = "You got an email from ".$name;
	
	mail($mailTo, $txt, $headers);
	header("Location: index.php?mailsend");
} 
?>
