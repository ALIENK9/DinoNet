<?php
    if(isset($_SESSION['user']) && $_SESSION['user']!=null){
        ?>
		<header id="header-home" class="padding-6 parallax">
			<div id="title-card" class="content card">
                <h1 class="title wide"> Benvenuto </h1>
                <h2 class="text-colored"> <?php echo $_SESSION['user']->getNome() . ' ' . $_SESSION['user']->getCognome(); ?> </h2>
            </div>
            <h3 class="content card colored wrap-padding center">
                Tramite questo pannello amministratore puoi gestire i contenuti e gli utenti per Tirannosaurus Web!
                Utilizza il menù per accedere ai pannelli di modifica.
            </h3>
        </header>

        <header id="header-home" class="parallax padding-6">
            <div id="title-card" class="content card">
                <h1 class="title wide"> Le specie </h1>
                <h2> Scopri informazioni dettagliate su innumerevoli dinosauri </h2>
            </div>
            <div id="input-area" class="content card colored wrap-padding center">
                <!--div class="content center">
                    <h1> <label for="search-dino"> CERCA UN DINOSAURO! </label> </h1>
                    <input id="search-dino" class="margin-2" type="text" placeholder="e.g. Brontosauro">
                    <input type="submit" value="CERCA" class="card btn wide text-colored white">
                    <br><br>
                    <h1> OPPURE </h1>
                    ...
                </div-->
                <a href="all-species.php" class="btn card colored wrap-margin"><p> Vai alla lista completa delle specie </p></a>
            </div>
            <a href="#daily-dino" title="Scorri al contenuto del giorno" class="down-arrow arrow btn card bounce"></a>
        </header>
        <?php
	}
	else{
		
		header("Location: http://". $_SERVER['HTTP_HOST']."/TecWeb/error.php");
		exit();
	}

?>