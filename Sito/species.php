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
	<div id="title-card" class="content card">
		<h1 class="title wide"> Le specie </h1>
		<br>
		<h4> Scopri informazioni dettagliate su innumerevoli dinosauri </h4>
	</div>
	<div class="content card colored wrap-padding">
		<div class="content center">
			<h1> <label for="search-dino"> CERCA UN DINOSAURO! </label> </h1>
			<input id="search-dino" class="margin-2" type="text" placeholder="e.g. Brontosauro">
			<input type="submit" value="CERCA" class="card btn wide text-colored white">
            <br/><br/>
            <a href="all-species.php"><p>&GreaterGreater; Vai alla lista completa delle specie &LessLess;</p></a>
		</div>
	</div>
	<a href="#daily-dino" class="down-arrow arrow btn bounce"></a>
</header>

<!-- Dinosauri -->

<div class="padding-6 content-large row-padding">
	<div id="daily-dino" class="half wrap-padding">

		<div class="card margin-half colored center wrap-padding">
			<h1 class="title">Il dinosauro del giorno</h1>
			<hr>
            <p>Ogni giorno qui troverai un nuovo fantastico dinosauro!</p>
		</div>

		<div class="daily-dino card"> <!--tolto wrap-margin-->
			<div class="padding-large colored">
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
				<a href="display-specie.php" class="btn colored"><p> Visualizza la scheda del dinosauro </p></a>
			</div>
		</div>
	</div>
	<div class="half wrap-padding">

		<div class="card margin-half colored center wrap-padding">
			<h1 class="title">L'articolo correlato</h1>
			<hr>
			<p>Ecco un articolo in cui compare il dinosauro del giorno!</p>
		</div>

		<div class="daily-article card"><!--tolto wrap-margin-->
			<div class="padding-large colored">
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
				<a href="" class="btn colored"><p> Leggi l'articolo </p></a>
			</div>
		</div>
	</div>
</div>

<div class="padding-6">
	<div class="colored center wrap-padding">
		<h1 class="title">Le ultime aggiunte</h1>
		<p>Gli ultimi dinosauri aggiunti al nostro archivio!</p>
	</div>
	<div class="row-padding content-large margin-top">
	<?php
		for($i = 0; $i < 3; $i++) {
		echo'
			<div class="third wrap-padding">
				<div class="daily-dino card margin-half"><!--tolto wrap-margin-->
					<div class="padding-large colored">
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
						<a href="" class="btn colored"><p> Visualizza la scheda del dinosauro </p></a>
					</div>
				</div>
			</div>
		';
		}
	?>
	</div>
</div>

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