<?php
	
	$homepath = substr( $_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
	//$homepath = $_SERVER["DOCUMENT_ROOT"];

	include_once ($homepath . "/connect.php");
	include_once ($homepath . "/classi/UserAdmin.php");

	session_start();

	if(isset($_SESSION['user'])){
?>

	<!DOCTYPE html>
	<html xml:lang="it-IT" lang="it-IT">
	<head>
		<title>TecWeb</title>
		<meta name="description" content="Descrizione">
		<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="HTML, CSS, XML, JavaScript">
		<link rel="stylesheet" href="../css/index.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	</head>

	<!-- Body -->

	<body>

	<?php include_once('../loading.php') ?>

	<?php include_once('menuadmin.php') ?>

	<div id="main" class="main">


	<!-- Content -->


	<!-- inclusione pagina da visualizzare -->

	<?php 
		if(isset($_GET["id"])){
			switch ($_GET["id"]) {
				case 'home':
					include_once('home.php');
					break;

				case 'user':
					include_once('user.php');
					break;	

				case 'myuser':
						if(isset($_GET["sez"]) && $_GET["sez"]=="update" )						
							echo $_SESSION['user']->UpdateMyUser($_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf']);
						else
							echo $_SESSION['user']->formUpdateMyUser($_SERVER["PHP_SELF"]);
					break;

				case 'dino':
					include_once('dinosaur.php');
					break;

				case 'article':
					include_once('article.php');
					break;	

				case 'logout': default:
					include_once('logout.php');
					break;
			}
		}
		else{
			include_once('home.php');
		}
	?>

	<!-- /inclusione pagina da visualizzare -->


	<!-- /Content -->


	<?php include_once('../tothetop.php') ?>

	</div>

	<script>
	// Script to open and close sidebar
	function open_menu() {
		document.getElementById("sidebar").style.display = "block";
		document.getElementById("overlay").style.display = "block";
	}
	
	function close_menu() {
		document.getElementById("sidebar").style.display = "none";
		document.getElementById("overlay").style.display = "none";
	}
	</script>

	</body>

	<!-- /Body -->

	</html>

<?php
	}
	else{
		
		header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
		exit();
	}
?>
