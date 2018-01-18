<?php
    if(isset($_SESSION['paneluser']) && $_SESSION['paneluser']!=null){
        ?>
		<header id="header-home" class="padding-6 parallax">
			<div id="title-card" class="content card">
                <h1 class="wide text-colored"> Benvenuto </h1>
                <h2 class="text-colored"> <?php echo $_SESSION['paneluser']->getNome() . ' ' . $_SESSION['paneluser']->getCognome(); ?> </h2>
            </div>
            <h3 class="content card colored wrap-padding center">
                Tramite questo pannello puoi gestire i contenuti e gli utenti per DINO NET!
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