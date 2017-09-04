<?php

	include('includes/connect.php');

	$id = $_GET['id'];
	$stmt = $db->prepare("SELECT author, title, summary, post_date, post FROM blog WHERE id = '$id' LIMIT 1");

	if($stmt->execute()){
		array_push($alerts, $notice = 'Blog post was successfully loaded.');
	} else {
		$notice = 'Error: could not load Blog post. ' . $stmt->errorCode();
		header('location: blogs.php?notice='.$notice);
	}

	$result = $stmt->fetch();

	$title = $result['title'];
	$author = $result['author'];
	$summary = $result['summary'];
	$date = $result['post_date'];

	$post = $result['post'];
	$post = str_replace('<br />', '', $post);

?>