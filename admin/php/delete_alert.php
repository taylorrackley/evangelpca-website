<?php

	session_start();

	include('../includes/connect.php');

	$id = $_POST['id'];
	$stmt = $db->prepare("DELETE FROM alerts WHERE id='$id'");

	if($stmt->execute()){
		$notice = "Alert successfully deleted.";
		header('location: ../alerts.php?notice='.$notice);
	} else {
		$notice = "Error: Could not delete Alert. ".$stmt->error();
		header('location: ../alert_edit.php?id='.$id.'&notice='.$notice);
	}

?>
