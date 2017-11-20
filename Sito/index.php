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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<!-- Body -->

<body>

<?php include_once('loading.php') ?>

<?php include_once('menu.php') ?>

<div id="main" class="main">

<!-- Header -->

<header id="header-home" class="parallax padding-15">
	<div id="title-card" class="content card">
		<h1 class="title wide"> DINO SWAG </h1>
		<br>
		<h4>un divertente portale sui dinosauri</h4>
		<br><br>
		<a href="" class="btn green-sea"><p> impara qualcosa sui dinosauri </p></a>
	</div>
</header>

<!-- /Header -->

<!-- Content -->

<!-- About -->

<div id="about" class="content padding-6">
	<h1> COS'E' <span class="wide"> DINOSWAG </span> </h1>
	<br>
	<p>
		Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
		totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
		sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
		consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
	</p>
	<div class="row-padding">
		<div class="third padding-large">
			<img src="img/dino-shape-1.svg">
			<p class="caption"> Scopri un sacco di dinosauri misteriosi </p>
		</div>
		<div class="third padding-large">
			<img src="img/dino-shape-2.svg">
			<p class="caption"> Approfondisci la loro storia e il loro habitat </p>
		</div>
		<div class="third padding-large">
			<img src="img/dino-shape-3.svg">
			<p class="caption"> Leggi le ultime scoperte degli archeologi  </p>
		</div>
	</div>
</div>

<!-- /About -->

<!-- Cerca un dinosauro -->

<div id="dino-search" class="card green-sea padding-3">
	<div class="content">
		<label> <h1> CERCA UN DINOSAURO! </h1> </label>
		<input class="margin-2" type="text" placeholder="e.g. Tirannosaurus Rex">
	</div>
</div>

<!-- /Cerca un dinosauro -->

<!-- Materiale del giorno -->

<div id="daily-stuff" class="content padding-6">
	<div class="row-padding">
		<div class="half">
			<div id="daily-dino" class="card">
				<div class="padding-large green-sea">
					<h1> Il dinosauro del giorno </h1>
				</div>
				<img src="img/dailydino-test.png" alt="immagine raffigurante un triceratopo">
				<div class="padding-large">
					<h3 class="text-green-sea center"> Nome del dinosauro </h3>
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
					<a href="" class="btn green-sea"><p> Visualizza la scheda del dinosauro </p></a>
				</div>
			</div>
		</div>
		<div class="half">
			<div id="daily-article" class="card">
				<div class="padding-large green-sea">
					<h1> L'articolo del giorno </h1>
				</div>
				<img src="img/dailyarticle-test.jpg" alt="immagine raffigurante resti di dinosauro">
				<div class="padding-large">
					<h3 class="text-green-sea center"> Titolo dell'articolo </h3>
					<br>
					<p>
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
						totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
						sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
						consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
					</p>
				</div>
				<div class="center padding-2">
					<a href="" class="btn green-sea"><p> Leggi l'articolo </p></a>
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
