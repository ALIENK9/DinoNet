<?php

function breadcrumbUser(){
	$pages = array();
	$pages["index"] = "index.php";
	$pages["history"] = "history.php";
	$pages["species"] = "species.php";
	$pages["all-species"] = "all-species.php";
	$pages["display-specie"] = "display-specie.php";
	$pages["articles"] = "articles.php";
	$pages["all-articles"] = "all-articles.php";
	$pages["display-article"] = "display-article.php";
	$pages["login"] = "login.php";
	$pages["logout"] = "logout.php";
	$pages["register"] = "register.php";
	$pages["view-account"] = "view-account.php";
	$pages["edit-account"] = "edit-account.php";
	$pages["delete-account"] = "delete-account.php";

	$currentPage = basename($_SERVER['PHP_SELF']);

	$echoString = '<div id="breadcrumb" class="wrap-padding ';
	if($currentPage != 'history.php' && $currentPage != 'register.php' && $currentPage != 'login.php' && $currentPage != 'view-account.php' && $currentPage != 'edit-account.php') 
		$echoString .= 'colored'; 
	else 
		$echoString .= 'text-colored';
	$echoString .= ' card">
	<p>Ti trovi in: </p>';

	switch ($currentPage) {
		case 'index.php':
		$echoString .=  '<p>Home</p>';
		break;
		
		case 'credits.php':
		$echoString .=  '
			<a href="index.php">Home</a>
			<p> &#187; </p>
			<p>Crediti</p>';
		break;
		
		case 'view-account.php':
		$echoString .=  '
			<a href="index.php">Home</a>
			<p> &#187; </p>
			<p>Account</p>';
		break;
		
		case 'edit-account.php':
		$echoString .=  '
			<a href="index.php">Home</a>
			<p> &#187; </p>
			<a href="view-account.php">Account</a>
			<p> &#187; </p>
			<p>Modifica account</p>';
		break;
		
		case 'login.php':
		$echoString .=  '
			<a href="index.php">Home</a>
			<p> &#187; </p>
			<p>Accedi</p>';
		break;
		
		case 'register.php':
		$echoString .=  '
			<a href="index.php">Home</a>
			<p> &#187; </p>
			<a href="login.php">Accedi</a>
			<p> &#187; </p>
			<p>Registrazione</p>';
		break;
		
		case 'history.php':
		$echoString .=  '
			<a href="index.php">Home</a>
			<p> &#187; </p>
			<p>Storia</p>';
		break;
		
		case 'species.php':
		$echoString .=  '
			<a href="index.php">Home</a>
			<p> &#187; </p>
			<p>Specie</p>';
		break;
		
		case 'all-species.php':
		$echoString .=  '
			<a href="index.php">Home</a>
			<p> &#187; </p>
			<a href="species.php">Specie</a>
			<p> &#187; </p>
			<p>Tutte le specie</p>';
		break;
		
		case 'display-specie.php':
		$echoString .=  '
			<a href="index.php">Home</a>
			<p> &#187; </p>
			<a href="species.php">Specie</a>
			<p> &#187; </p>
			<a href="all-species.php">Tutte le specie</a>
			<p> &#187; </p>
			<p> Scheda dinosauro </p>';
		break;
		
		case 'articles.php':
		$echoString .=  '
			<a href="index.php">Home</a>
			<p> &#187; </p>
			<p>Articoli</p>';
		break;
		
		case 'all-articles.php':
		$echoString .=  '
			<a href="index.php">Home</a>
			<p> &#187; </p>
			<a href="articles.php">Articoli</a>
			<p> &#187; </p>
			<p>Tutti gli articoli</p>';
		break;
		
		case 'display-article.php':
		$echoString .=  '
			<a href="index.php">Home</a>
			<p> &#187; </p>
			<a href="articles.php">Articoli</a>
			<p> &#187; </p>
			<a href="all-articles.php">Tutti gli articoli</a>
			<p> &#187; </p>
			<p> Scheda articolo </p>';
		break;
	}

	$echoString .= '</div>';

	return $echoString;
}

