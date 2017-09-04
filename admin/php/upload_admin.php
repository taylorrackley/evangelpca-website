<?php

	include('../includes/connect.php');

	$id = uniqid();
	$username = $_POST['username'];
	$name = $_POST['name'];
	$salt = uniqid();
	$password = crypt($_POST['password'], $salt);

	$stmt = $db->prepare("INSERT INTO admin (id, username, name, password, salt) VALUES ('$id', '$username', '$name', '$password', '$salt')");
	$stmt->execute();

	header('Location: ../aadmins.php);

?>
