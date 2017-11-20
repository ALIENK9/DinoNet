<!-- Sidebar/menu -->
<nav id="sidebar" class="sidebar bar collapse card">
  <div class="hide-large center wrap-padding">
    <i onclick="close_menu()" class="btn">&times;</i>
  </div>
  <div class="center">
	<a class="aiuti_nascosti" href="#content">Salta il menù</a>
	<a href="index.php" class="menu_entry">
		<img id="icon" src="img/icons/menu_home.svg">
		<p xml:lang="en">Home</p>
	</a>
	<a href="history.php" class="menu_entry">
		<img id="icon" src="img/icons/menu_storia.png">
		<p>Storia</p>
	</a>
	<a href="specie.html" class="menu_entry">
		<img id="icon" src="img/icons/menu_specie.svg">
		<p>Specie</p>
	</a>
		<a href="articoli.html" class="menu_entry">
		<img id="icon" src="img/icons/menu_articoli.svg">
		<p>Articoli</p>
	</a>
		<a href="registrazione.html" class="menu_entry">
		<img id="icon" src="img/icons/menu_accedi.png">
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
<div class="hide-large overlay" onclick="close_menu()" style="cursor:pointer" title="chiudi menù laterale" id="overlay"></div>

<!-- Push down content on small screens -->
<div class="hide-large" style="margin-top:83px"></div>
