<?php

	session_start();

	include('../includes/connect.php');

	$id = $_POST['id'];
	$stmt = $db->prepare("DELETE FROM sermons WHERE id='$id'");

	if($stmt->execute()){
		$notice = "Sermon post successfully deleted.";
		header('location: ../sermons.php?notice='.$notice);
	} else {
		$notice = "Error: Could not delete sermon. ".$stmt->error();
		header('location: ../sermon_edit.php?id='.$id.'&notice='.$notice);
	}

?>