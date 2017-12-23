<?php
	if(isset($_SESSION['user']) && $_SESSION['user']!=null){

	$pages = array();
	$pages["home"] = "panel.php?id=home";
	$pages["dati-admin"] = "panel.php?id=myuser";
	$pages["account"] = "panel.php?id=user";
	$pages["dino"] = "panel.php?id=dino";
	$pages["articoli"] = "panel.php?id=article";
?>
		
<!-- Sidebar/menu -->
<nav id="sidebar" class="sidebar bar card">
  <div class="hide-large center wrap-padding">
    <span onclick="close_menu()" class="btn">x</span>
  </div>
  <div class="center">
	<a class="hidden" href="#content">Salta il menù</a>
	<a href="panel.php?id=home" class="<?php if($currentPage == $pages["home"]) echo "active disabled"; ?> menu-entry">
		<span id="icon-home" class="menu-icon"></span>
		<p>Home admin</p>
	</a>
	<a href="panel.php?id=myuser" class="menu-entry <?php if($currentPage == $pages["dati-admin"]) echo "active disabled"; ?>">
		<span id="icon-account" class="menu-icon"></span>
		<p>Dati admin</p>
	</a>
	<a href="panel.php?id=user" class="menu-entry <?php if($currentPage == $pages["account"]) echo "active disabled"; ?>">
		<span id="icon-accounts" class="menu-icon"></span>
		<p>Utenti</p>
	</a>
	<a href="panel.php?id=dino" class="menu-entry <?php if($currentPage == $pages["dino"]) echo "active disabled"; ?>">
		<span id="icon-specie" class="menu-icon"></span>
		<p>Dinosauri</p>
	</a>
	<a href="panel.php?id=article" class="menu-entry <?php if($currentPage == $pages["articoli"]) echo "active disabled"; ?>">
		<span id="icon-articoli" class="menu-icon"></span>
		<p>Articoli</p>
	</a>
	<a href="panel.php?id=logout" class="menu-entry">
		<span id="icon-accedi" class="menu-icon"></span>
		<p xml:lang="en">Logout</p>
	</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<div id="top-menu" class="hide-large bar colored card">
  <div id="header-menu" class="bar-item padding-large title wide"><h1><a <?php if($currentPage == $pages["index"]) echo "href=\"index.php\""; ?>>DINONET</a></h1></div>
  <a id="mobile-menu-icon" href="javascript:void(0)" class="bar-item btn right" onclick="open_menu()">&#9776;</a>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="hide-large overlay" onclick="close_menu()" title="chiudi menù laterale" id="overlay"></div>

<!-- Push down content on small screens -->
<div class="hide-large push-down"></div>

<script>
// Script to open and close sidebar
    function open_menu() {
        document.getElementById("sidebar").style.display = "block";
        document.getElementById("overlay").style.display = "block";
        }
        function close_menu() {
        document.getElementById("sidebar").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }
</script>

<?php
	}
	else{
	//	header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
	//	exit();
	}

?>