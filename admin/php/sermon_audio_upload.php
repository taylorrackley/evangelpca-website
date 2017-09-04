<?php

$year = Date("Y");

$file = $_FILES['sermon'];
$file_name = $file['name'];
$file_tmp = $file['tmp_name'];
$file_size = $file['size'];

$file_ext = explode('.', $file_name);
$file_ext = strtolower(end($file_ext));

if(!file_exists('../../audio/'.$year)){
	mkdir('../../audio/'.$year, 0777, true);
}

if($file_ext != 'mp3'){
	$notice = 'Uploaded file has wrong extension.';
	header('location: ../sermons.php?notice='.$notice);
}

if($file['error'] != 0){
	$notice = 'Could not upload file'.$file['error'];
	header('location: ../sermons.php?notice='.$notice);
}

if($file_size <= 100000){
	$notice = 'File was to large to upload.';
	header('location: ../sermons.php?notice='.$notice);
}

$file_name_new = $date.'.'.$file_ext;
$file_path = '../../audio/'.$year.'/'.$file_name_new;
$audio_link = 'audio/'.$year.'/'.$file_name_new;

if(!move_uploaded_file($file_tmp, $file_path)){
	$notice = 'Could not upload file. '.$file['error'];
	header('location: ../sermons.php?notice='.$notice);
}

?>
