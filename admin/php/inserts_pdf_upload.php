<?php

if(!empty($_FILES['bulletin_inserts_pdf'])){
	$year = Date("Y");

	$file = $_FILES['bulletin_inserts_pdf'];
	$file_name = $file['name'];
	$file_tmp = $file['tmp_name'];
	$file_size = $file['size'];

	$file_ext = explode('.', $file_name);
	$file_ext = strtolower(end($file_ext));

	if(!file_exists('../../bulletins/'.$year)){
		mkdir('../../bulletins/'.$year, 0777, true);
	}

	if($file_ext != 'pdf'){
		$notice = 'Uploaded file has wrong extension. File must be a PDF';
		header('location: ../bulletins.php?notice='.$notice);
	}

	if($file['error'] != 0){
		$notice = 'Could not upload file'.$file['error'];
		header('location: ../bulletins.php?notice='.$notice);
	}

	if($file_size <= 100000){
		$notice = 'File was to large to upload.';
		header('location: ../bulletins.php?notice='.$notice);
	}

	$file_name_new = $date.'-inserts.'.$file_ext;
	$file_path = '../../bulletins/'.$year.'/'.$file_name_new;
	$pdf_inserts_link = 'bulletins/'.$year.'/'.$file_name_new;

	if(!move_uploaded_file($file_tmp, $file_path)){
		$notice = 'Could not upload file :(. '.$file_name_new.' - '.$file_name;
		header('location: ../bulletins.php?notice='.$notice);
	}
}
else {

	$pdf_inserts_link = '';

}

?>
