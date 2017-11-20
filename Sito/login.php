<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>TecWeb</title>
	<meta name="description" content="Descrizione">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<h1 class="title wide"> Accedi al tuo account </h1>
		<br>
		<h4>entra nel mondo dei dinosauri!</h4>
	</div>
</header>

<!-- /Header -->

<!-- Content -->

<!-- Login -->

<div id="login" class="content padding-12">
	<div class="card green-sea wrap-padding">
		<h1 xml:lang="en-EN" lang="en-EN">Login</h1>
		<hr>
		<form>
			<label xml:lang="en-EN" lang="en-EN"><p>email</p></label>
			<input type="text" placeholder="email">
			<label xml:lang="en-EN" lang="en-EN"><p>password</p></label>
			<input type="password" placeholder="password">
		</form>
	</div>
</div>

<!-- /Login -->

<!-- /Content -->

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
