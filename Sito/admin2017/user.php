<?php

$homepath = substr( $_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
if (strpos($_SERVER['SCRIPT_NAME'], 'TecWeb') !== false) {
	$homepath .= "/TecWeb";
}
//$homepath = $_SERVER["DOCUMENT_ROOT"];

include_once ($homepath . "/classi/UserAdmin.php");

if(isset($_SESSION['user'])){

	if(isset($_GET["sez"]))
		$sezione=$_GET["sez"];
	else
		$sezione = "list";

	switch ($sezione) {
		case 'list':
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
			if(isset($_GET["filter"]))
				echo $_SESSION['user']->printListUser($_GET["filter"]);
			else
				echo $_SESSION['user']->printListUser("");
			break;
		case 'formadd':			
			echo $_SESSION['user']->formAddUser($_SERVER["PHP_SELF"]);
			break;
		case 'add':
			echo $_SESSION['user']->addUser($_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf']);
			break;		
		case 'formupdate':
			echo $_SESSION['user']->formUpdateUser($_SERVER["PHP_SELF"],$_GET['user']);
			break;
		case 'update':
			echo $_SESSION['user']->updateUser($_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf']);
			break;		
		case 'delete':
			if(isset($_GET["user"]))
				echo $_SESSION['user']->deleteUser($_GET["user"]);
			break;	
		
		default:
			header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
			exit();
			break;
	}
	
}
else{
	
	header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
	exit();
}
 ?>

