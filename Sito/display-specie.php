<?php
	session_start();

	include_once ("classi/Dinosaur.php");
	
	include_once ("connect.php");
	$connectSpecies = startConnect();
?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>Scheda dinosauro &#124; Dino Net</title>
	<meta name="description" content="Pagina di visualizzazione del dinosauro">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="HTML, CSS, XML, JavaScript">
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
	<div id="title-card" class="content card">
		<h1> <?php echo $_GET["nome"]; ?> </h1>
	</div>
</header>

<!-- Breadcrumb -->

<?php 
	include_once('breadcrumb.php');
    echo breadcrumbUser();
?>

<!-- /Breadcrumb -->


<!-- Dinosauro -->
<div class="content padding-3">

	<?php 
	echo Dinosaur::printDinosaur($connectSpecies, $_GET["nome"],".");
	?>
	
</div>
<div id="commentboard" class="content panel">
	<div class="padding-large colored">
        <h1>Commenti</h1>
    </div>
	<div class="card wrap-padding">
		<a class="hidden" href="#casella-commento">Salta a inserisci un commento</a>
		
		<?php echo Dinosaur::getComment($connectSpecies,$_GET["nome"], ".") ?>
	</div>
	<div class="card center wrap-padding colored">			
		<?php
		if(isset($_SESSION['user'])){
			echo '
			<form action="addComment-specie.php" method="POST" onsubmit="return validateForm(this)">				
				<input type="hidden" name="idspecie" value="'.$_GET["nome"].'">
			    <p>
                    <h3><label for="casella-commento">Commenta</label></h3>
                    <textarea type="text" name="casella-commento" placeholder="Scrivi qui il tuo commento" id="casella-commento" class="fancy-border wrap-padding-small" required></textarea>
				</p>
				<input type="submit" value="PUBBLICA" class="card btn wide white">
			</form>
			';
		}
		else{
			echo "Per commentare devi effettuare l'accesso";
		}
		?>
	</div>
</div>

<div class="center wrap-padding">
	<a href="<?php echo $_SERVER["HTTP_REFERER"];?>" class="btn card wrap-margin">Torna alla pagina precedente</a>  
	<a href="all-species.php" class="btn card wrap-margin"> Vai alla lista completa dei dinosauri </a>	
</div>

<?php include_once('footer.php') ?>

<?php include_once('nojsmenu.php') ?>

<?php include_once('tothetop.php') ?>

</div>
	
</body>

<!-- /Body -->

</html>
<?php
closeConnect($connectSpecies);
?>