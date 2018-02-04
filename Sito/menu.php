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

<!-- Sidebar/menu -->
<nav title="Menù di navigazione" aria-label="Menù di navigazione" id="sidebar" class="sidebar bar card center">

    <a class="hidden" href="#main">Salta il menù</a>

    <div id="close-button" class="hide-large center menu-entry" aria-hidden="true">
        <span onclick="close_menu()" title="Chiudi il menù">X</span>
    </div>
	<a href="index.php" title="Home" class="menu-entry <?php if($currentPage == $pages["index"]) echo 'active disabled'; ?>">
		<span class="menu-icon icon-home"></span>
		<p xml:lang="en" lang="en">Home</p>
	</a>
	<a href="history.php" title="La storia dei dinosauri" class="menu-entry <?php if($currentPage == $pages["history"]) echo 'active disabled'; ?>">
		<span class="menu-icon icon-storia"></span>
		<p>Storia</p>
	</a>
	<a href="species.php" title="Le specie" class="menu-entry <?php if($currentPage == $pages["all-species"] || $currentPage == $pages["display-specie"]) echo 'active'; else if($currentPage == $pages["species"]) echo 'active disabled'; ?>">
		<span class="menu-icon icon-specie"></span>
        <p>Specie</p>
	</a>
        <!-- espande il menù con le sottosezioni all-species e display-specie -->
	<?php
	if($currentPage == $pages["all-species"])
        echo'
        <a href="all-species.php" class="menu-entry-small active disabled">
            <hr>
            <p>Tutte le specie</p>
        </a>
        ';
	else if($currentPage == $pages["display-specie"])
        echo'
        <a href="display-specie.php" class="menu-entry-small active disabled">
            <hr>
            <p>Scheda dinosauro</p>
        </a>
        ';
	?>
	<a href="articles.php" title="Articoli" class="menu-entry <?php if($currentPage == $pages["all-articles"] || $currentPage == $pages["display-article"]) echo 'active'; else if($currentPage == $pages["articles"]) echo 'active disabled'; ?>">
		<span class="menu-icon icon-articoli"></span>
		<p>Articoli</p>
	</a>
        <!-- espande il menù con le sottosezioni all-articles e display-article -->
    <?php
    if($currentPage == $pages["all-articles"])
        echo'
        <a href="all-articles.php" class="menu-entry-small active disabled">
            <hr>
            <p>Tutti gli articoli</p>
        </a>
        ';
    else if($currentPage == $pages["display-article"])
        echo'
        <a href="display-article.php" class="menu-entry-small active disabled">
            <hr>
            <p>Scheda articolo</p>
        </a>
        ';
    ?>
        <!-- se l'utente è loggato mostra pagina profilo, altrimenti mostra quella di login -->
	<?php
	if(isset($_SESSION['user'])) {
	?>
		<a href="view-account.php" title="Visualizza account" class="menu-entry <?php if($currentPage == $pages["edit-account"]) echo 'active'; if($currentPage == $pages["view-account"]) echo 'active disabled'; ?>">
			<span class="menu-icon icon-accedi"></span>
			<p>Account</p>
		</a>
	<?php
	}
	else {
		?>
		<a href="login.php" title="Accedi al tuo account" class="menu-entry <?php if($currentPage == $pages["register"]) echo 'active'; else if($currentPage == $pages["login"]) echo 'active disabled'; ?>">
			<span class="menu-icon icon-accedi"></span>
			<p>Accedi</p>
		</a>
		<?php
	}
	?>
        <!-- espande il menù con le sottosezione registrazione -->
    <?php
    if($currentPage == $pages["register"])
        echo'
        <a href="register.php" title="Registrati" class="menu-entry-small active disabled">
            <hr>
            <p>Registrazione</p>
        </a>
        ';
    ?>
        <!-- espande il menù con le sottosezione modifica -->
    <?php
    if($currentPage == $pages["edit-account"])
        echo'
        <a href="edit-account.php" title="Modifica i dati" class="menu-entry-small active disabled">
            <hr>
            <p>Modifica account</p>
        </a>
        ';
    ?>
</nav>

<!-- Menù mobile per schermi piccoli: overlay -->
<div id="overlay" class="hide-large overlay" onclick="close_menu()" title="Chiudi menù laterale"></div>

