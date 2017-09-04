<?php

	session_start();
	
    if(!$_SESSION['logged_in']){
        header('Location: php/login.php');
        die();
    }

?>