function breadcrumbAdmin(){
	if(isset($_GET["id"]) && $_GET["id"]!="")
		$idPage=$_GET["id"];
	else
		$idPage = "home";

	if(isset($_GET["sez"]) && $_GET["sez"]!="")
		$sezione=$_GET["sez"];
	else
		$sezione = "list";

	$echoString = '<div id="breadcrumb" class="wrap-padding ';
	if( ($idPage == "home") || ($idPage == "myuser") || ($sezione=="formupdate") || ($sezione=="formadd") || ($sezione=="comment") ) 
		$echoString .= 'text-colored';
	else 
		$echoString .= 'colored'; 
	$echoString .= ' card">
	<p>Ti trovi in: </p>';

	switch ($idPage) {
		case 'home':
			$echoString .= '<p>Home</p>';
			break;

		case 'user':
			switch ($sezione) {
				case 'list':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<p>Elenco utenti</p>';
				break;
				case 'formadd':			
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=user&sez=list">Elenco utenti</a>
									<p> &#187; </p>
									<p>Aggiunti utente</p>';
					break;
				case 'add':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=user&sez=list">Elenco utenti</a>
									<p> &#187; </p>
									<p>Aggiunti utente</p>';
					break;
				case 'formupdate':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=user&sez=list">Elenco utenti</a>
									<p> &#187; </p>
									<p>Modifica utente</p>';
					break;
				case 'update':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=user&sez=list">Elenco utenti</a>
									<p> &#187; </p>
									<p>Modifica utente</p>';	
					break;		
				case 'delete':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=user&sez=list">Elenco utenti</a>
									<p> &#187; </p>
									<p>Elimina utente</p>';
					break;					
				default:
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<p>Elenco utenti</p>';
				break;
			}
			break;

		case 'myuser':					
			$echoString .= '<a href="panel.php?id=home">Home</a>
							<p> &#187; </p>
							<p>Profilo utente</p>';
			break;

		case 'dino':
			switch ($sezione) {
				case 'list':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<p>Elenco dinosauri</p>';
					break;
				case 'formadd':	
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=dino&sez=list">Elenco dinosauri</a>
									<p> &#187; </p>
									<p>Aggiunti dinosauro</p>';	
					break;
				case 'add':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=dino&sez=list">Elenco dinosauri</a>
									<p> &#187; </p>
									<p>Aggiunti dinosauro</p>';	
					break;
				case 'formupdate':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=dino&sez=list">Elenco dinosauri</a>
									<p> &#187; </p>
									<p>Modifica dinosauro</p>';
					break;
				case 'update':	
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=dino&sez=list">Elenco dinosauri</a>
									<p> &#187; </p>
									<p>Modifica dinosauro</p>';
					break;		
				case 'delete':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=dino&sez=list">Elenco dinosauri</a>
									<p> &#187; </p>
									<p>Elimina dinosauro</p>';
					break;	
				case 'comment':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=dino&sez=list">Elenco dinosauri</a>
									<p> &#187; </p>
									<p>Elenco commenti</p>';
					break;	
				case 'deletecomment':	
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=dino&sez=list">Elenco dinosauri</a>
									<p> &#187; </p>
									<p>Elimina commenti</p>';
					break;				
				default:
					$echoString .= '<a href="panel.php?id=home">Home</a>
								<p> &#187; </p>
								<p>Elenco dinosauri</p>';
					break;
			}
			break;

		case 'article':
			switch ($sezione) {
				case 'list':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<p>Elenco articoli</p>';
					break;
				case 'formadd':	
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=article&sez=list">Elenco articoli</a>
									<p> &#187; </p>
									<p>Aggiunti articolo</p>';		
					break;
				case 'add':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=article&sez=list">Elenco articoli</a>
									<p> &#187; </p>
									<p>Aggiunti articolo</p>';		
					break;
				case 'formupdate':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=article&sez=list">Elenco articoli</a>
									<p> &#187; </p>
									<p>Modifica articolo</p>';	
					break;
				case 'update':	
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=article&sez=list">Elenco articoli</a>
									<p> &#187; </p>
									<p>Modifica articolo</p>';	
					break;		
				case 'delete':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=article&sez=list">Elenco articoli</a>
									<p> &#187; </p>
									<p>Elimina articolo</p>';	
					break;	
				case 'comment':
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=article&sez=list">Elenco articoli</a>
									<p> &#187; </p>
									<p>Elenco commenti</p>';	
					break;	
				case 'deletecomment':	
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<a href="panel.php?id=article&sez=list">Elenco articoli</a>
									<p> &#187; </p>
									<p>Elimina commenti</p>';	
					break;				
				default:
					$echoString .= '<a href="panel.php?id=home">Home</a>
									<p> &#187; </p>
									<p>Elenco articoli</p>';
					break;
			}
			break;	

		case 'search':
			$echoString .= '<a href="panel.php?id=home">Home</a>
							<p> &#187; </p>
							<p>Ricerca</p>';
			break;	

		default:	
			$echoString .= '<p>Home</p>';	
			break;
	}

	$echoString .= '</div>';
	return $echoString;
}

?>