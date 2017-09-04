<?php

	include('includes/connect.php');

	$id = $_GET['id'];
	$stmt = $db->prepare("SELECT end_date, message FROM alerts WHERE id = '$id' LIMIT 1");

	if($stmt->execute()){
		array_push($alerts, $notice = 'Alert post was successfully loaded.');
	} else {
		$notice = 'Error: could not load Alert. ' . $stmt->errorCode();
		header('location: alerts.php?notice='.$notice);
	}

	$result = $stmt->fetch();

	$message = $result['message'];
	$end_date = $result['end_date'];

?>
