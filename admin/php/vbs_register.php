<?php

    include('../includes/connect.php');

    $ffull_name = $_POST['father_full_name'];
    $mfull_name = $_POST['mother_full_name'];
    $fphone = $_POST['father_phone'];
    $mphone = $_POST['mother_phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    $id = uniqid();

    $stmt = $db->prepare("INSERT INTO vbs_families (`id`, `father_full_name`, `mother_full_name`, `father_phone`, `mother_phone`, `address`, `city`, `zip`) VALUES ('$id', '$ffull_name', '$mfull_name', '$fphone', '$mphone', '$address', '$city', '$zip')");

    for($x = 0; $x <= 8; $x++) {

        if(isset($_POST['child_name_'.$x])) {

            $child_id = uniqid();
            $child = $_POST['child_name_'.$x];
            $grade = $_POST['child_grade_'.$x];
            $comments = $_POST['child_allergies_'.$x];

            $stmt2 = $db->prepare("INSERT INTO vbs_children (`id`, `family_id`, `child_name`, `completed_grade`, `comments`) VALUES ('$child_id', '$id', '$child', '$grade', '$comments')");
            $stmt2->execute();

        }

    }

    if($stmt->execute()){
        header('location: ../../vbs_registration.php?notice=success');
    } else {
        header('location: ../../vbs_registration.php?notice=error');
    }

?>
