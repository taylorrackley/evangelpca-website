<?php

	session_start();

	include('../includes/connect.php');

	$id = $_POST['id'];

	$stmt = $db->prepare("SELECT image_link FROM leaders WHERE id = '$id'");
	$stmt->execute();
	$row = $stmt->fetch();

	$stmt = $db->prepare("DELETE FROM leaders WHERE id='$id'");

	if($stmt->execute()){
		unlink('../../'.$row['image_link']);
		$notice = "Church Leader post successfully deleted.";
		header('location: ../leaders.php?notice='.$notice);
	} else {
		$notice = "Error: Could not delete Church Leader. ".$stmt->error();
		header('location: ../leader_edit.php?id='.$id.'&notice='.$notice);
	}

?>