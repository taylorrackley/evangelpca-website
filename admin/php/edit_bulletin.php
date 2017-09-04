<?php

	include('includes/connect.php');

	$id = $_GET['id'];
	$stmt = $db->prepare("SELECT bulletin_date FROM bulletins WHERE id = '$id' LIMIT 1");

	if($stmt->execute()){
		array_push($alerts, $notice = 'Bulletin was successfully loaded.');
	} else {
		$notice = 'Error: could not load Bulletin. ' . $stmt->errorCode();
		header('location: bulletins.php?notice='.$notice);
	}

	$result = $stmt->fetch();
	$date = $result['bulletin_date'];

?>
