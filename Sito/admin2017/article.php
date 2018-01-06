<?php

include_once (__DIR__."/../classi/Article.php");

if(isset($_SESSION['user'])){

	include_once (__DIR__."/../connect.php");
	$connectArticle = startConnect();
	
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
				echo Article::printListArticle($connectArticle, $_GET["filter"], "..", true);
			else
				echo Article::printListArticle($connectArticle, "", "..", true);
			break;
		case 'formadd':
			echo Article::formAddArticle($_SERVER["PHP_SELF"]);
			break;
		case 'add':
			echo Article::addArticle($connectArticle, $_SESSION['user']->getEmail(), $_POST["titolo"], $_POST["sottotitolo"], $_POST["descrizione"], $_POST["eta"], $_POST["descrizioneimg"], $_FILES["imgarticle"]);
			break;			
		case 'formupdate':
			echo Article::formUpdateArticle($coconnectArticlennect, $_SERVER["PHP_SELF"],$_GET["article"]);
			break;
		case 'update':		
			$removeimg=false;
			if(isset($_POST['imgarticleremove']) && $_POST['imgarticleremove']=="true"){
				$removeimg=true;
			}
			echo Article::updateArticle($connectArticle, $_POST["article"], $_POST["titolo"], $_POST["sottotitolo"], $_POST["descrizione"], $_POST["eta"], $_POST["descrizioneimg"], $_FILES["imgarticle"], $removeimg);
			break;	
		case 'delete':
			if(isset($_GET["article"]))
				echo Article::deleteArticle($connectArticle, $_GET["article"]);
			break;
		
		default:
			header("Location: ../error.php");
			exit();
			break;
	}
	
	closeConnect($connectArticle);
	
}
else{
	
	header("Location: ../error.php");
	exit();
}
 ?>

