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
$pages["sitemap"] = "sitemap.php";

$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!-- Sidebar/menu -->
<nav id="sidebar" class="sidebar bar collapse card">
  <div class="hide-large center wrap-padding">
    <span onclick="close_menu()" class="btn">x</span>
  </div>
  <div class="center">
	<a class="aiuti_nascosti" href="#main">Salta il menù</a>
	<a href="index.php" class="menu-entry <?php if($currentPage == $pages["index"]) echo 'active disabled'; ?>">
		<span id="icon-home" class="menu-icon"></span>
		<p xml:lang="en" lang="en">Home</p>
	</a>
	<a href="history.php" class="menu-entry <?php if($currentPage == $pages["history"]) echo 'active disabled'; ?>">
		<span id="icon-storia" class="menu-icon"></span>
		<p>Storia</p>
	</a>
	<a href="species.php" class="menu-entry <?php if($currentPage == $pages["all-species"] || $currentPage == $pages["display-specie"]) echo 'active'; else if($currentPage == $pages["species"]) echo 'active disabled'; ?>">
		<span id="icon-specie" class="menu-icon"></span>
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
        <a href="all-species.php" class="menu-entry-small active">
            <hr>
            <p>Tutte le specie</p>
        </a>
        <a href="display-specie.php" class="menu-entry-small active disabled">
            <hr>
            <p>Scheda dinosauro</p>
        </a>
        ';
	?>
	<a href="articles.php" class="menu-entry <?php if($currentPage == $pages["all-articles"] || $currentPage == $pages["display-article"]) echo 'active'; else if($currentPage == $pages["articles"]) echo 'active disabled'; ?>">
		<span id="icon-articoli" class="menu-icon"></span>
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
	if(isset($_SESSION['user'])) {
	?>
		<a href="view-account.php" class="menu-entry <?php if($currentPage == $pages["view-account"]) echo 'active disabled'; ?>">
			<span id="icon-accedi" class="menu-icon"></span>
			<p>Account</p>
		</a>
		  <!-- espande il menù con la sottosezione edit-account -->
		<?php 
		if($currentPage == $pages["edit-account"])
		echo'
		<a href="edit-account.php" class="menu-entry-small active disabled">
			<hr>
			<p>Modifica account</p>
		</a>
		';
		?>
	<?php
	}
	else {
		?>
		<a href="login.php" class="menu-entry <?php if($currentPage == $pages["register"]) echo 'active'; else if($currentPage == $pages["login"]) echo 'active disabled'; ?>">
			<span id="icon-accedi" class="menu-icon"></span>
			<p>Accedi</p>
		</a>
		  <!-- espande il menù con la sottosezione register -->
		<?php 
		if($currentPage == $pages["register"])
		echo'
		<a href="register.php" class="menu-entry-small active disabled">
			<hr>
			<p>Registrati</p>
		</a>
		';
		?>
        <?php
	}
	?>
      <?php
      if($currentPage == $pages["sitemap"])
          echo'
            <a href="sitemap.php" class="menu-entry active disabled">
                <span id="icon-sitemap" class="menu-icon"></span>
                <p>Mappa del sito</p>
            </a>
            ';
      ?>
  </div>
</nav>

<!-- Top menu on small screens -->
<div id="top-menu" class="hide-large bar colored card">
    <div id="header-menu" class="bar-item padding-large title wide"><h1><a href="index.php" <?php if($currentPage == $pages["index"]) echo 'class="disabled"'; ?>>DINONET</a></h1></div>
    <a id="mobile-menu-icon" href="sitemap.php" class="bar-item btn right" onclick="">&#9776;</a>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="hide-large overlay" onclick="close_menu()" title="chiudi menù laterale" id="overlay"></div>

<!-- Push down content on small screens -->
<div class="hide-large push-down"></div>


<script>
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
</script>
