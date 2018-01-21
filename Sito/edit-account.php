<?php

	include_once ("classi/User.php");	

	session_start();
	
	if(!isset($_SESSION['user'])){		
		header("Location: login.php");
	}
	
	include_once ("connect.php");
	$connectUser = startConnect();
	if(isset($_GET["sez"]) && $_GET["sez"]=="update"){
		$_SESSION['user']->UpdateMyUser($connectUser, $_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf']);
	}
	closeConnect($connectUser);

?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>Modifica account | Dino Net</title>
	<meta name="description" content="Pagina di modifica del tuo account Dino Net">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/print.css" media="print">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chelsea+Market">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
	
	<!-- Favicon -->
	
	<link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
	<link rel="manifest" href="img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>

<!-- Body -->

<body>

<?php include_once('loading.php') ?>

<?php include_once('menu.php') ?>

<div id="main" class="main">

    <!-- Topbar -->

    <?php include_once('topbar.php') ?>

    <!-- /Topbar -->

<!-- Header -->
<?php 
	echo $_SESSION['user']->formUpdateMyUser($_SERVER["PHP_SELF"]."?sez=update");
?>
<!-- /Header -->

<?php include_once('breadcrumb.php') ?>

<?php include_once('footer.php') ?>

<?php include_once('nojsmenu.php') ?>

<?php include_once('tothetop.php') ?>

</div>

</body>

<!-- /Body -->

</html>