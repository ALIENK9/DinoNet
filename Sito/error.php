<?php
	session_start();
?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>Errore! | Dino Net</title>
	<meta name="description" content="Pagina di errore per il sito Dino Net">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/index.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<!-- Body -->

<body>

<?php include_once('loading.php') ?>

<?php include_once('menu.php') ?>

<div id="main" class="main">

<!-- Header -->

<header id="header-home" class="parallax padding-6">
	<div id="title-card" class="content card">
		<img src="img/sad-dino.png" alt="illustrazione di dinosauro triste">
		<h1 class="text-colored">Errore, pagina non esistente </h1>
		
        <a href="all-articles.php" class="btn card wrap-margin">Torna alla <span xml:lang="en">Home</span></a>
	</div>
</header>

<!-- /Header -->

<?php include_once('footer.php') ?>

<?php include_once('nojsmenu.php') ?>

<?php include_once('tothetop.php') ?>

</div>

</body>

<!-- /Body -->

</html>
