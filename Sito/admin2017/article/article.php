<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
	if(!isset($_GET["sez"]) || $_GET["sez"]=="list"){
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
	}

	if(isset($_GET["sez"])){
		switch ($_GET["sez"]) {
			case 'list':
				include_once('article/listarticle.php');
				break;
			case 'formadd':
				include_once('article/formaddarticle.php');
				break;
			case 'add':
				include_once('article/addarticle.php');
				break;
			case 'update':
				include_once('article/updatearticle.php');
				break;				
			case 'formupdate':
				include_once('article/formupdatearticle.php');
				break;
			case 'delete':
				include_once('article/delarticle.php');
				break;
			
			default:
				//logout forzato
				break;
		}
	}
	else{
		include_once('article/listarticle.php');
	}
}
 ?>

