<?php
	session_start();	

	include_once ("classi/Article.php");
	
	include_once ("connect.php");
	$connectArticle = startConnect();

?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>Scheda articolo | Dino Net</title>
	<meta name="description" content="Pagina di visualizzazione dell'articolo">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="HTML, CSS, XML, JavaScript">
	<link rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/print.css" media="print">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chelsea+Market">
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

    <!-- Topbar -->

    <?php include_once('topbar.php') ?>

    <!-- /Topbar -->

<!-- Header -->

<header id="header-home" class="parallax padding-6">
	<div id="title-card" class="content card">
		<h1 class="text-colored"> <?php echo $_GET["titolo"]; ?></h1>
	</div>
</header>

<!-- Breadcrumb -->

<?php include_once('breadcrumb.php') ?>

<!-- /Breadcrumb -->

<!-- Articoli -->

<div class="content-large padding-3">
	
	<?php

	echo Article::printArticle($connectArticle, $_GET["id"],".");
	

	/*
	<div class="card">
		<div class="padding-large colored">
			<h1> Estinzione: diverse teorie</h1>
		</div>

        <div class="wrap-padding article-content">

            <figure class="article-image-right">
                <img id="petrified_wood" src="img/petrified_wood.jpg"
                     alt="Sezione pietrificata di tronco fossile nel parco nazionale della Foresta Pietrificata in Arizona">
                <figcaption>
                    <p>
                        Vista aerea del Meteor Crater in Arizona. Questo cratere con diametro di circa 1200 metri è
                        stato generato circa 50000 anni fa dall'impatto di un meteorite largo 46 metri.
                    </p>
                </figcaption>
            </figure>

			<p>
				Dopo aver domiato la Terra per 170 milioni di anni, impedendo a tutte le altre forme (pesci, uccelli e soprattutto mammiferi) di affermarsi, i grandi rettili di colpo scomparvero. Sessantacinque milioni di anni fa, sulla Terra si produce un'immensa catastrofe che elimina tutti i dinosauri in ogni angolo del pianeta.<br>
				Non solo: ma anche gran parte della vita si estingue, oltre che sulla terraferma, anche nei mari e nei cieli. Secondo alcune stime il 50-70% delle specie viventi scomparvero. In particolare si estinsero tutti gli animali di una certa taglia, ma anche moltissimi animali microscopici, e buona parte del plancton. Sulla scomparsa dei dinosauri sono state formulate più di 60 ipotesi. Troppe. Alcune del tutto bizzarre, ma altre più probabili.
			</p>
            <figure class="article-image-left">
                <img id="meteor_crater" src="img/meteor_crater.jpg" alt="Il Meteor Crater in Arizona">
                <figcaption>
                    <p>
                        Vista aerea del Meteor Crater in Arizona. Questo cratere con diametro di circa 1200 metri è
                        stato generato circa 50000 anni fa dall'impatto di un meteorite largo 46 metri.
                    </p>
                </figcaption>
            </figure>
			<p>
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
				totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
				sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
				consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
			</p>
			<p>
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
				totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
				sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
				consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
			</p>
            <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
            </p>
            <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
            </p>
            <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
            </p>

            <figure class="article-image-right">
                <img id="carboniferous_forest" src="img/carboniferous_forest.jpg" alt="Uno scorcio di foresta del periodo Carbonifero">
                <figcaption>
                    <p>
                        Una raffigurazione di una palude del Carbonifero. Durante questo periodo si sviluppano gli
                        insetti tra i quali la Meganeura, libellula gigante, che raggiunge 70 centimetri d'apertura
                        alare e molte spece di aracnidi. Anche gli anfibi conoscono grande diffusione.
                    </p>
                </figcaption>
            </figure>

			<h2>Estinzione: e dopo?</h2>
			<p>
				L'era Cenozoica (che comprende l'attuale periodo Quaternario e il precedente Terziario) fece seguito
                all'estizione di massa della fine del Cretacico, che determinò la scomparsa dei dinosauri, degli
                pterosauri, dialcuni uccelli e mammiferi e di molte specie marine.
			</p>
			<p>
				Nel corso del Terziario inferiore, i mammiferi e gli uccelli sopravissuti si diversificarono
                rapidamente, occupando le nicchie ecologiche lasciate libere dai dinosauri. Nel Terziario superiore,
                durante le epoche del Miocene e Pliocene, la diffusione delle praterie condusse all'evoluzione
                di forme moderne di mammiferi erbivori.
			</p>

			<p>
				A partire dal Quaternario (le cui epoche sono Pleistocene e Olocene), la vita animale e vegetale
                rassomigliava genericamente alle specie moderne, sebbene alcune, che si erano adattate alla
                sopravvivenza nel corso dei periodi glaciali, non siano sopravvissute fino ai giorni nostri.
                Alcune famiglie invece, sono giunte fino ai nostri giorni: per esempio le pteridofite, la grande
                famiglia delle felci, che fecero la loro apparizione durante il periodo Carbonifero, più di 300 milioni
                di anni fa.
			</p>
		</div>
	</div>
	*/?>
</div>

<?php //include_once 'commentboard.php'?>

<div id="commentboard" class="content panel">
	<div class="card wrap-padding">
		<a class="hidden" href="#casella-commento">Salta a inserisci un commento</a>
		<?php echo Article::getComment($connectArticle,$_GET["id"]) ?>
	</div>
	<div class="card center wrap-padding colored">			
		<?php
		if(isset($_SESSION['user'])){
			echo '
			<form action="addComment-article.php" method="POST">				
				<input type="hidden" name="idarticolo" value="'.$_GET["id"].'">
				<h3><label for="casella-commento">Commenta</label></h3>
				<textarea type="text" name="casella-commento" placeholder="Scrivi qui il tuo commento" id="casella-commento" class="fancy-border wrap-padding-small"></textarea>
				<br>
				<input type="submit" value="PUBBLICA" class="card btn wide text-colored white">
			</form>
			';
		}
		else{
			echo "Per commentare devi effettuare l'accesso";
		}
		?>
	</div>
</div>

<div class="padding-6 no-print">
	<div class="colored center wrap-padding">
		<h1 class="title">Le ultime pubblicazioni</h1>
	</div>
	<div class="row-padding content-large margin-top">
	<?php
		echo Article::printListArticleUserLimit($connectArticle, "", 0, 3, ".", "display-article.php?", true);
		
	?>
	</div>
</div>


<?php include_once('footer.php') ?>

<?php include_once('tothetop.php') ?>

</div>
	
</body>

<!-- /Body -->

</html>

<?php

closeConnect($connectArticle);

?>