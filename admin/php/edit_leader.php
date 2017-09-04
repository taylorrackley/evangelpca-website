<?php

	include('includes/connect.php');

	$id = $_GET['id'];
	$stmt = $db->prepare("SELECT name, job_title, summary FROM leaders WHERE id = '$id' LIMIT 1");

	if($stmt->execute()){
		array_push($alerts, $notice = 'Church Leader was successfully loaded.');
	} else {
		$notice = 'Error: could not load Church Leader. ' . $stmt->errorCode();
		header('location: leaders.php?notice='.$notice);
	}

	$result = $stmt->fetch();

	$name = $result['name'];
	$jobTitle = $result['job_title'];
	$summary = $result['summary'];

?>