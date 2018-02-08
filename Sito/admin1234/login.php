<?php

	include_once ("../classi/UserAdmin.php");

	session_start();
	include_once ("../connect.php");
	
	$connectLogin = startConnect();
	
	if(isset($_SESSION['paneluser'])){	
		session_unset();
	}

	if(isset($_POST['email']) && isset($_POST["password"])){
		session_unset();
		if(User::login($connectLogin, $_POST["email"], $_POST["password"],'1')){
			$_SESSION['paneluser'] = new UserAdmin($connectLogin, $_POST['email']);
			header("Location: panel.php?id=home");
		}	
	}
	
	closeConnect($connectLogin);
?>

<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>Login &#124; Amministrazione</title>
	<meta name="description" content="Descrizione">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/print.css" media="print">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chelsea+Market">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/form.js"></script>
	
	<!-- Favicon -->
	
	<link rel="apple-touch-icon" sizes="57x57" href="../img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="../img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
	<link rel="manifest" href="../img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="../img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>

<!-- Body -->

<body>

<!-- Header -->
<div id="main" class="full-screen">

    <div class="parallax padding-6 form-image">

        <header id="header-form" class="content card">
            <div id="title-card">
                <h1> Accesso al pannello di amministrazione </h1>
            </div>
        </header>

        <div id="content-form" class="content card">
            <form action="#" method="POST" onsubmit="return validateForm(this)" class="card colored wrap-padding">
                <p>
                    <label for="input-email" xml:lang="en" lang="en">Email</label>
                    <input id="input-email" type="text" placeholder="email" name="email" data-validation-mode="email" value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>" required>
                </p>
                <p>
                    <label for="input-passw" xml:lang="en" lang="en">Password</label>
                    <input id="input-passw" type="password" placeholder="password" name="password" data-validation-mode="password" required>
                </p>

                <input type="submit" value="ACCEDI" class="card btn wide text-colored">
            </form>
            <div class="white wrap-padding">
                <p>oppure</p>
                <a href="../index.php" class="btn card wrap-margin">Vai alla <span xml:lang="en" lang="en">Home</span> pubblica</a>
            </div>
        </div>

    </div>

    <?php include_once('../footer.php') ?>

    <?php include_once('../tothetop.php') ?>

</div>

<!-- /Header -->

</body>

<!-- /Body -->

</html>
