<?php

	include('includes/connect.php');

	$id = $_GET['id'];
	$stmt = $db->prepare("SELECT cordinator, title, details, start_date, start_time, end_time FROM events WHERE id = '$id' LIMIT 1");

	if($stmt->execute()){
		array_push($alerts, $notice = 'Event was successfully loaded.');
	} else {
		$notice = 'Error: could not load event. ' . $stmt->errorCode();
		header('location: events.php?notice='.$notice);
	}

	$result = $stmt->fetch();

	$title = $result['title'];
	$cordinator = $result['cordinator'];
	$details = $result['details'];
	$start_date = $result['start_date'];
	$start_time = $result['start_time'];
	$end_time = $result['end_time'];

?>
