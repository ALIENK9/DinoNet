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
	<div id="daily-article" class="card">
		<div class="padding-large green-sea">
			<h1> Titolo dell'articolo </h1>
		</div>
		<img src="img/dailyarticle-test.jpg" alt="immagine raffigurante resti di dinosauro">
		<div class="wrap-padding">
			<p>
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
				totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
				sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
				consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
				
				<br><br>
				
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
				totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
				sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
				consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. 
				
				<br><br>
				
				Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
				consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
				totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
				sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
				consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
				
				<br><br>
				
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
				totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
				sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
				consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. 
				
				<br><br>
				
				Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
				consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
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
				<div id="daily-article" class="card wrap-margin">
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