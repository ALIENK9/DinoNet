<?php

	include_once ("connect.php");
	include_once ("classi/User.php");

	session_start();
	
	if(isset($_SESSION['user'])){	
		session_unset();
	}

    $error_login = 0;
	$connectLogin = startConnect();
	if(isset($_POST['email']) && isset($_POST["password"])){
		session_unset();
		if(User::login($connectLogin, $_POST["email"],$_POST["password"],'0')){
			$_SESSION['user'] = new User($connectLogin, $_POST['email']);
			header("Location: view-account.php");
        }	
        else{
            $error_login = 1;
        }
	}
	
	closeConnect($connectLogin);
?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>Accesso &#124; Dino Net</title>
	<meta name="description" content="Descrizione">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/print.css" media="print">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chelsea+Market">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/form.js"></script>
    <script type="text/javascript" src="js/buttons.js"></script>
	
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

    <?php include_once('topbar.php') ?>

<!-- Header -->
<div class="parallax padding-6 form-image">

    <header id="header-form" class="content card">
        <div id="title-card">
            <h1> Accedi al tuo account </h1>
            <h2>Entra nel mondo dei dinosauri!</h2>
        </div>
    </header>

    <div id="content-form" class="content card">
    <?php 
        include_once('breadcrumb.php');
        echo breadcrumbUser();
    ?>
        
        <?php
        if( $error_login == 1){
            echo "
                        <div class='card errore wrap-padding'>
                            <h1>Nome utente o password errati</h1>
                        </div>
            ";
        }
        ?>
        <form action="#" method="POST" onsubmit="return validateForm(this)" class="card colored wrap-padding">
        
            <p>
                <label for="input-email" xml:lang="en" lang="en">Email</label>
                <input id="input-email" type="text" placeholder="email" required name="email" data-validation-mode="email" value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>">
            </p>
            <p>
                <label for="input-passw" xml:lang="en" lang="en">Password</label>
                <input id="input-passw" type="password" placeholder="password" name="password" data-validation-mode="password" required>
            </p>

            <input type="submit" value="ACCEDI" class="card btn wide text-colored white">
        </form>
        <div class="white wrap-padding">
            <h3>Non hai ancora un account?</h3>
            <a href="register.php" class="btn card wrap-margin"> Registrati </a>
        </div>
    </div>

</div>


<!--div id="header-form" class="parallax padding-6 form-image">
    <div id="title-card" class="content card">
        <header>
            <h1> Accedi al tuo account </h1>
            <h2>Entra   nel mondo dei dinosauri!</h2>
        </header>

        <form action="#" method="POST" onsubmit="return validateForm(this)" class="card colored wrap-padding">
            <p>
                <label for="input-email" xml:lang="en" lang="en">Email</label>
                <input id="input-email" type="text" placeholder="email" required name="email" data-validation-mode="email" value="<!--?php if(isset($_POST["email"])) echo $_POST["email"]; ?>">
            </p>
            <p>
                <label for="input-passw" xml:lang="en" lang="en">Password</label>
                <input id="input-passw" type="password" placeholder="password" name="password" data-validation-mode="password" required>
            </p>

            <input type="submit" value="ACCEDI" class="card btn wide text-colored white">
        </form>
        <div class="white wrap-padding">
            <h3>Non hai ancora un account?</h3>
            <a href="register.php" class="btn card wrap-margin"> Registrati </a>
        </div>
    </div>
</div-->


<!--?php include_once('breadcrumb.php') ?>
    <-- Login>
    <div id="login" class="parallax padding-6 form-image">
        <div class="content center">
            <form action="#" method="POST" onsubmit="return validateForm(this)" class="card colored wrap-padding">
                <p>
                    <label for="input-email" xml:lang="en" lang="en">Email</label>
                    <input id="input-email" type="text" placeholder="email" required name="email" data-validation-mode="email" value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>">
                </p>
                <p>
                    <label for="input-passw" xml:lang="en" lang="en">Password</label>
                    <input id="input-passw" type="password" placeholder="password" name="password" data-validation-mode="password" required>
                </p>

                <input type="submit" value="ACCEDI" class="card btn wide text-colored white">
            </form>
            <div class="card white wrap-padding">
                <h1>Non hai ancora un account?</h1>
                <a href="register.php" class="btn card wrap-margin"> Registrati </a>
            </div>
        </div>
    </div>
    < Login -->

<?php include_once('footer.php') ?>

<?php include_once('nojsmenu.php') ?>

<?php include_once('tothetop.php') ?>

</div>

</body>

<!-- /Body -->

</html>