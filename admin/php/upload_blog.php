<?php

	include('../includes/connect.php');

	$title = $_POST['title'];
	$author = $_POST['author'];
	$summary = $_POST['summary'];
	$date = $_POST['post_date'];
	$post = $_POST['post'];

	$post = nl2br($post);

	if(!isset($_POST['id'])){

		$id = uniqid();
		$stmt = $db->prepare("INSERT INTO blog (`id`, `title`, `summary`, `author`, `post_date`, `post`) VALUES ('$id', '$title', '$summary', '$author', '$date', '$post')");

		if($stmt->execute()){
			$notice = 'Blog post successfully created.';
		} else {
			$notice = 'Blog post failed to be created.';
			die("Error: " . $stmt->errorCode());
		}

	} else {

		$id = $_POST['id'];
		$stmt = $db->prepare("UPDATE blog SET title = '$title', author = '$author', post_date = '$date', summary = '$summary', post = '$post' WHERE id = '$id'");

		if($stmt->execute()){
			$notice = 'Blog post successfully edited.';
		} else {
			$notice = 'Blog post failed to save changes.';
			die("Error: " . $stmt->errorCode());
		}

	}

	header('Location: ../blogs.php?notice='.$notice);

?>