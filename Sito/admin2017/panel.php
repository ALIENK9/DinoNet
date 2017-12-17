<?php
	
	$homepath = substr( $_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
	if (strpos($_SERVER['SCRIPT_NAME'], 'TecWeb') !== false) {
		$homepath .= "/TecWeb";
	}
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
		
		<!-- Favicon -->
		
		<link rel="apple-touch-icon" sizes="57x57" href="../img/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="../img/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="../img/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="../img/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="../img/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="../img/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="../img/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="../img/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="../img/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../img/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
		<link rel="manifest" href="../img/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="../img/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
	</head>

	<!-- Body -->

	<body>


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


	<?php include_once('../tothetop.php'); ?>

	</div>

	<?php include_once('../loading.php'); ?>

	<?php include_once('menuadmin.php'); ?>

	
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
