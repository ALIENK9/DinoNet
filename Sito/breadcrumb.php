<?php
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
?>

<div id="breadcrumb" class="wrap-padding colored card">
	<p>Ti trovi in: </p>
	
<?php
	switch ($currentPage) {
		case 'index.php':
		echo '<p>Home</p>';
		break;
		
		case 'view-account.php':
		echo '
			<a href="index.php"><p>Home</p></a>
			<p> &#187; </p>
			<p>Account</p>';
		break;
		
		case 'edit-account.php':
		echo '
			<a href="index.php"><p>Home</p></a>
			<p> &#187; </p>
			<a href="view-account.php"><p>Account</p></a>
			<p> &#187; </p>
			<p>Modifica account</p>';
		break;
		
		case 'login.php':
		echo '
			<a href="index.php"><p>Home</p></a>
			<p> &#187; </p>
			<p>Accedi</p>';
		break;
		
		case 'register.php':
		echo '
			<a href="index.php"><p>Home</p></a>
			<p> &#187; </p>
			<a href="login.php"><p>Accedi</p></a>
			<p> &#187; </p>
			<p>Registrazione</p>';
		break;
		
		case 'history.php':
		echo '
			<a href="index.php"><p>Home</p></a>
			<p> &#187; </p>
			<p>Storia</p>';
		break;
		
		case 'species.php':
		echo '
			<a href="index.php"><p>Home</p></a>
			<p> &#187; </p>
			<p>Specie</p>';
		break;
		
		case 'all-species.php':
		echo '
			<a href="index.php"><p>Home</p></a>
			<p> &#187; </p>
			<a href="species.php"><p>Specie</p></a>
			<p> &#187; </p>
			<p>Tutte le specie</p>';
		break;
		
		case 'display-specie.php':
		echo '
			<a href="index.php"><p>Home</p></a>
			<p> &#187; </p>
			<a href="species.php"><p>Specie</p></a>
			<p> &#187; </p>
			<a href="all-species.php"><p>Tutte le specie</p></a>
			<p> &#187; </p>
			<p> Scheda dinosauro </p>';
		break;
		
		case 'articles.php':
		echo '
			<a href="index.php"><p>Home</p></a>
			<p> &#187; </p>
			<p>Articoli</p>';
		break;
		
		case 'all-articles.php':
		echo '
			<a href="index.php"><p>Home</p></a>
			<p> &#187; </p>
			<a href="articles.php"><p>Articoli</p></a>
			<p> &#187; </p>
			<p>Tutti gli articoli</p>';
		break;
		
		case 'display-article.php':
		echo '
			<a href="index.php"><p>Home</p></a>
			<p> &#187; </p>
			<a href="articles.php"><p>Articoli</p></a>
			<p> &#187; </p>
			<a href="all-articles.php"><p>Tutti gli articoli</p></a>
			<p> &#187; </p>
			<p> Scheda articolo </p>';
		break;
	}
?>
</div>