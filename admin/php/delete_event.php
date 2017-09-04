<?php

	session_start();

	include('../includes/connect.php');

	$id = $_POST['id'];
	$stmt = $db->prepare("DELETE FROM events WHERE id='$id'");

	if($stmt->execute()){
		$notice = "event successfully deleted.";
		header('location: ../events.php?notice='.$notice);
	} else {
		$notice = "Error: Could not delete event. ".$stmt->error();
		header('location: ../event_edit.php?id='.$id.'&notice='.$notice);
	}

?>
