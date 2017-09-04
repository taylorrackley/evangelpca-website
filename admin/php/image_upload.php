<?php

if($toggle){
	$stmt = $db->prepare("SELECT image_link FROM leaders WHERE id = '$id'");
	$stmt->execute();
	$row = $stmt->fetch();

	unlink('../../'.$row['image_link']);
}

$file = $_FILES['image'];
$file_name = $file['name'];
$file_tmp = $file['tmp_name'];
$file_size = $file['size'];

$file_ext = explode('.', $file_name);
$file_ext = strtolower(end($file_ext));

if($file['error'] != 0){
	$notice = 'Could not upload Image'.$file['error'];
	header('location: ../leaders.php?notice='.$notice);
}

if($file_size >= 500000){
	$notice = 'File was to large to upload.';
	header('location: ../leaders.php?notice='.$notice);
}

$file_name_new = uniqid().'.'.$file_ext;
$file_path = '../../img/leaders/'.$file_name_new;
$image_link = 'img/leaders/'.$file_name_new;

if(!move_uploaded_file($file_tmp, $file_path)){
	$notice = 'Could not upload image. '.$file['error'];
	header('location: ../leaders.php?notice='.$notice);
}

?>