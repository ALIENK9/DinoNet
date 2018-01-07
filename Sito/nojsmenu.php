
<noscript>
    <div id="nojs-avviso" class="white center wrap-padding hide-large">
        <h2>Hai disabilitato JavaScript :(</h2>
        <p>Per visualizzare il menù laterale devi attivare JavaScript! In alternativa puoi continuare a navigare utilizzando questo menù</p>
    </div>

    <?php if ($currentPage == $pages["index"] || $currentPage == $pages["history"] || $currentPage == $pages["all-species"] || $currentPage == $pages["species"]
      || $currentPage == $pages["display-specie"] || $currentPage == $pages["articles"] || $currentPage == $pages["all-articles"] || $currentPage == $pages["display-article"]
      || $currentPage == $pages["login"]|| $currentPage == $pages["logout"] || $currentPage == $pages["register"] || $currentPage == $pages["view-account"]
      || $currentPage == $pages["edit-account"] || $currentPage == $pages["delete-account"]) {

        ?>
        <nav role="navigation" title="Menù di navigazione senza javascript" aria-label="Menù di navigazione senza javascript" id="nojs-menu" class="card center hide-large">
            <a class="hidden" title="Salta il menù" href="#main">Salta il menù</a>
            <a href="index.php" class="menu-entry <?php if($currentPage == $pages["index"]) echo 'active disabled'; ?>">
                <span class="menu-icon icon-home"></span>
                <p xml:lang="en" lang="en">Home</p>
            </a>
            <a href="history.php" class="menu-entry <?php if($currentPage == $pages["history"]) echo 'active disabled'; ?>">
                <span class="menu-icon icon-storia"></span>
                <p>Storia</p>
            </a>
            <a href="species.php" class="menu-entry <?php if($currentPage == $pages["all-species"] || $currentPage == $pages["display-specie"]) echo 'active'; else if($currentPage == $pages["species"]) echo 'active disabled'; ?>">
                <span class="menu-icon icon-specie"></span>
                <p>Specie</p>
            </a>
            <a href="articles.php" class="menu-entry <?php if($currentPage == $pages["all-articles"] || $currentPage == $pages["display-article"]) echo 'active'; else if($currentPage == $pages["articles"]) echo 'active disabled'; ?>">
                <span class="menu-icon icon-articoli"></span>
                <p>Articoli</p>
            </a>
            <!-- se l'utente è loggato mostra pagina profilo, altrimenti mostra quella di login -->
            <?php
            if(isset($_SESSION['user'])) {
                ?>
                <a href="view-account.php" class="menu-entry <?php if($currentPage == $pages["view-account"]) echo 'active disabled'; ?>">
                    <span class="menu-icon icon-accedi"></span>
                    <p>Account</p>
                </a>
                <?php
            }
            else {
                ?>
                <a href="login.php" class="menu-entry <?php if($currentPage == $pages["register"]) echo 'active'; else if($currentPage == $pages["login"]) echo 'active disabled'; ?>">
                    <span class="menu-icon icon-accedi"></span>
                    <p>Accedi</p>
                </a>
                <?php
            }
            ?>
        </nav>
        <?php
    }
    else {
        ?>
        <nav id="sidebar" class="sidebar bar card center">
            <div id="close-button" class="hide-large center menu-entry">
                <span onclick="close_menu()" class="btn">x</span>
            </div>
            <a class="hidden" href="#content">Salta il menù</a>
            <a href="panel.php?id=home" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "home") echo "active"; ?>">
                <span id="icon-home" class="menu-icon"></span>
                <p xml:lang="en" lang="en">Home admin</p>
            </a>
            <a href="panel.php?id=myuser" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "myuser") echo "active"; ?>">
                <span id="icon-account" class="menu-icon"></span>
                <p>Dati admin</p>
            </a>
            <a href="panel.php?id=user" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "user") echo "active"; ?>">
                <span id="icon-accounts" class="menu-icon"></span>
                <p>Utenti</p>
            </a>
            <a href="panel.php?id=dino" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "dino") echo "active"; ?>">
                <span id="icon-specie" class="menu-icon"></span>
                <p>Dinosauri</p>
            </a>
            <a href="panel.php?id=article" class="menu-entry <?php if(isset($_GET["id"]) && $_GET["id"] == "article") echo "active"; ?>">
                <span id="icon-articoli" class="menu-icon"></span>
                <p>Articoli</p>
            </a>
            <a href="panel.php?id=logout" class="menu-entry">
                <span id="icon-accedi" class="menu-icon"></span>
                <p xml:lang="en" lang="en">Logout</p>
            </a>
        </nav>
        <?php

    }
    ?> <!-- if -->

</noscript>