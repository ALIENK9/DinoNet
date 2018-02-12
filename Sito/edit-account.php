<?php

	include_once ("classi/User.php");	
    include_once("message.php");
    include_once ("validate.php");

	session_start();
	$error = array();
	if(!isset($_SESSION['user'])){		
		header("Location: login.php");
	}
	
	include_once ("connect.php");
	$connectUser = startConnect();
	if(isset($_GET["sez"]) && $_GET["sez"]=="update"){
				
		$removeimg=false;
		if(isset($_POST['imgaccountremove']) && $_POST['imgaccountremove']=="true"){
			$removeimg=true;			
		}
		$error = $_SESSION['user']->UpdateMyUser($connectUser, $_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'], $_FILES["imgaccount"], $removeimg, ".");
		if($error[0] == 0){
			header("Location: view-account.php");
		}
		
	}
	closeConnect($connectUser);

?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>Modifica account &#124; Dino Net</title>
	<meta name="description" content="Pagina di modifica del tuo account Dino Net">
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

    <!-- Topbar -->

    <?php include_once('topbar.php') ?>

    <!-- /Topbar -->

<!-- Header -->
<?php 

	if(isset($error[3]) && $error[3] != ""){
		echo $_SESSION['user']->formUpdateMyUser($_SERVER["PHP_SELF"]."?sez=update",$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'], $error[3]);
	}
	else{	
		if(isset($error[1]) && $error[1] != ""){
			echo $_SESSION['user']->formUpdateMyUser($_SERVER["PHP_SELF"]."?sez=update",$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'], $error[1]);
		}
		else{
			echo $_SESSION['user']->formUpdateMyUser($_SERVER["PHP_SELF"]."?sez=update");
		}
	}
?>
	<div class="center wrap-padding">
		<a href="<?php echo $_SERVER["HTTP_REFERER"];?>" class="btn card wrap-margin">Torna alla pagina precedente</a>  
		<a href="index.php" class="btn card wrap-margin"> Vai alla Home </a>	
	</div>	
				
<!-- /Header -->

<?php include_once('footer.php') ?>

<?php include_once('nojsmenu.php') ?>

<?php include_once('tothetop.php') ?>

</div>

</body>

<!-- /Body -->

</html>