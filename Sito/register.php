<?php
	include_once ("connect.php");
	include_once ("classi/User.php");

	session_start();
		
	if(isset($_SESSION['user'])){	
		session_unset();
	}
	$messaggioRegistrazione = "";
	if(isset($_POST["submit"])){	
		$connect = startConnect();
		$messaggioRegistrazione = User::registerMyUser($connect,$_POST["email"],$_POST["nome"],$_POST["cognome"],$_POST["password"],$_POST["passwordconf"]);
		echo $messaggioRegistrazione;
		if("Utente registrato" == $messaggioRegistrazione){
				session_unset();
				$_SESSION['user'] = new User($connect, $_POST['email']);
				header("Location: view-account.php");
		}
		closeConnect($connect);
	}
?>
<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>Registrazione | Dino Net</title>
	<meta name="description" content="Descrizione">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/print.css" media="print">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chelsea+Market"> 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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

<header id="header-home" class="parallax padding-6">
	<div class="content">
		<div id="title-card" class="card">
			<h1 class="text-colored"> Crea un account </h1>
			<h2>entra a far parte del mondo dei dinosauri!</h2>
		</div>
		
		<!-- Registrazione -->
		<?php	
		if(isset($_POST["submit"])){
			echo"<div id=\"title-card\" class=\"card\">
					<h1 class=\"text-colored\"> Errori: </h1>
					<h2>$messaggioRegistrazione</h2>
				</div>";
		}
		?>
		<div id="register">
			<div class="card colored wrap-padding">
				<form id="reg-form" action="#" method="POST"  enctype="multipart/form-data" onsubmit="return validateForm(this)">
					<p>
						<label for="email">Email</label>
						<input type="email" placeholder="Il tuo indirizzo email" id="email" name="email" data-validation-mode="email" value="" required>
					</p>
					
					<p>
						<label for="nome">Nome</label>
						<input type="text" placeholder="Il tuo nome" id="nome" name="nome" data-validation-mode="alphanum" value="" required>
					</p>
					
					<p>
						<label for="cognome">Cognome</label>
						<input type="text" placeholder="Il tuo cognome" id="cognome" name="cognome" data-validation-mode="alphanum" value="" required>
					</p>
					
					<p>
						<label for="datanascita">Data di nascita (formato: gg/mm/aaaa)</label>
						<input type="date" id="datanascita" name="datanascita" data-validation-mode="datanascita" value="">
					</p>
					
					<p>
						<label for="password">Password</label>
						<input type="password" placeholder="Inserisci una password" id="password" name="password" data-validation-mode="password" value="" required>
					</p>
					
					<p>
						<label for="passwordconf">Conferma password</label>
						<input type="password" placeholder="Ripeti la password inserita" id="passwordconf" name="passwordconf" data-validation-mode="confermapassword" value="" required>
					</p>
					
					<p>
						<label for="imgaccount">Immagine profilo (opzionale)</label>
						<input type="file" id="imgaccount" name="imgaccount" value="">
					</p>
					
					<input type="hidden" name="submit" value="1">
					<input type="submit" value="REGISTRATI" title="Avvia l'operazione" class="card btn wide text-colored white">
				</form>
			</div>
		</div>
		
		<!-- /Registrazione -->
	</div>

</header>

<!-- /Header -->

<?php include_once('breadcrumb.php') ?>

<?php include_once('footer.php') ?>

    <?php include_once('nojsmenu.php') ?>

<?php include_once('tothetop.php') ?>

</div>

</body>

<!-- /Body -->

</html>