<?php
    
	include_once ("connect.php");
	include_once ("classi/User.php");

	session_start();
		
    $connect = startConnect();
	if(isset($_SESSION['user'])){	
        $_SESSION['user']->deleteUserForce($connect, ".");        
		session_unset();
    }
    closeConnect($connect);


    header("Location: index.php");
?>