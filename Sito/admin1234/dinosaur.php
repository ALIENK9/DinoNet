<?php

include_once (__DIR__."/../classi/Dinosaur.php");

if(!isset($_SESSION['paneluser']) || $_SESSION['paneluser']==""){
	header("Location: ../error.php");
	exit();
}

include_once (__DIR__."/../connect.php");
$connectDinosaur = startConnect();

if(isset($_GET["sez"]))
	$sezione=$_GET["sez"];
else
	$sezione = "list";

switch ($sezione ) {
	case 'list':
			?>
			
			<header id="header-home" class="parallax padding-6 header-image">
				<div class="content">
					<div id="title-card" class="card wrap-padding">
						<h1>Elenco dei dinosauri</h1>
                        <h2>Da qui puoi aggiungere e modificare dinosauri e gestire i commenti associati</h2>
						<a href="panel.php?id=dino&sez=formadd" class="btn card wrap-margin">Aggiungi un dinosauro</a>
					</div>
				</div>
			</header>

		<?php
		include_once (__DIR__."/../breadcrumb.php");
		echo breadcrumbAdmin();
		echo Dinosaur::printListDinosaur($connectDinosaur, "", "..", $_SERVER["PHP_SELF"]."?id=dino&sez=formupdate&", $_SERVER["PHP_SELF"]."?id=dino&sez=delete&", $_SERVER["PHP_SELF"]."?id=dino&sez=comment&");
		break;
	case 'formadd':
		echo Dinosaur::formAddDinosaur($_SERVER["PHP_SELF"]);
		break;
	case 'add':
		echo Dinosaur::addDinosaur($connectDinosaur, $_SESSION['paneluser']->getEmail(), $_POST["nome"], $_POST["peso"], $_POST["altezza"], $_POST["lunghezza"], $_POST["periodomin"], $_POST["periodomax"], $_POST["habitat"], $_POST["alimentazione"], $_POST["tipologiaalimentazione"], $_POST["descrizionebreve"], $_POST["descrizione"], $_POST["curiosita"], $_FILES["imgdinosaur"], "..");
		break;			
	case 'formupdate':
		echo Dinosaur::formUpdateDinosaur($connectDinosaur, $_SERVER["PHP_SELF"],$_GET['nome']);
		break;
	case 'update':
		$removeimg=false;
		if(isset($_POST['imgdinosaurremove']) && $_POST['imgdinosaurremove']=="true"){
			$removeimg=true;
		}
		echo Dinosaur::updateDinosaur($connectDinosaur, $_POST["nome"], $_POST["peso"], $_POST["altezza"], $_POST["lunghezza"], $_POST["periodomin"], $_POST["periodomax"], $_POST["habitat"], $_POST["alimentazione"], $_POST["tipologiaalimentazione"], $_POST["descrizionebreve"], $_POST["descrizione"], $_POST["curiosita"], $_FILES["imgdinosaur"], $removeimg, "..");
		break;	
	case 'delete':
		if(isset($_GET["nome"]))
			echo Dinosaur::deleteDinosaur($connectDinosaur, $_GET["nome"], "..");
		break;	
	case 'comment':
		if(isset($_GET["nome"]))
			echo Dinosaur::getCommentToDelete($connectDinosaur, $_GET["nome"], $_SERVER["PHP_SELF"]."?id=dino&sez=deletecomment&", "..");
			include_once (__DIR__."/../breadcrumb.php");
			echo breadcrumbAdmin();
		break;		
	case 'deletecomment':
		if(isset($_GET["idcommento"]))
			echo Dinosaur::deleteComment($connectDinosaur, $_GET["idcommento"]);
		break;

	default:
		header("Location: ../error.php");
		exit();
		break;
}

?>
<div class="center wrap-padding">
	<a href="<?php echo $_SERVER["HTTP_REFERER"];?>" class="btn card wrap-margin">Torna alla pagina precedente</a>  
	<?php
	if($sezione!="list")
		echo '<a href="panel.php?id=dino" class="btn card wrap-margin"> Vai alla lista dei dinosauri</a>';
	?>
</div>	
<?php

closeConnect($connectDinosaur);


 ?>

