<noscript>
    <nav id="sidebar" class="sidebar bar card center">
        <div id="close-button" class="hide-large center menu-entry">
            <span onclick="close_menu()" class="btn">x</span>
        </div>
        <a class="hidden" href="#content">Salta il menù</a>
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
            <span class="menu-icon icon-specie"></span>
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
</noscript>