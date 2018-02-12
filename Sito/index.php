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
	<title>Home &#124; Dino Net</title>
	<meta name="description" content="Uno strepitoso sito d'informazione sui dinosauri">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="HTML, CSS, XML, JavaScript">
	<link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chelsea+Market">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/buttons.js"></script>

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

<header id="header-home" class="parallax padding-6 header-image">
	<div class="content">
		<div class="wrap-padding colored card">
			<h1 class="title"> DINO NET </h1>
			<h2> Scopri i giganti della preistoria! </h2>
		</div>
		<div class="wrap-padding white card">
			<a href="#daily-stuff" class="btn card wrap-margin"> Contenuti del giorno </a>
		</div>
	</div>

	<a href="#about" aria-label="Scorri alle informazioni sul sito" class="down-arrow arrow btn card bounce">
        <span class="hidden">Scorri alle informazioni sul sito</span>
    </a>
</header>

<!-- /Header -->

<!-- Breadcrumb -->

<?php 
	include_once('breadcrumb.php');
    echo breadcrumbUser();
?>

<!-- /Breadcrumb -->

<!-- Content -->

<!-- About -->

<div id="about" class="content padding-6">
	<h1 class="text-colored"> COS'È DINO NET </h1>

	<p>
		<span class="waytoobigtext">HEY TU</span>, cerchi dinosauri? Beh li hai trovati, GRRRRRR <br>
        Lo sapevi che il <span xml:lang="en" lang="en">Tyrannosaurus Rex</span> mordeva con una forza di oltre 5800 Kg,
        pari alla massa di 13 pianoforti e ... aspetta! Non vorremmo rovinarti tutte le sorprese. <br>
        Se vuoi scoprire dettagli e curiosità su questi fantastici animali, puoi sfogliare la sezione
        <span class="text-italic">Specie</span>, oppure se ti interessano gli articoli sulle più recenti scoperte e
        teorie riguardanti il mondo preistorico, ti consigliamo la sezione <span class="text-italic">Articoli</span>.
        Se vuoi leggere un'introduzione sulla storia dei dinosauri, dalla comparsa all'estinzione, fai un salto alla
        pagina <span class="text-italic">Storia</span>. Invece nel caso tu stia solo curiosando, potresti cominciare dai
        <a href="#daily-stuff">contenuti del giorno</a>. Buona lettura!
	</p>
	<div id="home-shapes" class="row-padding hide-small">
		<div class="padding-large center floating-element">
			<span id="shape1" class="small-shape"></span> <!-- icona -->
			<p class="caption"> Scopri un sacco di dinosauri misteriosi </p>
		</div>
		<div class="padding-large center floating-element">
			<span id="shape2" class="small-shape"></span>
			<p class="caption"> Approfondisci la loro storia e il loro habitat </p>
		</div>
		<div class="padding-large center floating-element">
			<span id="shape3" class="small-shape"></span>
			<p class="caption"> Leggi le ultime scoperte degli archeologi  </p>
		</div>
	</div>
</div>

<!-- /About -->

<!-- Materiale del giorno -->


<div id="daily-stuff" class="content-large padding-6 no-print">
	<div class="row-padding center">
		<div class="wrap-padding half">
			<div class="card margin-half colored center wrap-padding">
				<h1>Il dinosauro del giorno</h1>
			</div>
			<?php			
				echo Dinosaur::getDinosaurDay($connect, ".", "display-specie.php?");
			?>
		</div>
		<div class="wrap-padding half">
			<div id="daily" class="card margin-half colored center wrap-padding">
				<h1>L'articolo del giorno</h1>
			</div>
			<?php				
				echo Article::getArticleDay($connect,".", "display-article.php?");
			?>
		
		</div>
	</div>
</div>

<!-- /Materiale del giorno -->


<!-- /Content -->

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