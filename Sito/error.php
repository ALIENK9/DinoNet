<?php
	session_start();
?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>Errore! &#124; Dino Net</title>
	<meta name="description" content="Pagina di errore per il sito Dino Net">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chelsea+Market">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/buttons.js"></script>
</head>

<!-- Body -->

<body>

<?php include_once('loading.php') ?>

<?php include_once('menu.php') ?>

<div id="main" class="main">

<?php include_once('topbar.php') ?>

<!-- Header -->

<header id="header-home" class="parallax padding-6 header-image">
	<div id="title-card" class="content card page-not-found">
        <h1> Questa pagina si è estinta :( </h1>
        <span id="error-image" class="half"></span>
        <div class="wrap half">
            <p> Puoi ritornare alla Home con il pulsante qui sotto, oppure puoi utilizzare il menù </p>
            <a href="index.php" class="btn card wrap-margin">Torna alla <span xml:lang="en" lang="en">Home</span></a>
        </div>
	</div>
</header>

<!-- /Header -->

<?php include_once('footer.php') ?>

<?php include_once('nojsmenu.php') ?>

<?php include_once('tothetop.php') ?>

</div>

</body>

<!-- /Body -->

</html>
