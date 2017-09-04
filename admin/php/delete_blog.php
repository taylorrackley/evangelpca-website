<?php

	session_start();

	include('../includes/connect.php');

	$id = $_POST['id'];
	$stmt = $db->prepare("DELETE FROM blog WHERE id='$id'");

	if($stmt->execute()){
		$notice = "Blog post successfully deleted.";
		header('location: ../blogs.php?notice='.$notice);
	} else {
		$notice = "Error: Could not delete blog post. ".$stmt->error();
		header('location: ../blog_edit.php?id='.$id.'&notice='.$notice);
	}

?>
