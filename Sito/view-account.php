<?php
	include_once ($_SERVER['DOCUMENT_ROOT'] ."/connect.php");
	include_once ($_SERVER['DOCUMENT_ROOT'] ."/classi/User.php");	

	session_start();
	
	if(isset($_SESSION['user'])){	
		session_unset();
	}

	if(isset($_POST['email']) && isset($_POST["password"])){
		session_unset();
		if(User::login($_POST["email"],$_POST["password"],'0')){
			$_SESSION['user'] = new User($_POST['email']);
			header("Location: index.php");
		}	
	}
?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>TecWeb</title>
	<meta name="description" content="Descrizione">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/print.css" media="print">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
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

<!-- Header -->

<header id="header-home" class="parallax padding-6">
	<div class="content">
		<div id="title-card" class="card">
			<h1 class="title wide"> Ciao, [Nome utente] </h1>
			<br>
			<h2>qui puoi visualizzare i dati del tuo account</h2>
		</div>
		
		<!-- Dati account -->

		<div class="card colored wrap-padding">
			<h1>Dati account</h1>
			<hr>
			<p><strong>Nome:</strong> Mario</p>
			<p><strong>Cognome:</strong> Rossi</p>
			<p><strong>Email:</strong> ciaociao@gmail.com</p>
			<br><br>
			<a href="edit-account.php" class="btn card colored wrap-margin"><p> Modifica account </p></a>
			<a href="delete-account.php" class="btn card colored wrap-margin"><p> Elimina account </p></a>
			<a href="logout.php" class="btn card colored wrap-margin"><p xml:lang="en" lang="en"> Logout </p></a>
		</div>
		
		<!-- /Dati account -->
	</div>

</header>

<!-- /Header -->

<?php include_once('footer.php') ?>

<?php include_once('tothetop.php') ?>

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