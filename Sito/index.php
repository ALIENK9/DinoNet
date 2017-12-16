<?php
	session_start();
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

<header id="header-home" class="parallax padding-12">
	<div id="title-card" class="content card">
		<h1 class="title wide"> DINO NET </h1>
		<br>
		<h2> Scopri i giganti della preistoria! E compratene uno! </h2>
		<br><br>
		<a href="#about" class="btn colored wrap-margin"><p> Informazioni sul sito </p></a>
		<a href="#search-label" class="btn colored wrap-margin"><p> Ricerca contenuti </p></a>
		<a href="#daily-stuff" class="btn colored wrap-margin"><p> Contenuti del giorno </p></a>		
	</div>
	<a href="#about" title="Vai a informazioni sul sito" class="down-arrow arrow btn bounce"></a>
</header>

<!-- /Header -->

<!-- Content -->

<!-- About -->

<div id="about" class="content padding-6">
	<h1 class="text-colored"> COS'È <span class="wide"> DINO NET </span> </h1>
	<br>
	<p class="side-padding">
		Questo sito è un stato realizzato per un progetto del corso di Tecnologie <span xml:lang="en" lang="en">Web</span> del
        Corso di Laurea in Informatica dell'Università di Padova, durante l'anno accademico 2017-2018. I testi descrittvi di ciascun dinosauro
        sono stati presi prevalentemente dai libri <em>Dinosauri la vita nella preistoria</em> di <span xml:lang="en" lang="en">Hazel Richardson</span>,
        e <em>Il pianeta dei Dinosauri</em> curato da Piero e Alberto Angela. Alcuni aggiustamenti sono stati fatti con informazioni prese da
        <a href="http://it.wikipedia.org/wiki/">Wikipedia</a>. Per un elenco dettagliato delle fonti delle immagini si prega di contattarci.
	</p>
	<div class="row-padding hide-small">
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

<!-- Ricerca -->

<div id="input-area" class="card colored wrap-padding center">
	<div class="content">
		<h1> <label id="search-label" for="search"> Cerchi qualcosa? </label> </h1>
		<input id="search" class="margin-2" type="text" placeholder="e.g. Tirannosaurus Rex">
		<input type="submit" value="CERCA" class="card btn wide text-colored white">
	</div>
</div>

<!-- /Ricerca -->

<!-- Materiale del giorno -->

<div id="daily-stuff" class="content-large padding-6 no-print">
	<div class="row-padding">
		<div class="half">
			<div id="daily-dino" class="card daily-dino">
				<div class="padding-large colored">
					<h1> Il dinosauro del giorno </h1>
				</div>
				<img src="img/dailydino-test.png" alt="immagine raffigurante un triceratopo">
				<div class="padding-large">
					<h2 class="text-colored center"> Nome del dinosauro </h2>
					<br>
					<ul>
						<li><strong>Nome scientifico:</strong> Tirannosaurus Rex</li>
						<li><strong>Alimentazione:</strong> Carnivoro</li>
						<li><strong>Peso:</strong> 100q</li>
					</ul>
					<p>
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
						totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
						sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
						consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
					</p>
				</div>
				<div class="center padding-2">
					<a href="display-specie.php" class="btn colored"><p> Visualizza la scheda del dinosauro </p></a>
				</div>
			</div>
		</div>
		<div class="half">
			<div id="daily-article" class="card daily-article">
				<div class="padding-large colored">
					<h1> L'articolo del giorno </h1>
				</div>
				<img src="img/dailyarticle-test.jpg" alt="immagine raffigurante resti di dinosauro">
				<div class="padding-large">
					<h2 class="text-colored center"> Titolo dell'articolo </h2>
					<br>
					<p>
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
						totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
						sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
						consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
					</p>
				</div>
				<div class="center padding-2">
					<a href="display-article.php" class="btn colored"><p> Leggi l'articolo </p></a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- /Materiale del giorno -->


<!-- /Content -->

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
