<?php

	$name = $_POST['name'];
	$from = $_POST['email'];
	$to = 'taylorrack@sbcglobal.net';
	$subject = 'Website contact from '.$name;
	$message = $_POST['message'];
	$headers = 'Reply-to:'.$from;

	mail($to, $subject, $message, $headers);

	header('Location: ../contact.php');

?>