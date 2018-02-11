<?php

include_once (__DIR__."/../classi/Dinosaur.php");
include_once (__DIR__ . "/../message.php");

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
                <div id="title-card" class="content card wrap-padding">
                    <h1>Elenco dei dinosauri</h1>
                    <h2>Da qui puoi aggiungere e modificare dinosauri e gestire i commenti associati</h2>
                    <a href="panel.php?id=dino&sez=formadd" class="btn card wrap-margin">Aggiungi un dinosauro</a>
                </div>
			</header>

		<?php
		include_once (__DIR__."/../breadcrumb.php");
		echo breadcrumbAdmin();

        echo alertMessageNoJs();

		echo Dinosaur::printListDinosaur($connectDinosaur, "", "..", $_SERVER["PHP_SELF"]."?id=dino&sez=formupdate&", $_SERVER["PHP_SELF"]."?id=dino&sez=delete&", $_SERVER["PHP_SELF"]."?id=dino&sez=comment&");
		break;
	case 'formadd':
		echo Dinosaur::formAddDinosaur($_SERVER["PHP_SELF"]);
		break;
	case 'add':
		if(!isset($_POST['nome'])){ $_POST['nome'] = ""; }
		if(!isset($_POST['peso'])){ $_POST['peso'] = ""; }
		if(!isset($_POST['altezza'])){ $_POST['altezza'] = ""; }
		if(!isset($_POST['lunghezza'])){ $_POST['lunghezza'] = ""; }
		if(!isset($_POST['periodomin'])){ $_POST['periodomin'] = ""; }
		if(!isset($_POST['periodomax'])){ $_POST['periodomax'] = ""; }
		if(!isset($_POST['habitat'])){ $_POST['habitat'] = ""; }
		if(!isset($_POST['alimentazione'])){ $_POST['alimentazione'] = ""; }
		if(!isset($_POST['tipologiaalimentazione'])){ $_POST['tipologiaalimentazione'] = ""; }
		if(!isset($_POST['descrizionebreve'])){ $_POST['descrizionebreve'] = ""; }
		if(!isset($_POST['descrizione'])){ $_POST['descrizione'] = ""; }
		if(!isset($_POST['curiosita'])){ $_POST['curiosita'] = ""; }
		if(!isset($_FILES['imgdinosaur'])){ $_FILES['imgdinosaur'] = NULL; }	

		$error = Dinosaur::addDinosaur($connectDinosaur, $_SESSION['paneluser']->getEmail(), $_POST["nome"], $_POST["peso"], $_POST["altezza"], $_POST["lunghezza"], $_POST["periodomin"], $_POST["periodomax"], $_POST["habitat"], $_POST["alimentazione"], $_POST["tipologiaalimentazione"], $_POST["descrizionebreve"], $_POST["descrizione"], $_POST["curiosita"], $_FILES["imgdinosaur"], "..");
		if($error[0] == 0){
			echo messageAddAnother($error[2],$_SERVER["PHP_SELF"]."?id=dino&sez=formadd");
		}
		else{
			if(isset($error[3]) && $error[3] != ""){
				echo Dinosaur::formAddDinosaur($_SERVER["PHP_SELF"], $_POST["nome"], $_POST["peso"], $_POST["altezza"], $_POST["lunghezza"], $_POST["periodomin"], $_POST["periodomax"], $_POST["habitat"], $_POST["alimentazione"], $_POST["tipologiaalimentazione"], $_POST["descrizionebreve"], $_POST["descrizione"], $_POST["curiosita"], $error[3]);
			}
			else{				
				echo Dinosaur::formAddDinosaur($_SERVER["PHP_SELF"], $_POST["nome"], $_POST["peso"], $_POST["altezza"], $_POST["lunghezza"], $_POST["periodomin"], $_POST["periodomax"], $_POST["habitat"], $_POST["alimentazione"], $_POST["tipologiaalimentazione"], $_POST["descrizionebreve"], $_POST["descrizione"], $_POST["curiosita"], $error[1]);
			}
		}
		break;			
	case 'formupdate':
		echo Dinosaur::formUpdateDinosaur($connectDinosaur, $_SERVER["PHP_SELF"],$_GET['nome']);
		break;
	case 'update':
		if(!isset($_POST['nome'])){ $_POST['nome'] = ""; }
		if(!isset($_POST['peso'])){ $_POST['peso'] = ""; }
		if(!isset($_POST['altezza'])){ $_POST['altezza'] = ""; }
		if(!isset($_POST['lunghezza'])){ $_POST['lunghezza'] = ""; }
		if(!isset($_POST['periodomin'])){ $_POST['periodomin'] = ""; }
		if(!isset($_POST['periodomax'])){ $_POST['periodomax'] = ""; }
		if(!isset($_POST['habitat'])){ $_POST['habitat'] = ""; }
		if(!isset($_POST['alimentazione'])){ $_POST['alimentazione'] = ""; }
		if(!isset($_POST['tipologiaalimentazione'])){ $_POST['tipologiaalimentazione'] = ""; }
		if(!isset($_POST['descrizionebreve'])){ $_POST['descrizionebreve'] = ""; }
		if(!isset($_POST['descrizione'])){ $_POST['descrizione'] = ""; }
		if(!isset($_POST['curiosita'])){ $_POST['curiosita'] = ""; }
		if(!isset($_FILES['imgdinosaur'])){ $_FILES['imgdinosaur'] = NULL; }
			
		$removeimg=false;
		if(isset($_POST['imgdinosaurremove']) && $_POST['imgdinosaurremove']=="true"){
			$removeimg=true;
		}
		$error = Dinosaur::updateDinosaur($connectDinosaur, $_POST["nome"], $_POST["peso"], $_POST["altezza"], $_POST["lunghezza"], $_POST["periodomin"], $_POST["periodomax"], $_POST["habitat"], $_POST["alimentazione"], $_POST["tipologiaalimentazione"], $_POST["descrizionebreve"], $_POST["descrizione"], $_POST["curiosita"], $_FILES["imgdinosaur"], $removeimg, "..");
		if($error[0] == 0){
			echo message($error[2]);
		}
		else{
			if(isset($error[3]) && $error[3] != ""){
				echo Dinosaur::formUpdateDinosaur($connectDinosaur, $_SERVER["PHP_SELF"], $_POST['nome'], $_POST["peso"], $_POST["altezza"], $_POST["lunghezza"], $_POST["periodomin"], $_POST["periodomax"], $_POST["habitat"], $_POST["alimentazione"], $_POST["tipologiaalimentazione"], $_POST["descrizionebreve"], $_POST["descrizione"], $_POST["curiosita"], $error[3]);
			}
			else{				
				echo Dinosaur::formUpdateDinosaur($connectDinosaur, $_SERVER["PHP_SELF"], $_POST['nome'], $_POST["peso"], $_POST["altezza"], $_POST["lunghezza"], $_POST["periodomin"], $_POST["periodomax"], $_POST["habitat"], $_POST["alimentazione"], $_POST["tipologiaalimentazione"], $_POST["descrizionebreve"], $_POST["descrizione"], $_POST["curiosita"], $error[1]);
			}
		}
		break;	
	case 'delete':
		if(isset($_GET["nome"]))
			echo Dinosaur::deleteDinosaur($connectDinosaur, $_GET["nome"], "..");
		break;	
	case 'comment':
		if(isset($_GET["nome"]))
            include_once (__DIR__."/../breadcrumb.php");
            echo breadcrumbAdmin();
			echo Dinosaur::getCommentToDelete($connectDinosaur, $_GET["nome"], $_SERVER["PHP_SELF"]."?id=dino&sez=deletecomment&", "..");
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

if($sezione!="list"){
	?>
	<div class="center wrap-padding">
		<?php if($sezione!="list" && $sezione!="add" && $sezione!="update" && $sezione!="delete"){	?>
			<a href="<?php echo $_SERVER["HTTP_REFERER"];?>" class="btn card wrap-margin">Torna alla pagina precedente</a>  
		<?php }	?> 	
		<a href="panel.php?id=dino" class="btn card wrap-margin"> Vai alla lista dei dinosauri</a>
		
	</div>	
	<?php
	}

closeConnect($connectDinosaur);


 ?>

