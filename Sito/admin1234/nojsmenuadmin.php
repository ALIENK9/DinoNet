<?php
if(!isset($_SESSION['paneluser']) || $_SESSION['paneluser']==""){
	header("Location: ../error.php");
	exit();
}
?>
<noscript id="nojs">
    <div id="nojs-avviso" class="white center wrap-padding hide-large">
        <strong>Hai disabilitato JavaScript!</strong>
        <p>Per visualizzare il menù laterale devi attivare JavaScript! In alternativa puoi continuare a navigare utilizzando questo menù</p>
    </div>

    <nav title="Menù di navigazione senza javascript" aria-label="Menù di navigazione senza javascript" id="nojs-menu" class="card center hide-large">

        <a class="hidden" href="#main">Salta il menù</a>

        <a href="panel.php?id=home" title="Home" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "home") echo "active".(!$_GET["sez"] ? " disabled" : ""); ?>">
            <span class="menu-icon icon-home"></span>
            <p xml:lang="en" lang="en">Home admin</p>
        </a>
        <a href="panel.php?id=myuser" title="Dati account" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "myuser") echo "active".(!$_GET["sez"] ? " disabled" : ""); ?>">
            <span class="menu-icon icon-account"></span>
            <p>Dati admin</p>
        </a>
        <a href="panel.php?id=user" title="Gestione utenti" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "user") echo "active".(!$_GET["sez"] ? " disabled" : ""); ?>">
            <span class="menu-icon icon-accounts"></span>
            <p>Utenti</p>
        </a>
        <a href="panel.php?id=dino" title="Gestione dinosauri" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "dino") echo "active".(!$_GET["sez"] ? " disabled" : ""); ?>">
            <span class="menu-icon icon-specie"></span>
            <p>Dinosauri</p>
        </a>
        <a href="panel.php?id=article" title="Gestione articoli" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "article") echo "active".(!$_GET["sez"] ? " disabled" : ""); ?>">
            <span class="menu-icon icon-articoli"></span>
            <p>Articoli</p>
        </a>
        <a href="panel.php?id=logout" title="Logout" class="menu-entry">
            <span class="menu-icon icon-accedi"></span>
            <p xml:lang="en" lang="en">Logout</p>
        </a>
    </nav>
</noscript>

<script type="text/javascript"> //nasconde il menù senza JS a browser testuali che eseguono JS, in modo che non si trovino 2 menù
    document.getElementById('nojs').style.display = 'none';
</script>