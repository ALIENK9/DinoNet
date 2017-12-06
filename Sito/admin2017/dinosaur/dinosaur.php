<?php

if(isset($_SESSION['login']) && $_SESSION['login']!=null){
	if(!isset($_GET["sez"]) || $_GET["sez"]=="list"){
		?>
	<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
		<input type="hidden" name="id" value="dino">
		<input type="hidden" name="sez"  value="list">
		<label for="filtra">Filtro:</label>
		<input type="text" id="filtra" name="filter" value="<?php if(isset($_GET["filter"])) echo $_GET["filter"]; ?>">
		<input type="submit" value="Cerca" title="Avvia la ricerca" />
	</form>

	<a href="panel.php?id=dino&sez=formadd" class="menu_entry">
		<p>Aggiungi un Dinosauro</p>
	</a>
	<?php
	}
	if(isset($_GET["sez"])){
		switch ($_GET["sez"]) {
			case 'list':
				include_once('dinosaur/listdinosaur.php');
				break;
			case 'formadd':
				include_once('dinosaur/formadddinosaur.php');
				break;
			case 'add':
				include_once('dinosaur/adddinosaur.php');
				break;
			case 'update':
				include_once('dinosaur/updatedinosaur.php');
				break;				
			case 'formupdate':
				include_once('dinosaur/formupdatedinosaur.php');
				break;
			case 'delete':
				include_once('dinosaur/deldinosaur.php');
				break;
			
			default:
				//logout forzato
				break;
		}
	}
	else{
		include_once('dinosaur/listdinosaur.php');
	}
}
else{
	
	header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
	exit();
}
 ?>

