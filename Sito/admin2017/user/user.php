<?php
if(isset($_SESSION['user']) && $_SESSION['user']!=null){
	if(!isset($_GET["sez"]) || $_GET["sez"]=="list"){
		?>
	<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
		<input type="hidden" name="id" value="user">
		<input type="hidden" name="sez"  value="list">
		<label for="filtra">Filtro:</label>
		<input type="text" id="filtra" name="filter" value="<?php if(isset($_GET["filter"])) echo $_GET["filter"]; ?>">
		<input type="submit" value="Cerca" title="Avvia la ricerca" />
	</form>

	<a href="panel.php?id=user&sez=formadd" class="menu_entry">
		<p>Aggiungi un Utente</p>
	</a>
	<?php
	}
	if(isset($_GET["sez"])){
		switch ($_GET["sez"]) {
			case 'list':
				//include_once('user/listuser.php');
				$_SESSION['user']->printListUser();
				break;
			case 'formadd':
				include_once('user/formadduser.php');
				break;
			case 'add':
				include_once('user/adduser.php');
				break;
			case 'update':
				include_once('user/updateuser.php');
				break;				
			case 'formupdate':
				include_once('user/formupdateuser.php');
				break;
			case 'delete':
				include_once('user/deluser.php');
				break;
			
			default:
				//logout forzato
				break;
		}
	}
	else{
		include_once('user/listuser.php');
	}
}
else{
	
	header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
	exit();
}
 ?>

