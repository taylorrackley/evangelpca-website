<?php

	session_start();

	include('../includes/connect.php');

	$id = $_POST['id'];
	$stmt = $db->prepare("DELETE FROM bulletin WHERE id='$id'");

	if($stmt->execute()){
		$notice = "Weekly bulletin post successfully deleted.";
		header('location: ../bulletins.php?notice='.$notice);
	} else {
		$notice = "Error: Could not delete bulletin. ".$stmt->error();
		header('location: ../bulletin_edit.php?id='.$id.'&notice='.$notice);
	}

?>
