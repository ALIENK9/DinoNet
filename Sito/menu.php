<!-- Sidebar/menu -->
<nav id="sidebar" class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top w3-card" style="z-index:3;width:160px">
  <div class="w3-hide-large w3-container w3-center padding-3">
    <i onclick="close_menu()" class="w3-btn w3-round">&times;</i>
  </div>
  <div class="w3-center">
	<a class="aiuti_nascosti" href="#content">Salta il menù</a>
	<a href="home.html" class="menu_entry">
		<img id="icon" src="img/icons/menu_home.svg">
		<p xml:lang="en">Home</p>
	</a>
	<a href="storia.html" class="menu_entry">
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
<div class="w3-bar w3-top w3-hide-large w3-flat-green-sea w3-card">
  <div class="w3-bar-item wrap-padding w3-wide"><h1>DINOSWAG</h1></div>
  <a href="javascript:void(0)" class="w3-bar-item w3-btn w3-padding-24 w3-right" onclick="open_menu()">&#9776;</a>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="close_menu()" style="cursor:pointer" title="close side menu" id="overlay"></div>

<!-- Push down content on small screens -->
<div class="w3-hide-large" style="margin-top:83px"></div>
