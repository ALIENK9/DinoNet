<?php
	include_once ("classi/Article.php");

session_start();

include_once ("connect.php");
$connectArticles = startConnect();

?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>Articoli | Dino Net</title>
	<meta name="description" content="Una moltitudine di articoli informativi sui dinosauri">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="HTML, CSS, XML, JavaScript">
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

<header id="header-home" class="parallax padding-6">
	<div id="title-card" class="content card">
		<h1 class="text-colored"> Gli articoli </h1>
		<h2>scopri tutte le novità sul mondo dei dinosauri</h2>

        <a href="all-articles.php" class="btn card wrap-margin">Vai alla lista completa degli articoli</a>
    </div>

    <a href="#daily-article" class="down-arrow arrow btn card bounce">
        <span class="hidden">Scorri all'articolo del giorno</span>
    </a>
</header>

<!-- Breadcrumb -->

<?php include_once('breadcrumb.php') ?>

<!-- /Breadcrumb -->

<!-- Articoli -->

<div class="padding-6 side-padding content">

    <div id="daily-article" class="card margin-half colored center wrap-padding">
        <h1>L'articolo del giorno</h1>
        <hr>
        <p>Giornalmente selezioniamo un articolo per te. Buona lettura!</p>
    </div>

	<?php
		
			echo Article::getArticleDay($connectArticles,".", "display-article.php?");
	?>
</div>

<div class="padding-6">
	<div class="colored center wrap-padding">
		<h1>Le ultime pubblicazioni</h1>
	</div>
	<div class="row-padding content-large margin-top">
	<?php
		echo Article::printListArticleUserLimit($connectArticles, "", 0, 3, ".", "display-article.php?", true);
	?>
	</div>
</div>

<?php include_once('footer.php') ?>

<?php include_once('nojsmenu.php') ?>

<?php include_once('tothetop.php') ?>

</div>

</body>

<!-- /Body -->

</html>

<?php

	closeConnect($connectArticles);
?>