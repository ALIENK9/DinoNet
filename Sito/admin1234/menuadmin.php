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
    
	if(!isset($_SESSION['paneluser']) || $_SESSION['paneluser']==""){
        header("Location: ../error.php");
        exit();
    }
?>
		
<!-- Sidebar/menu -->
<nav title="Menù di navigazione" aria-label="Menù di navigazione" id="sidebar" class="sidebar bar card center">

    <a class="hidden" href="#main">Salta il menù</a>

    <div id="close-button" class="hide-large center menu-entry" aria-hidden="true">
        <span onclick="close_menu()" title="Chiudi il menù">X</span>
    </div>
	<a href="panel.php?id=home" title="Home" class="menu-entry <?php if(isset($_GET["id"])) {if ($_GET["id"] == "home") echo "active disabled"; else if($_GET["id"] == "search") echo "active";} ?>">
		<span class="menu-icon icon-home"></span>
		<p xml:lang="en" lang="en">Home</p>
	</a>
    <?php if(isset($_GET["id"]) && $_GET["id"] == "search" )
        echo'    
        <div title="Sezione corrente" class="menu-entry-small active">
            <hr>
            <p>Risultati ricerca</p>
        </div>
        ';
    ?>
	<a href="panel.php?id=myuser" title="Dati account" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "myuser") echo "active".(!$_GET["sez"] ? " disabled" : ""); ?>">
		<span class="menu-icon icon-account"></span>
		<p>I tuoi dati</p>
	</a>
    <?php if(isset($_GET["id"]) && $_GET["id"] == "myuser" && isset($_GET["sez"]) && $_GET["sez"] == "update")
        echo'
        <div title="Sezione corrente" class="menu-entry-small active">
            <hr>
            <p>Esito modifica</p>
        </div>
        ';
    ?>
	<a href="panel.php?id=user" title="Gestione utenti" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "user") echo "active".(!$_GET["sez"] ? " disabled" : ""); ?>">
		<span class="menu-icon icon-accounts"></span>
		<p>Utenti</p>
	</a>

    <?php if(isset($_GET["id"]) && $_GET["id"] == "user" && isset($_GET["sez"]) && isset($_GET["sez"]))
        if($_GET["sez"] == "formadd")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active"> 
                <hr>
                <p>Aggiunta utente</p>
            </div>
            ';
        else if($_GET["sez"] == "formupdate")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Modifica utente</p>
            </div>
            ';
        else if($_GET["sez"] == "update")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Esito modifica</p>
            </div>
            ';
        else if($_GET["sez"] == "add")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Esito aggiunta</p>
            </div>
            ';

    ?>

	<a href="panel.php?id=dino" title="Gestione dinosauri" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "dino") echo "active".(!$_GET["sez"] ? " disabled" : "")?>">
		<span class="menu-icon icon-specie"></span>
		<p>Dinosauri</p>
	</a>

    <?php if(isset($_GET["id"]) && $_GET["id"] == "dino" && isset($_GET["sez"]))
        if($_GET["sez"] == "formadd")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Aggiunta dinosauro</p>
            </div>
            ';
        else if($_GET["sez"] == "formupdate")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Modifica dinosauro</p>
            </div>
            ';
        else if($_GET["sez"] == "comment")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Eliminazione commenti</p>
            </div>
            ';
        else if($_GET["sez"] == "add")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Esito aggiunta</p>
            </div>
            ';
        else if($_GET["sez"] == "update")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Esito modifica</p>
            </div>
            ';
    ?>

	<a href="panel.php?id=article" title="Gestione articoli" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "article") echo "active".(!$_GET["sez"] ? " disabled" : "")?>">
		<span class="menu-icon icon-articoli"></span>
		<p>Articoli</p>
	</a>

    <?php if(isset($_GET["id"]) && $_GET["id"] == "article" && isset($_GET["sez"]))
        if($_GET["sez"] == "formadd")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Aggiunta articolo</p>
            </div>
            ';
        else if($_GET["sez"] == "formupdate")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Modifica articolo</p>
            </div>
            ';
        else if($_GET["sez"] == "comment")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Eliminazione commenti</p>
            </div>
            ';
        else if($_GET["sez"] == "add")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Esito aggiunta</p>
            </div>
            ';
        else if($_GET["sez"] == "update")
            echo'    
            <div title="Sezione corrente" class="menu-entry-small active">
                <hr>
                <p>Esito modifica</p>
            </div>
            ';
    ?>

	<a href="panel.php?id=logout" title="Logout" class="menu-entry" onclick="return confirm('Sei sicuro di volerti disconnettere?')">
		<span class="menu-icon icon-accedi"></span>
		<p xml:lang="en" lang="en">Logout</p>
	</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div id="overlay" class="hide-large overlay" onclick="close_menu()" title="Chiudi il menù laterale"></div>

