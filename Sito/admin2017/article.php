<?php

include_once (__DIR__."/../classi/Article.php");

if(!isset($_SESSION['paneluser']) || $_SESSION['paneluser']==""){
	header("Location: ../error.php");
	exit();
}

include_once (__DIR__."/../connect.php");
$connectArticle = startConnect();

if(isset($_GET["sez"]) && $_GET["sez"]!="")
	$sezione=$_GET["sez"];
else
	$sezione = "list";



switch ($sezione) {
	case 'list':
		?>
		<header id="header-home" class="parallax">
			<div class="padding-6 content">
				<div class="card white wrap-padding">
					<h1>Aggiungi un articolo</h1>
					<a href="panel.php?id=article&sez=formadd" class="btn card wrap-margin">Aggiungi un Articolo</a>
				</div>
			</div>
		</header>
	
		<?php
		echo Article::printListArticle($connectArticle, "", "..", $_SERVER["PHP_SELF"]."?id=article&sez=formupdate&", $_SERVER["PHP_SELF"]."?id=article&sez=delete&", $_SERVER["PHP_SELF"]."?id=article&sez=comment&");
		break;
	case 'formadd':
		echo Article::formAddArticle($_SERVER["PHP_SELF"]);
		break;
	case 'add':
		echo Article::addArticle($connectArticle, $_SESSION['paneluser']->getEmail(), $_POST["titolo"], $_POST["sottotitolo"], $_POST["descrizione"], $_POST["anteprima"], $_POST["eta"], $_POST["descrizioneimg"], $_FILES["imgarticle"]);
		break;			
	case 'formupdate':
		echo Article::formUpdateArticle($connectArticle, $_SERVER["PHP_SELF"],$_GET["article"]);
		break;
	case 'update':		
		$removeimg=false;
		if(isset($_POST['imgarticleremove']) && $_POST['imgarticleremove']=="true"){
			$removeimg=true;
		}
		echo Article::updateArticle($connectArticle, $_POST["article"], $_POST["titolo"], $_POST["sottotitolo"], $_POST["descrizione"], $_POST["anteprima"], $_POST["eta"], $_POST["descrizioneimg"], $_FILES["imgarticle"], $removeimg);
		break;	
	case 'delete':
		if(isset($_GET["article"]))
			echo Article::deleteArticle($connectArticle, $_GET["article"]);
		break;
	case 'comment':
		if(isset($_GET["article"]))
			echo Article::getCommentToDelete($connectArticle, $_GET["article"], $_SERVER["PHP_SELF"]."?id=article&sez=deletecomment&");
		break;		
	case 'deletecomment':
		if(isset($_GET["idcommento"]))
			echo Article::deleteComment($connectArticle, $_GET["idcommento"]);
		break;
	
	default:
		header("Location: ../error.php");
		exit();
		break;
}

closeConnect($connectArticle);

 ?>

