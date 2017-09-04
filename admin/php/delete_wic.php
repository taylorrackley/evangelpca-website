<?php

	session_start();

	include('../includes/connect.php');

	$id = $_POST['id'];
	$stmt = $db->prepare("DELETE FROM wic_sign_up WHERE id='$id'");

	if($stmt->execute()){
		$notice = "WIC sign up successfully deleted.";
		header('location: ../wic_sign_up.php?notice='.$notice);
	} else {
		$notice = "Error: Could not delete WIC sign up. ".$stmt->error();
		header('location: ../wic_sign_up.php?notice='.$notice);
	}

?>
