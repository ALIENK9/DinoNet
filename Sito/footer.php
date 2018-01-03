<?php
    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<footer class="colored padding-3">
	<div class="content center">
		<h2 class="wide"> DINONET </h2>
		<h3>Autori:</h3>
        <p>Matteo Rizzo</p>
        <p>Cristiano Tessarolo</p>
        <p>Alessandro Zangari</p>
        <p>
            Questo sito è un stato realizzato per un progetto del corso di Tecnologie
            <span xml:lang="en" lang="en">Web</span> del Corso di Laurea in Informatica dell'Università di Padova,
            durante l'anno accademico 2017-2018.
            I testi descrittivi di ciascun dinosauro sono stati presi prevalentemente dai libri
            <em>Dinosauri la vita nella preistoria</em> di <span xml:lang="en" lang="en">Hazel Richardson</span>,
            e <em>Il pianeta dei Dinosauri</em> curato da Piero e Alberto Angela. Alcuni aggiustamenti sono stati
            fatti con informazioni prese da <a href="http://it.wikipedia.org/wiki/">Wikipedia</a>.
            Le icone utilizzate sono state prelevate dai siti <a href="https://icons8.it/">Icons8</a>,
            <a href="https://www.flaticon.com/">Flaticon</a>.
        </p>

        <p id="sitemap">
            <a href="index.php" <?php if($currentPage == $pages["index"]) echo 'class="disabled"'; ?>>Home</a> |
            <a href="history.php" <?php if($currentPage == $pages["history"]) echo 'class="disabled"'; ?>>Storia</a> |
            <a href="species.php" <?php if($currentPage == $pages["species"]) echo 'class="disabled"'; ?>>Specie</a> |
            <a href="articles.php" <?php if($currentPage == $pages["articles"]) echo 'class="disabled"'; ?>>Articoli</a> |
            <a href="login.php" <?php if($currentPage == $pages["login"]) echo 'class="disabled"'; ?>>Accesso</a>
        </p>
	</div>
</footer>

<?php include_once('nojsmenu.php') ?>