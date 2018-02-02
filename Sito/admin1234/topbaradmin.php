<?php

if(!isset($_SESSION['paneluser']) || $_SESSION['paneluser']==""){
    header("Location: ../error.php");
    exit();
}
?>
<div id="topbar" class="center">
<form action="?id=search" method="get" id="searchbar">
        <label for="search-input" class="hidden">Ricerca nel sito</label>
        <div id="wrapper">
            <input name="id" type="hidden" value="search"> 
            <input id="search-input" name="input" title="Barra di ricerca" aria-label="Barra di ricerca" type="search" 
                <?php
                    if(isset($_GET["input"])){echo 'value="'.$_GET["input"].'"';}
                ?>
                placeholder="Cerca un utente, una specie o un articolo">
            <input id="conferma" type="submit" title="Avvia la ricerca" value="">
        </div>
    </form>

    <a id="mobile-menu-icon" href="#nojs-avviso" class="hide-large bar-item btn round card right" onclick="">&#9776;</a>
</div>


<script src="../js/buttons.js"></script>

<script type="text/javascript">
    addJS(); //nasconde alcuni plocchi, mostrando invece pulsanti per visualizzarli
</script>