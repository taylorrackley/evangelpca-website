<?php

	include('../includes/connect.php');

	$date = $_POST['bulletin_date'];

	if(!isset($_POST['id'])){

        include('bulletin_pdf_upload.php');
		include('inserts_pdf_upload.php');

		$id = uniqid();
		$stmt = $db->prepare("INSERT INTO bulletins (`id`, `pdf_link`, `pdf_inserts_link`, `bulletin_date`) VALUES ('$id', '$pdf_bulletin_link', '$pdf_inserts_link', '$date')");

		if($stmt->execute()){
			$notice = 'Bulletin successfully created.';
		} else {
			$notice = 'Bulletin failed to be created.';
			die("Error: " . $stmt->errorCode());
		}

	} else {

		$id = $_POST['id'];
		$stmt = $db->prepare("UPDATE bulletins SET bulletin_date = '$date', pdf_link = '$pdf_link' WHERE id = '$id'");

		if($stmt->execute()){
			$notice = 'Bulletin post successfully edited.';
		} else {
			$notice = 'Bulletin post failed to save changes.';
			die("Error: " . $stmt->errorCode());
		}

	}

	header('Location: ../bulletins.php?notice='.$notice);

?>
