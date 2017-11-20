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

<div id="main" class="main">

<!-- Header -->

<header id="header-home" class="parallax padding-6">
	<div id="title-card" class="content card">
		<h1 class="title wide"> Il triceratopo </h1>
	</div>
</header>


<!-- Dinosauro -->

<div class="padding-6 content-large row-padding">
	<div class="half wrap-padding">
		<div class="card">
			<div class="green-sea center wrap-padding">
				<h1 class="title">Il triceratopo</h1>
			</div>
			<div class="white wrap-padding">
				<h3>Una curiosità</h3>
				<p>
					<strong> Lo sapevi che... </strong> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
					totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
					sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
					consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
				</p>
				<h3>Caratteristiche</h3>
				<ul>
					<li><strong>Nome scientifico:</strong> Tirannosaurus Rex</li>
					<li><strong>Alimentazione:</strong> Carnivoro</li>
					<li><strong>Peso:</strong> 100q</li>
				</ul>
				<h3>Descrizione</h3>
				<p>
					Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
					totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
					sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
					consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
				</p>
			</div>
		</div>
	</div>
	<div class="half wrap-padding">
		<div id="daily-dino" class="card">
			<img src="img/dailydino-test.png" alt="immagine raffigurante un triceratopo">
		</div>
	</div>
</div>

</div>

<?php include_once('footer.php') ?>

<?php include_once('tothetop.php') ?>

</body>

<!-- /Body -->

</html>