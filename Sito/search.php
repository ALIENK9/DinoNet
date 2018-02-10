<?php   

    session_start(); 
    
    include_once ("classi/Dinosaur.php");	
    include_once ("classi/Article.php");	
    
	include_once ("connect.php");
    $connect = startConnect();
    
    if(!isset($_GET["input"])){
        $_GET["input"]="";
    }
?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
    <title>Risultati ricerca &#124; Dino Net</title>
    <meta name="description" content="Risultati della ricerca di specie o articoli">
    <meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML, CSS, XML, JavaScript">
    <link rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/print.css" media="print">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chelsea+Market">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/form.js"></script>

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
            <h1 class="text-colored">Risultati per la ricerca: <?php echo $_GET["input"] ?> </h1>
        </div>
		<a href="#dinosauri" aria-label="Scorri ai risultati della ricerca" class="down-arrow arrow btn card bounce">
			<span class="hidden">Scorri ai risultati della ricerca</span>
		</a>
    </header>
    <?php 
        include_once('breadcrumb.php');
        echo breadcrumbUser();
    ?>
    <!-- Dinosauri -->

    <div id="dinosauri" class="padding-6">
        <div class="colored center wrap-padding">
            <h1>Elenco riferito alla ricerca di dinosauri per </h1>
			<h2> "<?php echo $_GET["input"] ?>"</h2>
            <a href="#articoli">Vai ai risultati per gli articoli</a>
        </div>
        <div class="row-padding content-large margin-top">
            <?php
				echo Dinosaur::printListDinosaurUser($connect, $_GET["input"], ".", "display-specie.php?");
            ?>
        </div>
    </div>
    <div id="articoli" class="padding-6">
        <div class="colored center wrap-padding">
            <h1>Elenco riferito alla ricerca di articoli per </h1>
			<h2> "<?php echo $_GET["input"] ?>"</h2>
            <a href="#dinosauri">Vai ai risultati per i dinosauri</a>
        </div>
        <div class="row-padding content-large margin-top">
            <?php
				echo Article::printListArticleUser($connect, $_GET["input"], ".", "display-article.php?");
            ?>
        </div>
    </div>
    
    <div class="center wrap-padding">
        <a href="<?php echo $_SERVER["HTTP_REFERER"];?>" class="btn card wrap-margin">Torna alla pagina precedente</a>  
        <a href="index.php" class="btn card wrap-margin"> Vai alla home</a>	
    </div>
	
<?php include_once('footer.php') ?>

<?php include_once('tothetop.php') ?>

</div> <!-- main-->

</body>
</html>
<?php

	closeConnect($connect);
?>