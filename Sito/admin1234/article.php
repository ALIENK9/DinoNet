<?php

include_once (__DIR__."/../classi/Article.php");
include_once (__DIR__ . "/../message.php");

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
		<header id="header-home" class="parallax padding-6 header-image">
            <div id="title-card" class="content card wrap-padding">
                <h1>Elenco degli articoli</h1>
                <h2>Da qui puoi aggiungere e modificare articoli e gestire i commenti degli utenti</h2>
                <a href="panel.php?id=article&sez=formadd" class="btn card wrap-margin">Aggiungi un articolo</a>
            </div>
        </header>


		<?php
		include_once (__DIR__."/../breadcrumb.php");
		echo breadcrumbAdmin();

        echo alertMessageNoJs();

		echo Article::printListArticle($connectArticle, "", "..", $_SERVER["PHP_SELF"]."?id=article&sez=formupdate&", $_SERVER["PHP_SELF"]."?id=article&sez=delete&", $_SERVER["PHP_SELF"]."?id=article&sez=comment&");
		break;
	case 'formadd':
		echo Article::formAddArticle($_SERVER["PHP_SELF"]);
		break;
	case 'add':
	
		if(!isset($_POST['titolo'])){ $_POST['titolo'] = ""; }
		if(!isset($_POST['sottotitolo'])){ $_POST['sottotitolo'] = ""; }
		if(!isset($_POST['descrizione'])){ $_POST['descrizione'] = ""; }
		if(!isset($_POST['anteprima'])){ $_POST['anteprima'] = ""; }
		if(!isset($_POST['descrizioneimg'])){ $_POST['descrizioneimg'] = ""; }
		if(!isset($_FILES['imgarticle'])){ $_FILES['imgarticle'] = NULL; }

		$error =  Article::addArticle($connectArticle, $_SESSION['paneluser']->getEmail(), $_POST["titolo"], $_POST["sottotitolo"], $_POST["descrizione"], $_POST["anteprima"], $_POST["descrizioneimg"], $_FILES["imgarticle"]);
		if($error[0] == 0){
			echo messageAddAnother($error[2],$_SERVER["PHP_SELF"]."?id=article&sez=formadd");
		}
		else{
			if(isset($error[3]) && $error[3] != ""){
				echo Article::formAddArticle($_SERVER["PHP_SELF"],$_POST['titolo'],$_POST['sottotitolo'],$_POST['descrizione'],$_POST['anteprima'], $error[3]);
			}
			else{				
				echo Article::formAddArticle($_SERVER["PHP_SELF"],$_POST['titolo'],$_POST['sottotitolo'],$_POST['descrizione'],$_POST['anteprima'], $error[1]);
			}
		}
		break;			
	case 'formupdate':
		echo Article::formUpdateArticle($connectArticle, $_SERVER["PHP_SELF"],$_GET["article"]);
		break;
	case 'update':	
		if(!isset($_POST['article'])){ $_POST['article'] = ""; }
		if(!isset($_POST['titolo'])){ $_POST['titolo'] = ""; }
		if(!isset($_POST['sottotitolo'])){ $_POST['sottotitolo'] = ""; }
		if(!isset($_POST['descrizione'])){ $_POST['descrizione'] = ""; }
		if(!isset($_POST['anteprima'])){ $_POST['anteprima'] = ""; }
		if(!isset($_POST['descrizioneimg'])){ $_POST['descrizioneimg'] = ""; }
		if(!isset($_FILES['imgarticle'])){ $_FILES['imgarticle'] = NULL; }	

		$removeimg=false;
		if(isset($_POST['imgarticleremove']) && $_POST['imgarticleremove']=="true"){
			$removeimg=true;
		}
		$error = Article::updateArticle($connectArticle, $_POST["article"], $_POST["titolo"], $_POST["sottotitolo"], $_POST["descrizione"], $_POST["anteprima"], $_POST["descrizioneimg"], $_FILES["imgarticle"], $removeimg, "..");
		if($error[0] == 0){
			echo message($error[2]);
		}
		else{
			if(isset($error[3]) && $error[3] != ""){
				echo Article::formUpdateArticle($connectArticle, $_SERVER["PHP_SELF"], $_POST["article"], $_POST["titolo"], $_POST["sottotitolo"], $_POST["descrizione"], $_POST["anteprima"], $error[3]);
			}
			else{				
				echo Article::formUpdateArticle($connectArticle, $_SERVER["PHP_SELF"], $_POST["article"], $_POST["titolo"], $_POST["sottotitolo"], $_POST["descrizione"], $_POST["anteprima"], $error[1]);
			}
		}
		
		break;	
	case 'delete':
		if(isset($_GET["article"]))
			echo Article::deleteArticle($connectArticle, $_GET["article"], "..");
		break;
	case 'comment':
		if(isset($_GET["article"]))
            include_once (__DIR__."/../breadcrumb.php");
            echo breadcrumbAdmin();
			echo Article::getCommentToDelete($connectArticle, $_GET["article"], $_SERVER["PHP_SELF"]."?id=article&sez=deletecomment&", "..");
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


if($sezione!="list"){
	?>
	<div class="center wrap-padding">
		<?php if($sezione!="list" && $sezione!="add" && $sezione!="update" && $sezione!="delete"){	?>
			<a href="<?php echo $_SERVER["HTTP_REFERER"];?>" class="btn card wrap-margin">Torna alla pagina precedente</a> 
		<?php }	?> 	
		<a href="panel.php?id=article" class="btn card wrap-margin"> Vai alla lista degli articoli</a>	
	</div>	
	<?php
}
closeConnect($connectArticle);

 ?>

