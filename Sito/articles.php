<?php
	$homepath = substr( $_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
	if (strpos($_SERVER['SCRIPT_NAME'], 'TecWeb') !== false) {
		$homepath .= "/TecWeb";
	}

	//$homepath = $_SERVER["DOCUMENT_ROOT"];

	include_once ($homepath . "/classi/Article.php");

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

<header id="header-home" class="parallax padding-6">
	<div id="title-card" class="content card">
		<h1 class="title wide"> Gli articoli </h1>
		<br>
		<h2>scopri tutte le novità sul mondo dei dinosauri</h2>
	</div>
	<div id="input-area" class="content card colored wrap-padding">
		<div class="content">
            <h1> <label for="search-article"> CERCA UN ARTICOLO! </label> </h1>
            <input id="search-article" class="margin-2" type="text" placeholder="e.g. Scoperto dinosauro in Argentina">
			<input type="submit" value="CERCA" class="btn wide text-colored white">
			<br><br>
			<h1> OPPURE </h1>
			<a href="all-articles.php" class="btn card colored wrap-margin"><p> Vai alla lista completa degli articoli </p></a>
		</div>
	</div>
	<a href="#daily-article" title="Scorri all'articolo del giorno" class="down-arrow arrow btn bounce"></a>
</header>

<!-- Articoli -->

<div class="padding-6 side-padding content">

    <div id="daily-article" class="card margin-half colored center wrap-padding">
        <h1 class="title">L'articolo del giorno</h1>
        <hr>
        <p>Giornalmente selezioniamo un articolo per te. Buona lettura!</p>
    </div>

	<?php
		
			echo Article::getArticleDay();
		/*
		?>
	<div id="daily-article" class="card daily-article">
		<div class="padding-large colored">
			<h1> Quando gli insetti dominavano la terra </h1>
		</div>
		<img src="img/meganeura.jpg" alt="Fossile di Meganeura, una libellula gigante">
		<div class="padding-large">
			<h3 class="text-colored center"> Sottotitolo </h3>
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
	*/
	?>
</div>

<div class="padding-6">
	<div class="colored center wrap-padding">
		<h1 class="title">Le ultime pubblicazioni</h1>
	</div>
	<div class="row-padding content-large margin-top">
	<?php
		echo Article::printListArticleLimit("", 0, 3, false);
		/*
		for($i = 0; $i < 3; $i++) {
		echo'
			<div class="third wrap-padding">
				<div class="daily-article card margin-half"><!--tolto wrap-margin-->
					<div class="padding-large colored">
						<h1> Titolo dell\'articolo </h1>
					</div>
					<img src="img/dailyarticle-test.jpg" alt="immagine raffigurante resti di dinosauro">
					<div class="padding-large">
						<p>
							Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
							totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
							sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
							consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
						</p>
					</div>
					<div class="center padding-2">
						<a href="display-article.php" class="btn colored"><p> Leggi l\'articolo </p></a>
					</div>
				</div>
			</div>
		';
		}
		*/
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