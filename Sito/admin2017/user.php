<?php


include_once (__DIR__."/../classi/UserAdmin.php");

if(isset($_SESSION['user'])){

	include_once (__DIR__."/../connect.php");
	$connectUser = startConnect();
	

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
						<h1>Aggiungi un utente</h1>
					</div>
					<div class="card colored wrap-padding">
						<a href="panel.php?id=user&sez=formadd" class="btn card colored wrap-margin"><p>Aggiungi un Utente</p></a>
					</div>
				</div>
			</header>


			<?php
			echo '<div class="content-large padding-6 no-print">' . $_SESSION['user']->printListUser($connectUser, "", "..").'</div>';
			break;
		case 'formadd':			
			echo '<div class="content-large padding-6 no-print">' . $_SESSION['user']->formAddUser($_SERVER["PHP_SELF"]).'</div>';
			break;
		case 'add':
			echo $_SESSION['user']->addUser($connectUser, $_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'], $_FILES["imgaccount"]);
			break;
		case 'formupdate':
			echo '<div class="content-large padding-6 no-print">' . $_SESSION['user']->formUpdateUser($connectUser, $_SERVER["PHP_SELF"],$_GET['user']).'</div>';
			break;
		case 'update':		
			$removeimg=false;
			if(isset($_POST['imgaccountremove']) && $_POST['imgaccountremove']=="true"){
				$removeimg=true;			}

			echo $_SESSION['user']->updateUser($connectUser, $_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['datanascita'],$_POST['password'],$_POST['passwordconf'], $_FILES["imgaccount"], $removeimg);
			break;		
		case 'delete':
			if(isset($_GET["user"]))
				echo $_SESSION['user']->deleteUser($connectUser, $_GET["user"]);
			break;	
		
		default:
			header("Location: ../error.php");
			exit();
			break;
	}

	closeConnect($connectUser);
		
}
else{	
	header("Location: ../error.php");
	exit();
}

?>