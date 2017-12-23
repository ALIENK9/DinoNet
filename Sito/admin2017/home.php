<?php
    if(isset($_SESSION['user']) && $_SESSION['user']!=null){
        ?>
		<header id="header-home" class="full-screen parallax">
			<div class="padding-12 content">
				<div class="card wrap-padding colored">
					<h1 class="title wide"> Benvenuto</h1>
				</div>
				<div class="card wrap-padding white">
					<p>
						Tramite questo pannello amministratore puoi gestire i contenuti e gli utenti per Tirannosaurus Web!
						Utilizza il menù per accedere ai pannelli di modifica.
					</p>
				</div>
			</div>
        </header>
        <?php
	}
	else{
		
		header("Location: http://". $_SERVER['HTTP_HOST']."/TecWeb/error.php");
		exit();
	}

?>