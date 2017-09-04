<?php

	include('../includes/connect.php');

	$user = $_POST['username'];
	$pass = $_POST['password'];

  $stmt = $db->prepare("SELECT password, salt, master, name FROM admin WHERE username = '$user' LIMIT 1");
  $stmt->execute();
 	$row = $stmt->fetch();

 	$salt = $row['salt'];
	$name = $row['name'];
 	$hash = crypt($pass, $salt);
	$ismaster = $row['master'];
 	$db_pass = $row['password'];

 	if($hash == $db_pass){
    	session_start();

 		$_SESSION['logged_in'] = true;
		$_SESSION['name'] = $name;

		if($ismaster == 1){
			$_SESSION['master'] = true;
		}

	    if(isset($_GET['link'])){
	      header('location: '.$_GET['link']);
	    } else {
	 		   header('location: ../index.php');
	    }
 	} else {
 		header('location: ../login.html?error=true');
 	}

?>
