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

<header id="header-home" class="parallax padding-6">
	<div id="title-card" class="content card">
		<h1 class="title wide"> Titolo dell'articolo </h1>
	</div>
</header>

<!-- Articoli -->

<div class="padding-6 content">
	<div class="daily-article card">
		<div class="padding-large green-sea">
			<h1> Estinzione: diverse teorie</h1>
		</div>
		<img id="petrified_wood" src="img/petrified_wood.jpg" alt="Sezione pietrificata di tronco fossile nel parco nazionale della Foresta Pietrificata in Arizona">
		<div class="wrap-padding">
			<p>
				Dopo aver domiato la Terra per 170 milioni di anni, impedendo a tutte le altre forme (pesci, uccelli e soprattutto mammiferi) di affermarsi, i grandi rettili di colpo scomparvero. Sessantacinque milioni di anni fa, sulla Terra si produce un'immensa catastrofe che elimina tutti i dinosauri in ogni angolo del pianeta.<br>
				Non solo: ma anche gran parte della vita si estingue, oltre che sulla terraferma, anche nei mari e nei cieli. Secondo alcune stime il 50-70% delle specie viventi scomparvero. In particolare si estinsero tutti gli animali di una certa taglia, ma anche moltissimi animali microscopici, e buona parte del plancton. Sulla scomparsa dei dinosauri sono state formulate più di 60 ipotesi. Troppe. Alcune del tutto bizzarre, ma altre più probabili.
			</p>
			<img id="meteor_crater" src="img/meteor_crater.jpg" alt="Immagine del Meteor Crater in Arizona">
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
			<h2>Estinzione: e dopo?</h2>
			<p>
				L'era Cenozoica (che comprende l'attuale periodo Quaternario e il precedente Terziario) fece seguito all'estizione di massa della fine del Cretacico, che determinò la scomparsa dei dinosauri, degli pterosauri, dialcuni uccelli e mammiferi e di molte specie marine.
			</p>
			<p>
				Nel corso del Terziario inferiore, i mammiferi e gli uccelli sopravissuti si diversificarono rapidamente, occupando le nicchie ecologiche
				lasciate libere dai dinosauri. Nel Terziario superiore, durante le epoche del Miocene e Pliocene, la diffusione delle praterie condusse all'evoluzione di forme moderne di mammiferi erbivori.
			</p>
			<img id="carboniferous_forest" src="img/carboniferous_forest.jpg" alt="Uno scorcio di foresta del periodo Carbonifero">
			<p>
				A partire dal Quaternario (le cui epoche sono Pleistocene e Olocene), la vita animale e vegetale rassomigliava genericamente alle specie moderne, sebbene alcune, che si erano adattate alla sopravvivenza nel corso dei periodi glaciali, non siano sopravvissute fino ai giorni nostri. Alcune famiglie invece, sono giunte fino ai nostri giorni: per esempio le pteridofite, la grande famiglia delle felci, che fecero la loro apparizione durante il periodo Carbonifero, più di 300 milioni di anni fa.
			</p>
		</div>
	</div>
</div>

<div class="padding-6 content-large">
	<div class="green-sea center wrap-padding">
		<h1 class="title">Le ultime pubblicazioni</h1>
	</div>
	<div class="row-padding">
	<?php
		for($i = 0; $i < 3; $i++) {
		echo'
			<div class="third wrap-padding">
				<div class="daily-article card wrap-margin">
					<div class="padding-large green-sea">
						<h1> L\'articolo del giorno </h1>
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
						<a href="" class="btn green-sea"><p> Leggi l\'articolo </p></a>
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