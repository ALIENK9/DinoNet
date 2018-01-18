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
	
	if(isset($_SESSION['paneluser']) && $_SESSION['paneluser']!=null) {	
?>
		
<!-- Sidebar/menu -->
<nav title="Menù di navigazione" aria-label="Menù di navigazione" id="sidebar" class="sidebar bar card center">

    <a class="hidden" href="#content">Salta il menù</a>

    <div id="close-button" class="hide-large center menu-entry">
        <span onclick="close_menu()" title="Chiudi il menù">X</span>
    </div>
	<a href="panel.php?id=home" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "home") echo "active"; ?>">
		<span class="menu-icon icon-home"></span>
		<p xml:lang="en" lang="en">Home admin</p>
	</a>
	<a href="panel.php?id=myuser" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "myuser") echo "active"; ?>">
		<span class="menu-icon icon-account"></span>
		<p>Dati admin</p>
	</a>
	<a href="panel.php?id=user" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "user") echo "active"; ?>">
		<span class="menu-icon icon-accounts"></span>
		<p>Utenti</p>
	</a>
	<a href="panel.php?id=dino" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "dino") echo "active"; ?>">
		<span  class="menu-icon icon-specie"></span>
		<p>Dinosauri</p>
	</a>
	<a href="panel.php?id=article" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "article") echo "active"; ?>">
		<span class="menu-icon icon-articoli"></span>
		<p>Articoli</p>
	</a>
	<a href="panel.php?id=logout" class="menu-entry">
		<span class="menu-icon icon-accedi"></span>
		<p xml:lang="en" lang="en">Logout</p>
	</a>
</nav>

<!-- Top menu on small screens -->
<!--div id="top-menu" class="hide-large bar colored card">
  <div id="header-menu" class="bar-item padding-large title wide"><h1><a <!--?php if($currentPage == $pages["index"]) echo "href=\"index.php\""; ?>>DINONET</a></h1></div>
  <a id="mobile-menu-icon" href="javascript:void(0)" class="bar-item btn right" onclick="open_menu()">&#9776;</a>
</div-->

<!-- Overlay effect when opening sidebar on small screens -->
<div id="overlay" class="hide-large overlay" onclick="close_menu()" title="Chiudi il menù laterale"></div>

<!-- Push down content on small screens -->
<!--div class="hide-large push-down"></div-->

<!--script>
// Script to open and close sidebar
    function open_menu() {
        document.getElementById("sidebar").style.display = "block";
        document.getElementById("overlay").style.display = "block";
    }
        function close_menu() {
        document.getElementById("sidebar").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }
</script-->

<?php

	}
?>