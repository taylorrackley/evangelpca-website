<?php

	include('../includes/connect.php');

	$message = $_POST['message'];
	$end_date = $_POST['end_date'];

	$end_date = Date($end_date);

	if(!isset($_POST['id'])){

		$id = uniqid();
		$stmt = $db->prepare("INSERT INTO alerts (`id`, `message`, `end_date`) VALUES ('$id', '$message', '$end_date')");

		if($stmt->execute()){
			$notice = 'Alert successfully created.';
		} else {
			$notice = 'Alert failed to be created.';
		}

	} else {

		$id = $_POST['id'];
		$stmt = $db->prepare("UPDATE alerts SET message = '$message', end_date = '$end_date' WHERE id = '$id'");

		if($stmt->execute()){
			$notice = 'Alert successfully edited.';
		} else {
			$notice = 'Alert failed to save changes.';
			die("Error: " . $stmt->errorCode());
		}

	}

	header('Location: ../alerts.php?notice='.$notice);

?>
