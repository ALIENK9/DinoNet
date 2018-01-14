<?php
	session_start();
	include_once ("classi/Dinosaur.php");
	include_once ("classi/Article.php");
	include_once ("connect.php");
	$connect = startConnect();
?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>Crediti | Dino Net</title>
	<meta name="description" content="Crediti per il più strepitoso sito d'informazione sui dinosauri">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="HTML, CSS, XML, JavaScript">
	<link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chelsea+Market">
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

<!-- Topbar -->

<?php include_once('topbar.php') ?>

<!-- /Topbar -->

<!-- Header -->
<!-- Header -->

<header id="header-home" class="parallax padding-6">
	<div id="title-card" class="content card">
		<h1 class="text-colored"> Crediti per il sito DINO NET</h1>
	</div>
</header>

<!-- /Header -->

<!-- Breadcrumb -->

<?php include_once('breadcrumb.php') ?>

<!-- /Breadcrumb -->

<!-- Content -->

<!-- About -->

<div id="about" class="content padding-6">
        <p>
            Questo sito è un stato realizzato per un progetto del corso di Tecnologie
            <span xml:lang="en" lang="en">Web</span> del Corso di Laurea in Informatica dell'Università di Padova,
            durante l'anno accademico 2017-2018.
            I testi descrittivi di ciascun dinosauro sono stati presi prevalentemente dai libri
            <em>Dinosauri la vita nella preistoria</em> di <span xml:lang="en" lang="en">Hazel Richardson</span>,
            e <em>Il pianeta dei Dinosauri</em> curato da Piero e Alberto Angela. Alcuni aggiustamenti sono stati
            fatti con informazioni prese da <a href="http://it.wikipedia.org/wiki/" target="_blank">Wikipedia</a>.
            Le icone utilizzate sono state prelevate dai siti <a href="https://icons8.it/" target="_blank">Icons8</a>,
            <a href="https://www.flaticon.com/" target="_blank">Flaticon</a>.
        </p>
</div>

<!-- /About -->

<?php include_once('footer.php') ?>

<?php include_once('nojsmenu.php') ?>

<?php include_once('tothetop.php') ?>

</div>

</body>

<!-- /Body -->

</html>
<?php
	closeConnect($connect);
?>