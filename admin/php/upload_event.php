<?php

	include('../includes/connect.php');

	$title = $_POST['title'];
	$details = $_POST['details'];
	$fee = $_POST['fee'];
	$start_date = $_POST['start_date'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$end_date = $_POST['end_date'];

	$start_date = Date($start_date);

	if(!isset($_POST['id'])){

		$id = uniqid();
		$stmt = $db->prepare("INSERT INTO events (`id`, `title`, `details`, `fee`, `start_date`, `start_time`, `end_time`, `end_date`) VALUES ('$id', '$title', '$details', '$fee', '$start_date', '$start_time', '$end_time', '$end_date')");

		if($stmt->execute()){
			$notice = 'Event successfully created.';
		} else {
			$notice = 'Event failed to be created.';
		}

	} else {

		$id = $_POST['id'];
		$stmt = $db->prepare("UPDATE events SET title = '$title', cordinator = '$fee', start_date = '$start_date', start_time = '$start_time', end_time = '$end_time', details = '$details', end_date = '$end_date' WHERE id = '$id'");

		if($stmt->execute()){
			$notice = 'Event successfully edited.';
		} else {
			$notice = 'Event failed to save changes.';
			die("Error: " . $stmt->errorCode());
		}

	}

	header('Location: ../events.php?notice='.$notice);

?>
