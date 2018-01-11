<?php   
    
    include_once (__DIR__."/../classi/Dinosaur.php");	
    include_once (__DIR__."/../classi/Article.php");	
    include_once (__DIR__."/../classi/UserAdmin.php");	
    
	include_once (__DIR__."/../connect.php");
    $connect = startConnect();
    
    if(!isset($_GET["input"])){
        $_GET["input"]="";
    }
?>

<div id="content" class="padding-6">
        <div class="colored center wrap-padding">
            <h1>Elenco riferito alla ricerca di Utenti</h1>
        </div>
        <div class="row-padding content-large margin-top">
            <?php
            
				echo UserAdmin::printListUser($connect, $_GET["input"], ".", "display-specie.php?");
            ?>
        </div>
    </div>
    
    <div id="content" class="padding-6">
        <div class="colored center wrap-padding">
            <h1>Elenco riferito alla ricerca di dinosauri</h1>
        </div>
        <div class="row-padding content-large margin-top">
            <?php
            
				echo Dinosaur::printListDinosaur($connect, $_GET["input"], "..", $_SERVER["PHP_SELF"]."?id=dino&sez=formupdate&", $_SERVER["PHP_SELF"]."?id=dino&sez=delete&");
            ?>
        </div>
    </div>
    
    <div id="content" class="padding-6">
        <div class="colored center wrap-padding">
            <h1>Elenco riferito alla ricerca di articoli</h1>   
        </div>
        <div class="row-padding content-large margin-top">
            <?php
            
				echo Article::printListArticle($connect, $_GET["input"], "..", $_SERVER["PHP_SELF"]."?id=article&sez=formupdate&", $_SERVER["PHP_SELF"]."?id=article&sez=delete&");
            ?>
        </div>
    </div>
	
<?php

	closeConnect($connect);
?>