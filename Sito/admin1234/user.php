<?php


include_once (__DIR__."/../classi/UserAdmin.php");
include_once (__DIR__."/../errormessage.php");

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
		<header id="header-home" class="parallax padding-6 header-image">
            <div id="title-card" class="content card wrap-padding">
                <h1>Elenco degli utenti</h1>
                <h2>Da qui puoi aggiungere e modificare gli account degli utenti</h2>
                <a href="panel.php?id=user&sez=formadd" class="btn card wrap-margin">Aggiungi un utente</a>
            </div>
		</header>

		<?php
		include_once (__DIR__."/../breadcrumb.php");
		echo breadcrumbAdmin();

        echo alertMessageNoJs();
		
		echo $_SESSION['paneluser']->printListUser($connectUser, "", "..", $_SERVER["PHP_SELF"]."?id=user&sez=formupdate&", $_SERVER["PHP_SELF"]."?id=user&sez=delete&");
		break;
	case 'formadd':			
		echo $_SESSION['paneluser']->formAddUser($_SERVER["PHP_SELF"]);
		break;
	case 'add':
		$error = $_SESSION['paneluser']->addUser($connectUser, $_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'],$_POST['tipologia'], $_FILES["imgaccount"], "..");
		if($error[0] == 0){
			echo messageAddAnother($error[2],$_SERVER["PHP_SELF"]."?id=user&sez=formadd");
		}
		else{
			if(isset($error[3]) && $error[3] != ""){
				echo $_SESSION['paneluser']->formAddUser($_SERVER["PHP_SELF"], $_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['tipologia'], $error[3]);
			}
			else{				
				echo $_SESSION['paneluser']->formAddUser($_SERVER["PHP_SELF"], $_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['tipologia'], $error[1]);
			}
		}
		break;
	case 'formupdate':
		echo $_SESSION['paneluser']->formUpdateUser($connectUser, $_SERVER["PHP_SELF"],$_GET['user']);
		break;
	case 'update':		
		$removeimg=false;
		if(isset($_POST['imgaccountremove']) && $_POST['imgaccountremove']=="true"){
			$removeimg=true;			
		}
		$error = $_SESSION['paneluser']->updateUser($connectUser, $_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'],$_POST['tipologia'], $_FILES["imgaccount"], $removeimg, "..");
		if($error[0] == 0){
			echo message($error[2]);
		}
		else{
			if(isset($error[3]) && $error[3] != ""){
				echo $_SESSION['paneluser']->formUpdateUser($connectUser, $_SERVER["PHP_SELF"], $_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'],$_POST['tipologia'], $error[3]);
			}
			else{				
				echo $_SESSION['paneluser']->formUpdateUser($connectUser, $_SERVER["PHP_SELF"], $_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'],$_POST['tipologia'], $error[1]);
			}
		}
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

?>
<div class="center wrap-padding">
	<a href="<?php echo $_SERVER["HTTP_REFERER"];?>" class="btn card wrap-margin">Torna alla pagina precedente</a>  
	<?php
	if($sezione!="list")
		echo '<a href="panel.php?id=user" class="btn card wrap-margin"> Vai alla lista degli utenti</a>';
	?>
</div>	
<?php

closeConnect($connectUser);
?>