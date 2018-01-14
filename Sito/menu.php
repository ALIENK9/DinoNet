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

    <a class="hidden" title="Salta il menù" href="#main">Salta il menù</a>

    <div id="close-button" class="hide-large center menu-entry">
        <span onclick="close_menu()">x</span>
    </div>
	<a href="index.php" class="menu-entry <?php if($currentPage == $pages["index"]) echo 'active disabled'; ?>">
		<span class="menu-icon icon-home"></span>
		<p xml:lang="en" lang="en">Home</p>
	</a>
	<a href="history.php" class="menu-entry <?php if($currentPage == $pages["history"]) echo 'active disabled'; ?>">
		<span class="menu-icon icon-storia"></span>
		<p>Storia</p>
	</a>
	<a href="species.php" class="menu-entry <?php if($currentPage == $pages["all-species"] || $currentPage == $pages["display-specie"]) echo 'active'; else if($currentPage == $pages["species"]) echo 'active disabled'; ?>">
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
	<a href="articles.php" class="menu-entry <?php if($currentPage == $pages["all-articles"] || $currentPage == $pages["display-article"]) echo 'active'; else if($currentPage == $pages["articles"]) echo 'active disabled'; ?>">
		<span class="menu-icon icon-articoli"></span>
		<p>Articoli</p>
	</a>
        <!-- espande il menù con le sottosezioni all-articles e display-article -->
    <?php
    if($currentPage == $pages["all-articles"])
        echo'
        <a href="all-species.php" class="menu-entry-small active disabled">
            <hr>
            <p>Tutte le specie</p>
        </a>
        ';
    else if($currentPage == $pages["display-article"])
        echo'
        <a href="display-specie.php" class="menu-entry-small active disabled">
            <hr>
            <p>Scheda dinosauro</p>
        </a>
        ';
    ?>
        <!-- se l'utente è loggato mostra pagina profilo, altrimenti mostra quella di login -->
	<?php
	if(isset($_SESSION['user'])) {
	?>
		<a href="view-account.php" class="menu-entry <?php if($currentPage == $pages["view-account"]) echo 'active disabled'; ?>">
			<span class="menu-icon icon-accedi"></span>
			<p>Account</p>
		</a>
	<?php
	}
	else {
		?>
		<a href="login.php" class="menu-entry <?php if($currentPage == $pages["register"]) echo 'active'; else if($currentPage == $pages["login"]) echo 'active disabled'; ?>">
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
        <a href="register.php" class="menu-entry-small active disabled">
            <hr>
            <p>Registrazione</p>
        </a>
        ';
    ?>
</nav>

<!-- Menù mobile per schermi piccoli: top bar -->
<!--div id="top-menu" class="hide-large bar colored card">
    <div id="header-menu" class="bar-item padding-large title wide">
        <h1><a href="index.php" <!--?php if($currentPage == $pages["index"]) echo 'class="disabled"'; ?>>DINONET</a></h1>
    </div>
    <a id="mobile-menu-icon" href="#nojs-avviso" class="bar-item btn right" onclick="">&#9776;</a>
</div-->

<!-- Menù mobile per schermi piccoli: overlay -->
<div id="overlay" class="hide-large overlay" onclick="close_menu()" title="Chiudi menù laterale"></div>

<!-- Push down content on small screens -->
<!--div class="hide-large push-down"></div-->


<!--script>
    function addJS() { //rende visibile il menù laterale
        document.getElementById("mobile-menu-icon").setAttribute("href", "javascript:void(0)");
        document.getElementById("mobile-menu-icon").setAttribute("onclick", "open_menu()");
    }
    addJS();

    // Script per aprire il menù
    function open_menu() {
        document.getElementById("sidebar").style.display = "block";
        document.getElementById("overlay").style.display = "block";
    }

    //Script per chiudere il menù
    function close_menu() {
        document.getElementById("sidebar").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }
</script-->