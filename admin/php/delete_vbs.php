<?php

	session_start();

	include('../includes/connect.php');

	$id = $_POST['id'];

    $stmt = $db->prepare("SELECT family_id FROM vbs_children WHERE id = '$id'");
    $stmt->execute();
    $row = $stmt->fetch();
    $family_id = $row['family_id'];

    $stmt2 = $db->prepare("SELECT count(id) FROM vbs_children WHERE family_id = '$family_id'");
    $stmt2->execute();

    $rowCount = $stmt2->fetchColumn();

    if($rowCount <= 1) {
        $stmt3 = $db->prepare("DELETE FROM vbs_families WHERE id='$family_id'");
        $stmt3->execute();
    }

    $stmt4 = $db->prepare("DELETE FROM vbs_children WHERE id='$id'");
    $stmt4->execute();

?>
