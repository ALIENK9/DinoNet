<?php
	
	include_once ("../classi/UserAdmin.php");
	include_once ("../errormessage.php");

	session_start();	
	if(!isset($_SESSION['paneluser']) || $_SESSION['paneluser']==""){
		header("Location: ../error.php");
		exit();
	}
		
	if(isset($_GET["id"]) && $_GET["id"]=='logout'){
		header("Location: logout.php");
		exit();
	}


	include_once ("../connect.php");
	$connectPanel = startConnect();

?>

	<!DOCTYPE html>
	<html xml:lang="it-IT" lang="it-IT">
	<head>
		<title>
		<?php
		if(isset($_GET["id"]) && $_GET["id"]!="")
			$idPage=$_GET["id"];
		else
			$idPage = "home";

		if(isset($_GET["sez"]) && $_GET["sez"]!="")
			$sezione=$_GET["sez"];
		else
			$sezione = "list";

		include_once ("titles.php");
		echo printTitleAdmin($idPage,$sezione);
		?>
		</title>
		<meta name="description" content="Descrizione">
		<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="HTML, CSS, XML, JavaScript">
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

    <?php include_once ('../loading.php'); ?>
	
    <?php include_once ('menuadmin.php'); ?>

	<div id="main" class="main">


	<!-- Content -->

    <!-- Topbar -->

    <?php include_once ('topbaradmin.php') ?>

    <!-- /Topbar -->

	<!-- inclusione pagina da visualizzare -->

	<?php 

		switch ($idPage) {
			case 'home':
				include_once('home.php');
				break;

			case 'user':
				include_once('user.php');
				break;

			case 'myuser':
					if(isset($_GET["sez"]) && $_GET["sez"]=="update" ){		
						$removeimg=false;
						if(isset($_POST['imgaccountremove']) && $_POST['imgaccountremove']=="true"){
							$removeimg=true;	
						}	
						$error = $_SESSION['paneluser']->UpdateMyUser($connectPanel, $_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'], $_FILES["imgaccount"], $removeimg,"..");
						if($error[0] == 0){
							echo message($error[2]);
						}
						else{
							if(isset($error[3]) && $error[3] != ""){
								echo $_SESSION['paneluser']->formUpdateMyUser($_SERVER["PHP_SELF"]."?id=myuser&sez=update",$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'], $error[3]);
							}
							else{				
								echo $_SESSION['paneluser']->formUpdateMyUser($_SERVER["PHP_SELF"]."?id=myuser&sez=update", $_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'], $error[1]);
							}
						}
					}
					else
						echo $_SESSION['paneluser']->formUpdateMyUser($_SERVER["PHP_SELF"]."?id=myuser&sez=update");
					
					echo messageLinkDoubleBack("panel.php?id=home","Home");
				break;

			case 'dino':
				include_once('dinosaur.php');
				break;

			case 'article':
				include_once('article.php');
				break;	

			case 'search':
				include_once('searchadmin.php');
				
				
				echo messageLinkDoubleBack("panel.php?id=home","Home");
				break;	

			case 'logout': default:		
				include_once('logout.php');
				break;
		}
	?>

	<!-- /inclusione pagina da visualizzare -->

    <?php include_once('../footer.php') ?>

    <?php include_once('nojsmenuadmin.php') ?>
	
    </div>

	<!-- /Content -->

	<?php include_once('../tothetop.php') ?>

	</body>

	<!-- /Body -->

	</html>

<?php
	closeConnect($connectPanel);
?>
