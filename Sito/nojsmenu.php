
<noscript id="nojs">
    <div id="nojs-avviso" class="white center wrap-padding hide-large">
        <strong class="alert">Hai disabilitato JavaScript!</strong>
        <p>Per visualizzare il menù laterale devi attivare JavaScript! In alternativa puoi continuare a navigare utilizzando questo menù</p>
    </div>

    <nav title="Menù di navigazione senza javascript" aria-label="Menù di navigazione senza javascript" id="nojs-menu" class="card center hide-large">

        <a class="hidden" title="Salta il menù" href="#main">Salta il menù</a>

        <a href="index.php" class="menu-entry <?php if($currentPage == $pages["index"]) echo 'active disabled'; else if($currentPage == $pages["credits"] || $currentPage == $pages["search"]) echo 'active'; ?>">
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
            <a href="view-account.php" class="menu-entry <?php if($currentPage == $pages["edit-account"]) echo 'active'; else if($currentPage == $pages["view-account"]) echo 'active disabled'; ?>">
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
</noscript>

<!--script type="text/javascript"> //nasconde il menù senza JS a browser testuali che eseguono JS, in modo che non si trovino 2 menù
    document.getElementById('nojs').style.display = 'none';
</script-->