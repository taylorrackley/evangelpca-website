<?php

	include('../includes/connect.php');

	$name = $_POST['name'];
	$jobTitle = $_POST['job_title'];
	$summary = $_POST['summary'];

	if(!isset($_POST['id'])){

		$toggle = false;
		include('image_upload.php');

		$id = uniqid();
		$stmt = $db->prepare("INSERT INTO leaders (`id`, `name`, `summary`, `job_title`, `image_link`) VALUES ('$id', '$name', '$summary', '$jobTitle', '$image_link')");

		if($stmt->execute()){
			$notice = 'Church Leader successfully created.';
		} else {
			$notice = 'Church Leader failed to be created. '.$stmt->errorCode();
		}

	} else {

		$id = $_POST['id'];

		if(isset($_FILES['image'])){
			$toggle = true;
			include('image_upload.php');
			$stmt = $db->prepare("UPDATE leaders SET name = '$name', job_title = '$jobTitle', summary = '$summary', image_link = '$image_link' WHERE id = '$id'");
		} else {
			$stmt = $db->prepare("UPDATE leaders SET name = '$name', job_title = '$jobTitle', summary = '$summary' WHERE id = '$id'");
		}

		if($stmt->execute()){
			$notice = 'Church Leader successfully edited.';
		} else {
			$notice = 'Church Leader failed to save changes. '.$stmt->errorCode();
		}

	}

	header('Location: ../leaders.php?notice='.$notice);

?>