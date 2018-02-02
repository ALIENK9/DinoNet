<?php


include_once (__DIR__."/../classi/UserAdmin.php");

if(!isset($_SESSION['paneluser']) || $_SESSION['paneluser']==""){
	header("Location: ../error.php");
	exit();
}

include_once (__DIR__."/../connect.php");
$connectUser = startConnect();


if(isset($_GET["sez"]) && $_GET["sez"]!="")
	$sezione=$_GET["sez"];
else
	$sezione = "list";

switch ($sezione) {
	case 'list':
		?>
		<header id="header-home" class="parallax header-image">
			<div class="padding-6 content">						
				<div class="card white wrap-padding">
					<h1>Aggiungi un utente</h1>
					<a href="panel.php?id=user&sez=formadd" class="btn card wrap-margin">Aggiungi un utente</a>
				</div>
			</div>
		</header>

		<?php
		echo $_SESSION['paneluser']->printListUser($connectUser, "", "..", $_SERVER["PHP_SELF"]."?id=user&sez=formupdate&", $_SERVER["PHP_SELF"]."?id=user&sez=delete&");
		break;
	case 'formadd':			
		echo $_SESSION['paneluser']->formAddUser($_SERVER["PHP_SELF"]);
		break;
	case 'add':
		echo $_SESSION['paneluser']->addUser($connectUser, $_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'],$_POST['tipologia'], $_FILES["imgaccount"], "..");
		break;
	case 'formupdate':
		echo $_SESSION['paneluser']->formUpdateUser($connectUser, $_SERVER["PHP_SELF"],$_GET['user']);
		break;
	case 'update':		
		$removeimg=false;
		if(isset($_POST['imgaccountremove']) && $_POST['imgaccountremove']=="true"){
			$removeimg=true;			}

		echo $_SESSION['paneluser']->updateUser($connectUser, $_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'],$_POST['tipologia'], $_FILES["imgaccount"], $removeimg, "..");
		break;		
	case 'delete':
		if(isset($_GET["user"]))
			echo $_SESSION['paneluser']->deleteUser($connectUser, $_GET["user"], "..");
		break;	
	
	default:
		header("Location: ../error.php");
		exit();
		break;
}

closeConnect($connectUser);
?>