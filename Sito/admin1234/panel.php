<?php
	
	include_once ("../classi/UserAdmin.php");

	session_start();	
	if(!isset($_SESSION['paneluser']) || $_SESSION['paneluser']==""){
		header("Location: ../error.php");
		exit();
	}
		
	if(isset($_GET["id"]) && $_GET["id"]=='logout'){ // se effettuo il controllo dopo l'inclusione del menù mi da errore
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

		switch ($idPage) {
			case 'home':
				echo "Home | Dino Net";
				break;

			case 'user':
				switch ($sezione) {
					case 'list':
					echo "Elenco utenti | Dino Net";
					break;
					case 'formadd':			
						echo "Aggiunti utente | Dino Net";
						break;
					case 'add':
						echo "Aggiunti utente | Dino Net";
						break;
					case 'formupdate':
						echo "Modifica utente | Dino Net";
						break;
					case 'update':
						echo "Modifica utente | Dino Net";		
						break;		
					case 'delete':
						echo "Elimina utente | Dino Net";
						break;					
					default:
						echo "Area utenti | Dino Net";
					break;
				}
				break;

			case 'myuser':					
				echo "Modifica profilo | Dino Net";
				break;

			case 'dino':
				switch ($sezione) {
					case 'list':
						echo "Elenco dinosauri | Dino Net";
						break;
					case 'formadd':	
						echo "Aggiunti dinosauro | Dino Net";		
						break;
					case 'add':
						echo "Aggiunti dinosauro | Dino Net";		
						break;
					case 'formupdate':
						echo "Modifica dinosauro | Dino Net";
						break;
					case 'update':	
						echo "Modifica dinosauro | Dino Net";	
						break;		
					case 'delete':
						echo "Elimina dinosauro | Dino Net";
						break;	
					case 'comment':
						echo "Elenco commenti dinosauro | Dino Net";
						break;	
					case 'deletecomment':	
						echo "Elimina commenti dinosauro | Dino Net";
						break;				
					default:
						echo "Area dinosauri | Dino Net";
						break;
				}
				break;

			case 'article':
				switch ($sezione) {
					case 'list':
						echo "Elenco articoli | Dino Net";
						break;
					case 'formadd':	
						echo "Aggiunti articolo | Dino Net";		
						break;
					case 'add':
						echo "Aggiunti articolo | Dino Net";		
						break;
					case 'formupdate':
						echo "Modifica articolo | Dino Net";
						break;
					case 'update':	
						echo "Modifica articolo | Dino Net";	
						break;		
					case 'delete':
						echo "Elimina articolo | Dino Net";
						break;	
					case 'comment':
						echo "Elenco commenti articolo | Dino Net";
						break;	
					case 'deletecomment':	
						echo "Elimina commenti articolo | Dino Net";
						break;				
					default:
						echo "Area articoli | Dino Net";
						break;
				}
				break;	

			case 'search':
					echo "Ricerca | Dino Net";
				break;	

			default:	
				echo "Pannello amministratore | Dino Net";	
				break;
			}
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
        <script type="text/javascript" src="../js/index.js"></script>
		
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
						echo $_SESSION['paneluser']->UpdateMyUser($connectPanel, $_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'], $_FILES["imgaccount"], $removeimg,"..");
					}
					else
						echo $_SESSION['paneluser']->formUpdateMyUser($_SERVER["PHP_SELF"]."?id=myuser&sez=update");
					
					?>
					<div class="center wrap-padding">
						<a href="<?php echo $_SERVER["HTTP_REFERER"];?>" class="btn card wrap-margin">Torna alla pagina precedente</a>  
						<a href="panel.php?id=home" class="btn card wrap-margin"> Vai alla Home </a>	
					</div>	
					<?php
				break;

			case 'dino':
				include_once('dinosaur.php');
				break;

			case 'article':
				include_once('article.php');
				break;	

			case 'search':
				include_once('searchadmin.php');
				
				?>
				<div class="center wrap-padding">
					<a href="<?php echo $_SERVER["HTTP_REFERER"];?>" class="btn card wrap-margin">Torna alla pagina precedente</a>  
					<a href="panel.php?id=home" class="btn card wrap-margin"> Vai alla Home </a>	
				</div>	
				<?php
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
