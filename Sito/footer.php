<?php
    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<footer class="colored padding-3">
	<div class="content center">
		<h2 class="wide"> DINONET S.P.A </h2>
		<p>email: info@dinonet.com</p>
		<p>tel. +39 012 345 6789</p>
        <a href="sitemap.php" class="<?php if($currentPage == "sitemap.php") echo 'disabled'; ?>">Mappa del sito</a>
	</div>
</footer>