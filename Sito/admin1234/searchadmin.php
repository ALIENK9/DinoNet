<?php   

if(!isset($_SESSION['paneluser']) || $_SESSION['paneluser']==""){
    header("Location: ../error.php");
    exit();
}

    include_once (__DIR__."/../classi/Dinosaur.php");	
    include_once (__DIR__."/../classi/Article.php");	
    include_once (__DIR__."/../classi/UserAdmin.php");	
   
	include_once (__DIR__."/../connect.php");
    $connect = startConnect();
    
    if(!isset($_GET["input"])){
        $_GET["input"]="";
    }
?>
    <header id="header-home" class="parallax padding-6 header-image">
        <div id="title-card" class="content card">
            <h1 class="text-colored">Risultati per la ricerca: <?php echo $_GET["input"] ?> </h1>
        </div>
		<a href="#utenti" aria-label="Scorri ai risultati della ricerca" class="down-arrow arrow btn card bounce">
			<span class="hidden">Scorri ai risultati della ricerca</span>
		</a>
    </header>

    <?php
        include_once (__DIR__."/../breadcrumb.php");
        echo breadcrumbAdmin();
    ?>
    <div id="utenti" class="padding-6">
        <div class="colored center wrap-padding">
            <h1>Elenco riferito alla ricerca di utenti per </h1>
			<h2> "<?php echo $_GET["input"] ?>"</h2>
            <a href="#dinosauri">Vai ai risultati per gli dinosauri</a>
        </div>
        <div class="row-padding content-large margin-top">
            <?php
            
				echo UserAdmin::printListUser($connect, $_GET["input"], "..", $_SERVER["PHP_SELF"]."?id=user&sez=formupdate&", $_SERVER["PHP_SELF"]."?id=user&sez=delete&");
            ?>
        </div>
    </div>
    
    <div id="dinosauri" class="padding-6">
        <div class="colored center wrap-padding">
            <h1>Elenco riferito alla ricerca di dinosauri per </h1>
			<h2> "<?php echo $_GET["input"] ?>"</h2>
            <a href="#articoli">Vai ai risultati per gli articoli</a>
        </div>
        <div class="row-padding content-large margin-top">
            <?php
            
				echo Dinosaur::printListDinosaur($connect, $_GET["input"], "..", $_SERVER["PHP_SELF"]."?id=dino&sez=formupdate&", $_SERVER["PHP_SELF"]."?id=dino&sez=delete&", $_SERVER["PHP_SELF"]."?id=dino&sez=comment&");
            ?>
        </div>
    </div>
    
    <div id="articoli" class="padding-6">
        <div class="colored center wrap-padding"> 
            <h1>Elenco riferito alla ricerca di articoli per </h1>
			<h2> "<?php echo $_GET["input"] ?>"</h2>
            <a href="#utenti">Vai ai risultati per gli utenti</a>
        </div>
        <div class="row-padding content-large margin-top">
            <?php
            
				echo Article::printListArticle($connect, $_GET["input"], "..", $_SERVER["PHP_SELF"]."?id=article&sez=formupdate&", $_SERVER["PHP_SELF"]."?id=article&sez=delete&", $_SERVER["PHP_SELF"]."?id=article&sez=comment&");
            ?>
        </div>
    </div>
	
<?php

    closeConnect($connect);
?>