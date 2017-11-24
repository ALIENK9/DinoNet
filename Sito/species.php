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
		<h1 class="title wide"> Le specie </h1>
		<br>
		<h4> scopri informazioni dettagliate su innumerevoli dinosauri</h4>
	</div>
	<div class="content card green-sea wrap-padding">
		<div class="content">
			 <h1> <label for="search"> CERCA UN DINOSAURO! </label> </h1>
			<input id="search" class="margin-2" type="text" placeholder="e.g. Brontosauro">
		</div>
	</div>
</header>

<!-- Dinosauri -->

<div class="padding-6 content-large row-padding">
	<div class="half wrap-padding">
		<div class="card wrap-margin">
			<div class="green-sea center wrap-padding">
				<h1 class="title">Il dinosauro del giorno</h1>
				<hr>
				<p>Ogni giorno qui troverai un nuovo fantastico dinosauro!</p>
			</div>
		</div>
		<div class="daily-dino card">
			<div class="padding-large green-sea">
				<h1> Nome del dinosauro </h1>
			</div>
			<img src="img/dailydino-test.png" alt="Triceratopo">
			<div class="padding-large">
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
				<a href="display-specie.php" class="btn green-sea"><p> Visualizza la scheda del dinosauro </p></a>
			</div>
		</div>
	</div>
	<div class="half wrap-padding">
		<div class="card wrap-margin">
			<div class="green-sea center wrap-padding">
				<h1 class="title">L'articolo correlato</h1>
				<hr>
				<p>Ecco un articolo in cui compare il dinosauro del giorno!</p>
			</div>
		</div>
		<div class="daily-article card">
			<div class="padding-large green-sea">
				<h1> Titolo dell'articolo </h1>
			</div>
			<img src="img/dailyarticle-test.jpg" alt="Resti di dinosauro">
			<div class="padding-large">
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

<div class="padding-6 content-large">
	<div class="green-sea center wrap-padding">
		<h1 class="title">Le ultime aggiunte</h1>
		<p>Gli ultimi dinosauri aggiunti al nostro archivio!</p>
	</div>
	<div class="row-padding">
	<?php
		for($i = 0; $i < 3; $i++) {
		echo'
			<div class="third wrap-padding">
				<div class="daily-dino card wrap-margin">
					<div class="padding-large green-sea">
						<h1> Nome del dinosauro </h1>
					</div>
					<img src="img/dailydino-test.png" alt="Triceratopo">
					<div class="padding-large">
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
		';
		}
	?>
	</div>
</div>

</div>

<?php include_once('footer.php') ?>

<?php include_once('tothetop.php') ?>

</body>

<!-- /Body -->

</html>