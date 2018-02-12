<?php
	include_once ("connect.php");
	include_once ("classi/User.php");
    include_once("message.php");
    include_once ("validate.php");

	session_start();
    $error = array();
	if(isset($_SESSION['user'])){	
		session_unset();
	}
	if(isset($_POST["submit"])){	
		$connect = startConnect();
		
        $error = User::registerMyUser($connect,$_POST["email"],$_POST["nome"],$_POST["cognome"],$_POST["datanascita"],$_POST["password"],$_POST["passwordconf"],$_FILES["imgaccount"], "..");
        if($error[0]==0){
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
	<title>Registrazione &#124; Dino Net</title>
	<meta name="description" content="Descrizione">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/print.css" media="print">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chelsea+Market"> 
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
            <h1> Crea un account </h1>
            <h2>entra a far parte del mondo dei dinosauri!</h2>
        </div>
    </header>

    <div id="content-form" class="content card">
    <?php 
        include_once('breadcrumb.php');
        echo breadcrumbUser();
    ?>

        <?php
        if(isset($error[3]) && $error[3] != ""){
            echo messageErrorForm($error[3]);
        }
        if(isset($error[1]) && $error[1] != ""){
            echo messageErrorForm($error[1]);
        }
        ?>
        <form id="reg-form" action="#" method="POST"  enctype="multipart/form-data" onsubmit="return validateForm(this)" class="card colored wrap-padding">
            <p>I campi obbligatori sono contrassegnati con <abbr title="richiesto">*</abbr></p>

            <fieldset>
                <legend>Dati personali</legend>
                <p>
                    <label for="nome">Nome (non sono consentiti numeri): <abbr title="richiesto">*</abbr></label>
                    <input type="text" placeholder="Il tuo nome" id="nome" name="nome" data-validation-mode="nomi" value="<?php if(isset($_POST["submit"])) echo $_POST["nome"]  ?>" required>
                </p>

                <p>
                    <label for="cognome">Cognome (non sono consentiti numeri): <abbr title="richiesto">*</abbr></label>
                    <input type="text" placeholder="Il tuo cognome" id="cognome" name="cognome" data-validation-mode="nomi" value="<?php if(isset($_POST["submit"])) echo $_POST["cognome"]  ?>" required>
                </p>

                <p>
                    <label for="datanascita">Data di nascita (formato: gg/mm/aaaa): </label>
                    <input type="date" id="datanascita" name="datanascita" data-validation-mode="datanascita" value="<?php if(isset($_POST["submit"])) echo $_POST["datanascita"]  ?>">
                </p>
            </fieldset>

            <fieldset>
                <legend>Dati di accesso</legend>
                <p>
                    <label for="email">Email: <abbr title="richiesto">*</abbr></label>
                    <input type="email" placeholder="Il tuo indirizzo email" id="email" name="email" data-validation-mode="email" value="<?php if(isset($_POST["submit"])) echo $_POST["email"]  ?>" required>
                </p>

                <p>
                    <label for="password">Password: <abbr title="richiesto">*</abbr></label>
                    <input type="password" placeholder="Inserisci una password" id="password" name="password" data-validation-mode="password" value="" required>
                </p>

                <p>
                    <label for="passwordconf">Conferma password: <abbr title="richiesto">*</abbr></label>
                    <input type="password" placeholder="Ripeti la password inserita" id="passwordconf" name="passwordconf" data-validation-mode="confermapassword" value="" required>
                </p>

                <p>
                    <label for="imgaccount">Immagine profilo (il file deve avere una dimensione di 250px per 250px e il formato deve essere png, jpg o jpeg):</label>
                    <input type="file" id="imgaccount" name="imgaccount" value="<?php if(isset($_POST["submit"])) echo $_FILES["imgaccount"]  ?>">
                </p>
            </fieldset>

            <input type="hidden" name="submit" value="1">
            <input type="submit" value="REGISTRATI" title="Avvia l'operazione" class="card btn wide text-colored white">
        </form>
    </div>

</div>

<?php include_once('footer.php') ?>

    <?php include_once('nojsmenu.php') ?>

<?php include_once('tothetop.php') ?>

</div>

</body>

<!-- /Body -->

</html>