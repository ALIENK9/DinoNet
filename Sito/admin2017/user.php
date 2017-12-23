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
			<header id="header-home" class="parallax">
				<div class="padding-6 content">						
					<div class="card white wrap-padding">
						<h1>Cerca un utente</h1>
					</div>
					<div class="card colored wrap-padding">
						<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
							<input type="hidden" name="id" value="user">
							<input type="hidden" name="sez"  value="list">
							<p><label for="filtra">Filtro:</label></p>
							<input type="text" id="filtra" name="filter" value="<?php if(isset($_GET["filter"])) echo $_GET["filter"]; ?>" placeholder="ex: prova@gmail.com">
							<br>
							<input type="submit" value="Cerca" title="Avvia la ricerca" / class="card btn wide text-colored white">
						</form>
					</div>
					<br>
					<div class="card white wrap-padding">
						<h1>Aggiungi un utente</h1>
					</div>
					<div class="card colored wrap-padding">
						<a href="panel.php?id=user&sez=formadd" class="btn card colored wrap-margin"><p>Aggiungi un Utente</p></a>
					</div>
				</div>
			</header>

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
			echo $_SESSION['user']->addUser($_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'], $_FILES["imgaccount"]);
			break;		
		case 'formupdate':
			echo $_SESSION['user']->formUpdateUser($_SERVER["PHP_SELF"],$_GET['user']);
			break;
		case 'update':		
			$removeimg=false;
			if(isset($_POST['imgaccountremove']) && $_POST['imgaccountremove']=="true"){
				$removeimg=true;			}

			echo $_SESSION['user']->updateUser($_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'], $_FILES["imgaccount"], $removeimg);
			break;		
		case 'delete':
			if(isset($_GET["user"]))
				echo $_SESSION['user']->deleteUser($_GET["user"]);
			break;	
		
		default:
			header("Location: http://". $_SERVER['HTTP_HOST']."/TecWeb/error.php");
			exit();
			break;
	}
	
}
else{
	
	header("Location: http://". $_SERVER['HTTP_HOST']."/TecWeb/error.php");
	exit();
}
 ?>

