<?php

$homepath = substr( $_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
if (strpos($_SERVER['SCRIPT_NAME'], 'TecWeb') !== false) {
	$homepath .= "/TecWeb";
}
//$homepath = $_SERVER["DOCUMENT_ROOT"];

include_once ($homepath . "/classi/Article.php");

if(isset($_SESSION['user'])){
	
	if(isset($_GET["sez"]))
		$sezione=$_GET["sez"];
	else
		$sezione = "list";
	
	

	switch ($sezione) {
		case 'list':
		?>
		<header id="header-home" class="parallax">
			<div class="padding-6 content">						
				<div class="card white wrap-padding">
					<h1>Cerca un articolo</h1>
				</div>
				<div class="card colored wrap-padding">
					<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
						<input type="hidden" name="id" value="article">
						<input type="hidden" name="sez"  value="list">
						<p><label for="filtra">Filtro:</label></p>
						<input type="text" id="filtra" name="filter" value="<?php if(isset($_GET["filter"])) echo $_GET["filter"]; ?>">
						<br>
						<input type="submit" value="Cerca" title="Avvia la ricerca"  class="card btn wide text-colored white"/>
					</form>
				</div>
				<br>
				<div class="card white wrap-padding">
					<h1>Aggiungi un articolo</h1>
				</div>
				<div class="card colored wrap-padding">
					<a href="panel.php?id=article&sez=formadd" class="btn card colored wrap-margin"><p>Aggiungi un Articolo</p></a>
				</div>
			</div>
		</header>
	
		<?php
			if(isset($_GET["filter"]))
				echo Article::printListArticle($_GET["filter"], true);
			else
				echo Article::printListArticle("", true);
			break;
		case 'formadd':
			echo Article::formAddArticle($_SERVER["PHP_SELF"]);
			break;
		case 'add':
			echo Article::addArticle($_SESSION['user']->getEmail(), $_POST["titolo"], $_POST["sottotitolo"], $_POST["descrizione"], $_POST["eta"], $_POST["descrizioneimg"], $_FILES["imgarticle"]);
			break;			
		case 'formupdate':
			echo Article::formUpdateArticle($_SERVER["PHP_SELF"],$_GET["article"]);
			break;
		case 'update':		
			$removeimg=false;
			if(isset($_POST['imgarticleremove']) && $_POST['imgarticleremove']=="true"){
				$removeimg=true;
			}
			echo Article::updateArticle($_POST["article"], $_POST["titolo"], $_POST["sottotitolo"], $_POST["descrizione"], $_POST["eta"], $_POST["descrizioneimg"], $_FILES["imgarticle"], $removeimg);
			break;	
		case 'delete':
			if(isset($_GET["article"]))
				echo Article::deleteArticle($_GET["article"]);
			break;
		
		default:
			header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
			exit(); 
			break;
	}
	
}
 ?>

