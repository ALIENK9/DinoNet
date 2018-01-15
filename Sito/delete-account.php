<?php
    
	include_once ("connect.php");
	include_once ("classi/User.php");

	session_start();
		
    $connect = startConnect();
	if(isset($_SESSION['user'])){	
        User::deleteUserForce($connect,$_SESSION['user']->getEmail());        
		session_unset();
    }
    closeConnect($connect);


    header("Location: index.php");
?>