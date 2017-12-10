<?php
	if(isset($_SESSION['user']) && $_SESSION['user']!=null){
		?>
<!-- Sidebar/menu -->
<nav id="sidebar" class="sidebar bar collapse card">
  <div class="hide-large center wrap-padding">
    <i onclick="close_menu()" class="btn">&times;</i>
  </div>
  <div class="center">
	<a class="aiuti_nascosti" href="#content">Salta il menù</a>
	<a href="panel.php?id=home" class="menu_entry">
		<!--<span id="icon_home" class="menu_icon"></span>-->
		<p>Home</p>
	</a>
	<a href="panel.php?id=user" class="menu_entry">
		<!--<span id="icon_home" class="menu_icon"></span>-->
		<p>Utenti</p>
	</a>
	<a href="panel.php?id=dino" class="menu_entry">
		<!--<span id="icon_storia" class="menu_icon"></span>-->
		<p>Dinosauri</p>
	</a>
	<a href="panel.php?id=article" class="menu_entry">
		<!--<span id="icon_specie" class="menu_icon"></span>-->
		<p>Articoli</p>
	</a>
	<a href="panel.php?id=logout" class="menu_entry">
		<!--<span id="icon_accedi" class="menu_icon"></span>-->
		<p xml:lang="en">Logout</p>
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
<div class="hide-large" class="push-down"></div>
<?php
	}
	else{
	//	header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
	//	exit();
	}

?>