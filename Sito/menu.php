<?php
$pages = array();
$pages["index"] = "index.php";
$pages["history"] = "history.php";
$pages["species"] = "species.php";
$pages["articles"] = "articles.php";
$pages["login"] = "login.php";

$currentPage = basename($_SERVER['PHP_SELF']);
?>


<!-- Sidebar/menu -->
<nav id="sidebar" class="sidebar bar collapse card">
  <div class="hide-large center wrap-padding">
    <i onclick="close_menu()" class="btn">&times;</i>
  </div>
  <div class="center">
	<a class="aiuti_nascosti" href="#main">Salta il menù</a>
	<a href="index.php" class="menu_entry <?php if($currentPage == $pages["index"]) echo 'active'; ?>">
		<span id="icon_home" class="menu_icon"></span>
		<p xml:lang="en" lang="en">Home</p>
	</a>
	<a href="history.php" class="menu_entry <?php if($currentPage == $pages["history"]) echo 'active'; ?>">
		<span id="icon_storia" class="menu_icon"></span>
		<p>Storia</p>
	</a>
	<a href="species.php" class="menu_entry <?php if($currentPage == $pages["species"]) echo 'active'; ?>">
		<span id="icon_specie" class="menu_icon"></span>
		<p>Specie</p>
	</a>
	<a href="articles.php" class="menu_entry <?php if($currentPage == $pages["articles"]) echo 'active'; ?>">
		<span id="icon_articoli" class="menu_icon"></span>
		<p>Articoli</p>
	</a>
	<a href="login.php" class="menu_entry <?php if($currentPage == $pages["login"]) echo 'active'; ?>">
		<span id="icon_accedi" class="menu_icon"></span>
		<p>Accedi</p>
	</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<div class="hide-large bar green-sea card">
  <div class="bar-item padding-large wide"><h1>DINOSWAG</h1></div>
  <a href="javascript:void(0)" class="bar-item btn wrap-padding right" onclick="open_menu()">&#9776;</a>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="hide-large overlay" onclick="close_menu()" title="chiudi menù laterale" id="overlay"></div>

<!-- Push down content on small screens -->
<div class="hide-large push-down"></div>
