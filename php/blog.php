<?php

	include('includes/connect.php');

	$id = $_GET['id'];

	$stmt = $db->prepare("SELECT id, author, title, summary, post_date, post FROM blog WHERE id = '$id'");
	$stmt->execute();

	$row = $stmt->fetch();

	$date = DateTime::createFromFormat('Y-m-d', $row['post_date'])->format('F Y');
	$title = $row['title'];
	$author = $row['author'];
	$summary = $row['summary'];
	$post = $row['post'];

?>