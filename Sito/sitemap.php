<?php
    session_start();
?>

<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
    <title>TecWeb</title>
    <meta name="description" content="Descrizione">
    <meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML, CSS, XML, JavaScript">
    <link rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/print.css" media="print">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Favicon -->

    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>

    <?php include_once('loading.php') ?>

    <?php include_once('menu.php') ?>

    <div id="main" class="main">
        <header id="header-home" class="parallax padding-12">
            <div id="title-card" class="content card">
                <h1 class="title wide"> Mappa del sito </h1>
            </div>
        </header>

        <div class="content-large padding-3 card center">
            <noscript>
                <div class="card colored wrap-padding hide-large">
                    <h2>Hai disabilitato JavaScript :(</h2>
                    <p>Per visualizzare il menù ad hamburger devi attivarlo, o in alternativa al posto del menù visualizzerai la seguente pagina</p>
                </div>
            </noscript>

            <div id="sitemap" class="wrap-padding">
                <ul>
                    <li><p><a xml:lang="en" lang="en" href="index.php">Homepage</a></p></li>
                    <li><p><a href="history.php">Storia</a></p></li>
                    <li>
                        <p><a href="species.php">Specie</a></p>
                        <ul>
                            <li><p><a href="all-species.php">Tutte le specie</a></p></li>
                        </ul>
                    </li>
                    <li>
                        <p><a href="articles.php">Articoli</a></p>
                        <ul>
                            <li><p><a href="all-articles.php">Archivio articoli</a></p></li>
                        </ul>
                    </li>
                    <li>
                        <p><a href="login.php">Accedi</a></p>
                        <ul>
                            <li><p><a href="register.php">Registrazione</a></p></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <?php include_once('footer.php') ?>

        <?php include_once('tothetop.php') ?>

    </div>

</body>
</html>
