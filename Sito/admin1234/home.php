<?php

if(!isset($_SESSION['paneluser']) || $_SESSION['paneluser']==""){
	header("Location: ../error.php");
	exit();
}

?>
<header id="header-home" class="padding-6 parallax header-image">
    <div class="content">
		<div class="wrap-padding colored card">
		<?php
			if($_SESSION['paneluser']->getUrlImmagine()!=NULL && $_SESSION['paneluser']->getUrlImmagine()!=""){
						echo ' <img class="profile-pic" src="..'.$_SESSION['paneluser']->getUrlImmagine().'" alt="Profilo di '.$_SESSION['paneluser']->getNome().' '.$_SESSION['paneluser']->getCognome().'"/>';
			}
		?>
			<h1 class="wide"> Benvenuto </h1>
			<h2> <?php echo $_SESSION['paneluser']->getNome() . ' ' . $_SESSION['paneluser']->getCognome(); ?> </h2>
		</div>
		<div class="card white wrap-padding center">
			<p>
				Tramite questo pannello puoi gestire i contenuti e gli utenti per DINO NET! <br>
				Utilizza il menù per accedere ai pannelli di modifica, oppure:
			</p>
			<a href="../index.php" class="btn card wrap-margin"> Vai al sito pubblico </a>
		</div>
    </div>
</header>

<?php 
	include_once (__DIR__."/../breadcrumb.php");
	echo breadcrumbAdmin();

    echo alertMessageNoJs();
 ?>
