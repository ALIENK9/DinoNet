<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>TecWeb</title>
	<meta name="description" content="Descrizione">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="HTML, CSS, XML, JavaScript">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<!-- Body -->

<body>

<?php include_once('loading.php') ?>

<?php include_once('menu.php') ?>

<div id="main" class="main w3-card">

<!-- Header -->

<header id="header-home" class="w3-center parallax padding-15">
	<div id="title-card" class="w3-content w3-card">
		<h1 class="w3-wide title"> DINO SWAG </h1>
		<br>
		<h3>un divertente portale sui dinosauri</h3>
		<br><br>
		<a href="" class="w3-btn w3-flat-green-sea w3-round"><p> impara qualcosa sui dinosauri </p></a>
	</div>
</header>

<!-- /Header -->

<!-- Content -->

<!-- About -->

<div id="about" class="w3-content w3-container padding-6">
	<h1 class="w3-center"> COS'E' <span class="w3-wide"> DINOSWAG </span> </h1>
	<br>
	<p>
		Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
		totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
		sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
		consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
	</p>
	<div class="w3-row-padding">
		<div class="w3-third w3-padding-large">
			<img src="img/dino-shape-1.svg" style="width:100%">
			<p class="w3-center w3-large"> Scopri un sacco di dinosauri misteriosi </p>
		</div>
		<div class="w3-third w3-padding-large">
			<img src="img/dino-shape-2.svg" style="width:100%">
			<p class="w3-center w3-large"> Approfondisci la loro storia e il loro habitat </p>
		</div>
		<div class="w3-third w3-padding-large">
			<img src="img/dino-shape-3.svg" style="width:100%">
			<p class="w3-center w3-large"> Leggi le ultime scoperte degli archeologi  </p>
		</div>
	</div>
</div>

<!-- /About -->

<!-- Cerca un dinosauro -->

<div class="w3-card w3-flat-green-sea padding-3">
	<div class="w3-center w3-content w3-container ">
		<label> <h1 class="w3-text-white"> CERCA UN DINOSAURO! </h1> </label>
		<input class="w3-input w3-round margin-2" type="text" placeholder="e.g. Tirannosaurus Rex">
	</div>
</div>

<!-- /Cerca un dinosauro -->

<!-- Materiale del giorno -->

<div class="w3-content w3-container padding-6">
	<div class="w3-row-padding">
		<div class="w3-half">
			<div class="w3-card-2 w3-white">
				<div class="w3-padding-large w3-flat-green-sea">
					<h1 class="w3-text-white w3-center"> Il dinosauro del giorno </h1>
				</div>
				<img src="img/dailydino-test.png" style="width:100%; margin-bottom:2em">
				<div class="w3-padding-large">
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
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card-2 w3-white">
				<div class="w3-padding-large w3-flat-green-sea">
					<h1 class="w3-text-white w3-center"> L'articolo del giorno </h1>
				</div>
				<img src="img/dailyarticle-test.jpg" style="width:100%; margin-bottom:2em">
				<div class="w3-padding-large">
					<p>
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
						totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
						sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
						consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
					</p>
				</div>
				<div class="w3-center padding-2">
					<a class="w3-btn w3-flat-green-sea w3-round"><p> Leggi l'articolo </p></a>
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

</body>

<!-- /Body -->

</html>
