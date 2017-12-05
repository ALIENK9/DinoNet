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

$currentPage = basename($_SERVER['PHP_SELF']);
?>


<!-- Sidebar/menu -->
<nav id="sidebar" class="sidebar bar collapse card">
  <div class="hide-large center wrap-padding">
    <i onclick="close_menu()" class="btn">x</i>
  </div>
  <div class="center">
	<a class="aiuti_nascosti" href="#main">Salta il menù</a>
	<a href="index.php" class="menu_entry <?php if($currentPage == $pages["index"]) echo 'active disabled'; ?>">
		<span id="icon_home" class="menu_icon"></span>
		<p xml:lang="en" lang="en">Home</p>
	</a>
	<a href="history.php" class="menu_entry <?php if($currentPage == $pages["history"]) echo 'active disabled'; ?>">
		<span id="icon_storia" class="menu_icon"></span>
		<p>Storia</p>
	</a>
	<a href="species.php" class="menu_entry <?php if($currentPage == $pages["all-species"] || $currentPage == $pages["display-specie"]) echo 'active'; else if($currentPage == $pages["species"]) echo 'active disabled'; ?>">
		<span id="icon_specie" class="menu_icon"></span>
		<p>Specie</p>
	</a>
      <!-- espande il menù con la sottosezione all-species -->
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
		<hr/>
		<p>Scheda dinosauro</p>
	</a>
	';
	?>
	<a href="articles.php" class="menu_entry <?php if($currentPage == $pages["all-articles"] || $currentPage == $pages["display-article"]) echo 'active'; else if($currentPage == $pages["articles"]) echo 'active disabled'; ?>">
		<span id="icon_articoli" class="menu_icon"></span>
		<p>Articoli</p>
	</a>
	<?php 
	if($currentPage == $pages["all-articles"])
	echo'
	<a href="all-articles.php" class="menu-entry-small active disabled">
		<hr/>
		<p>Tutti gli articoli</p>
	</a>
	';
	else if($currentPage == $pages["display-article"])
	echo'
	<a href="display-article.php" class="menu-entry-small active disabled">
		<hr/>
		<p>Scheda articolo</p>
	</a>
	';
	?>
	<a href="login.php" class="menu_entry <?php if($currentPage == $pages["login"]) echo 'active disabled'; ?>">
		<span id="icon_accedi" class="menu_icon"></span>
		<p>Accedi</p>
	</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<div id="top-menu" class="hide-large bar colored card">
  <div class="bar-item padding-large wide"><h1><a <?php if($currentPage == $pages["index"]) echo 'href="index.php"'; ?>>DINOSAURIA</a></h1></div>
  <a href="javascript:void(0)" class="bar-item btn wrap-padding right" onclick="open_menu()">&#9776;</a>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="hide-large overlay" onclick="close_menu()" title="chiudi menù laterale" id="overlay"></div>

<!-- Push down content on small screens -->
<div class="hide-large push-down"></div>
