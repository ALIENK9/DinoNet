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

    <a class="hidden" href="#content">Salta il menù</a>

    <div id="close-button" class="hide-large center menu-entry" aria-hidden="true">
        <span onclick="close_menu()" title="Chiudi il menù">X</span>
    </div>
	<a href="panel.php?id=home" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "home") echo "active disabled"; ?>">
		<span class="menu-icon icon-home"></span>
		<p xml:lang="en" lang="en">Home</p>
	</a>
	<a href="panel.php?id=myuser" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "myuser") echo "active disabled"; ?>">
		<span class="menu-icon icon-account"></span>
		<p>I tuoi dati</p>
	</a>
	<a href="panel.php?id=user" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "user") echo "active".(!$_GET["sez"] ? "disabled" : "")?>">
		<span class="menu-icon icon-accounts"></span>
		<p>Utenti</p>
	</a>

    <?php if(isset($_GET["id"]) && $_GET["id"] == "user" && isset($_GET["sez"]))
        if($_GET["sez"] == "formadd")
            echo'    
            <a href="panel.php?id=user&sez=formadd" class="menu-entry-small active disabled">
                <hr>
                <p>Aggiunta utente</p>
            </a>
            ';
        else if($_GET["sez"] == "formupdate")
            echo'    
            <a href="panel.php?id=user&sez=formupdate'.$_GET["user"].'" class="menu-entry-small active disabled">
                <hr>
                <p>Modifica utente</p>
            </a>
            ';
    ?>

	<a href="panel.php?id=dino" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "dino") echo "active".(!$_GET["sez"] ? " disabled" : "")?>">
		<span  class="menu-icon icon-specie"></span>
		<p>Dinosauri</p>
	</a>

    <?php if(isset($_GET["id"]) && $_GET["id"] == "dino" && isset($_GET["sez"]))
        if($_GET["sez"] == "formadd")
            echo'    
            <a href="panel.php?id=dino&sez=formadd" class="menu-entry-small active disabled">
                <hr>
                <p>Aggiunta dinosauro</p>
            </a>
            ';
        else if($_GET["sez"] == "formupdate")
            echo'    
            <a href="panel.php?id=dino&sez=formupdate'.$_GET["nome"].'" class="menu-entry-small active disabled">
                <hr>
                <p>Modifica dinosauro</p>
            </a>
            ';
        else if($_GET["sez"] == "comment")
            echo'    
            <a href="panel.php?id=dino&sez=comment'.$_GET["nome"].'" class="menu-entry-small active disabled">
                <hr>
                <p>Gestione commenti</p>
            </a>
            ';
    ?>

	<a href="panel.php?id=article" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "article") echo "active".(!$_GET["sez"] ? " disabled" : "")?>">
		<span class="menu-icon icon-articoli"></span>
		<p>Articoli</p>
	</a>

    <?php if(isset($_GET["id"]) && $_GET["id"] == "article" && isset($_GET["sez"]))
        if($_GET["sez"] == "formadd")
            echo'    
            <a href="panel.php?id=article&sez=formadd" class="menu-entry-small active disabled">
                <hr>
                <p>Aggiunta articolo</p>
            </a>
            ';
        else if($_GET["sez"] == "formupdate")
            echo'    
            <a href="panel.php?id=article&sez=formupdate'.$_GET["article"].'" class="menu-entry-small active disabled">
                <hr>
                <p>Modifica articolo</p>
            </a>
            ';
        else if($_GET["sez"] == "comment")
            echo'    
            <a href="panel.php?id=article&sez=comment'.$_GET["article "].'" class="menu-entry-small active disabled">
                <hr>
                <p>Gestione commenti</p>
            </a>
            ';
    ?>

	<a href="panel.php?id=logout" class="menu-entry">
		<span class="menu-icon icon-accedi"></span>
		<p xml:lang="en" lang="en">Logout</p>
	</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div id="overlay" class="hide-large overlay" onclick="close_menu()" title="Chiudi il menù laterale"></div>

