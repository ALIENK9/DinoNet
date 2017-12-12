<?php

include_once ("../classi/Article.php");
if(isset($_SESSION['user'])){
	
	if(isset($_GET["sez"]))
		$sezione=$_GET["sez"];
	else
		$sezione = "list";
	
	

	switch ($sezione) {
		case 'list':
		?>
		<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
			<input type="hidden" name="id" value="article">
			<input type="hidden" name="sez"  value="list">
			<label for="filtra">Filtro:</label>
			<input type="text" id="filtra" name="filter" value="<?php if(isset($_GET["filter"])) echo $_GET["filter"]; ?>">
			<input type="submit" value="Cerca" title="Avvia la ricerca" />
		</form>
	
		<a href="panel.php?id=article&sez=formadd" class="menu_entry">
			<p>Aggiungi un articolo</p>
		</a>
		<?php
			if(isset($_GET["filter"]))
				echo Article::printListArticle($_GET["filter"]);
			else
				echo Article::printListArticle("");
			break;
		case 'formadd':
			echo Article::formAddArticle($_SERVER["PHP_SELF"]);
			break;
		case 'add':
			echo Article::addArticle($_SESSION['user']->getEmail(), $_POST["titolo"], $_POST["sottotitolo"], $_POST["descrizione"], $_POST["eta"], $_POST["descrizioneimg"]);
			break;			
		case 'formupdate':
			echo Article::formUpdateArticle($_SERVER["PHP_SELF"],$_GET["article"]);
			break;
		case 'update':
			echo Article::updateArticle($_POST["article"], $_POST["titolo"], $_POST["sottotitolo"], $_POST["descrizione"], $_POST["eta"], $_POST["descrizioneimg"]);
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

