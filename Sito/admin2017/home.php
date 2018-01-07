<?php
    if(isset($_SESSION['user']) && $_SESSION['user']!=null){
        ?>
		<header id="header-home" class="padding-6 parallax">
			<div id="title-card" class="content card">
                <h1 class="wide text-colored"> Benvenuto </h1>
                <h2 class="text-colored"> <?php echo $_SESSION['user']->getNome() . ' ' . $_SESSION['user']->getCognome(); ?> </h2>
            </div>
            <h3 class="content card colored wrap-padding center">
                Tramite questo pannello amministratore puoi gestire i contenuti e gli utenti per Tirannosaurus Web!
                Utilizza il menù per accedere ai pannelli di modifica.
            </h3>
        </header>
        <?php
	}
	else{
		
		header("Location: ../error.php");
		exit();
	}

?>