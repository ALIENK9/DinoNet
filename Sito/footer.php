<?php
    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<footer id="footer" class="colored padding-3">
	<div class="content center">
		<h2 class="wide"> DINO NET </h2>
		<h3>Autori:</h3>
        <p>Matteo Rizzo</p>
        <p>Cristiano Tessarolo</p>
        <p>Alessandro Zangari</p>
        <?php if (strpos(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 'admin1234') === false)
            echo '<p><a href="credits.php" title="Crediti">Crediti</a></p>';   //solo lato pubblico
        ?>
	</div>
</footer>