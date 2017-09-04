<?php

	include('../includes/connect.php');

	$title = $_POST['title'];
	$preacher = $_POST['preacher'];
	$summary = $_POST['summary'];
	$series = $_POST['series'];
	$date = $_POST['post_date'];
	$nt_verse = $_POST['nt_verse'];
	$ot_verse = $_POST['ot_verse'];

	if(!isset($_POST['id'])){

		include('sermon_audio_upload.php');

		$id = uniqid();
		$stmt = $db->prepare("INSERT INTO sermons (`id`, `title`, `summary`, `preacher`, `series`, `post_date`, `nt_verse`, `ot_verse`, `audio_link`) VALUES ('$id', '$title', '$summary', '$preacher', '$series', '$date', '$nt_verse', '$ot_verse', '$audio_link')");

		if($stmt->execute()){
			$notice = 'Sermon successfully created.';
		} else {
			$notice = 'Sermon failed to be created. '.$stmt->errorCode();
		}

	} else {

		$id = $_POST['id'];
		$stmt = $db->prepare("UPDATE sermons SET title = '$title', preacher = '$preacher', post_date = '$date', summary = '$summary', series = '$series', nt_verse = '$nt_verse', ot_verse = '$ot_verse' WHERE id = '$id'");

		if($stmt->execute()){
			$notice = 'Sermon successfully edited.';
		} else {
			$notice = 'Sermon failed to save changes. '.$stmt->errorCode();
		}

	}

	header('Location: ../sermons.php?notice='.$notice);

?>
