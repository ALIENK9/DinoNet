<?php
	include_once ("classi/User.php");	

	session_start();
	
	if(!isset($_SESSION['user'])){		
		header("Location: login.php");
	}	
?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>Account | Dino Net</title>
	<meta name="description" content="Pagina di visualizzazione del tuo account Dino Net">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/print.css" media="print">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chelsea+Market">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
	
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

<header id="header-home" class="parallax padding-6 header-image">
	<?php

	if(isset($_GET['error']) && $_GET['error']=='1'){	

		echo "
		<div class='padding-6 content center'>
			<div class='card white wrap-padding'>
				<h1>Immagine non confrome alle richieste. La registrazione dell'utente è avvenuta senza considerare l'immagine.</h1>
			</div>
		</div>
		";
	}

	?>
	<div class="content">
		<div id="title-card" class="card">
			<h1 class="text-colored"> Ciao, <?php echo $_SESSION['user']->getNome();?> </h1>
			<h2>qui puoi visualizzare i dati del tuo account</h2>
		</div>
		<!-- Dati account -->

		<div class="card colored wrap-padding">
			<h1>Dati account</h1>			
			<?php		
			if($_SESSION['user']->getUrlImmagine()!=NULL && $_SESSION['user']->getUrlImmagine()!=""){
				echo ' <img class="profile-pic" src=".'.$_SESSION['user']->getUrlImmagine().'" alt="Immagine utente"/>';
			}
			?>
			<p><strong>Nome:</strong> <?php echo $_SESSION['user']->getNome();?></p>
			<p><strong>Cognome:</strong> <?php echo $_SESSION['user']->getCognome();?></p>
			<p><strong>Email:</strong> <?php echo $_SESSION['user']->getEmail();?></p>
		</div>
		<div class="card white wrap-padding">
			<a href="edit-account.php" class="btn card wrap-margin"> Modifica account </a>
			<a href="delete-account.php" class="btn card wrap-margin" onclick="return confirm('Sei Sicuro di voler eliminare l\'utente?')"> Elimina account </a>
            <a href="logout.php" class="btn card wrap-margin"><span xml:lang="en" lang="en"> Logout </span></a>
		</div>
		<!-- /Dati account -->
	</div>

</header>

<!-- /Header -->

<?php include_once('breadcrumb.php') ?>

<?php include_once('footer.php') ?>

<?php include_once('nojsmenu.php') ?>

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