<?php

	session_start();

	include('../includes/connect.php');

	$id = $_POST['id'];
	$stmt = $db->prepare("DELETE FROM admin WHERE id='$id'");

	if($stmt->execute()){
		$notice = "Admin successfully deleted.";
		header('location: ../admins.php?notice='.$notice);
	} else {
		$notice = "Error: Could not delete Admin. ".$stmt->error();
		header('location: ../admin_edit.php?id='.$id.'&notice='.$notice);
	}

?>
