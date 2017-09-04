<?php

	include('includes/connect.php');

	$id = $_GET['id'];
	$stmt = $db->prepare("SELECT preacher, title, summary, series, post_date, nt_verse, ot_verse FROM sermons WHERE id = '$id' LIMIT 1");

	if($stmt->execute()){
		array_push($alerts, $notice = 'Sermon was successfully loaded.');
	} else {
		$notice = 'Error: could not load Sermon. ' . $stmt->errorCode();
		header('location: sermons.php?notice='.$notice);
	}

	$result = $stmt->fetch();

	$title = $result['title'];
	$preacher = $result['preacher'];
	$summary = $result['summary'];
	$series = $result['series'];
	$date = $result['post_date'];
	$nt_verse = $result['nt_verse'];
	$ot_verse = $result['ot_verse'];

?>