<div id="topbar" class="center">
<form action="search.php" method="get" id="searchbar">
        <label for="search-input" class="hidden">Ricerca nel sito</label>
        <div id="wrapper">
            <input id="search-input" name="input" title="Barra di ricerca" aria-label="Barra di ricerca" type="search" 
                <?php
                    if(isset($_GET["input"])){echo 'value="'.$_GET["input"].'"';}
                ?>
                placeholder="Cerca una specie o un articolo">
            <input id="conferma" type="submit" title="Avvia la ricerca" aria-label="Avvia la ricerca" value="">
        </div>
    </form>

    <a id="mobile-menu-icon" href="#nojs-avviso" class="hide-large bar-item btn card right" onclick="">&#9776;</a>
    <a id="show-searchbar" title="Mostra o nascondi la barra di ricerca" href="javascript:void(0)" class="btn card right" onclick="toggle_searchbar()">&#x1F50D;</a>
</div>


<script src="js/buttons.js"></script>

<script type="text/javascript">
    addJS(); //nasconde alcuni plocchi, mostrando invece pulsanti per visualizzarli

    /*Nasconde la barra di ricerca quando si scorre verso il basso*/
    /*var lastScrollTop = 0;
    window.addEventListener("scroll", function() {
        var st = window.pageYOffset || document.documentElement.scrollTop;
        if (st > lastScrollTop && (document.documentElement.scrollTop > 150 || document.body.scrollTop > 150)) {
            document.getElementById("searchbar").classList.add("hidden");
        }
        else {
            document.getElementById("searchbar").classList.remove("hidden");
        }
        lastScrollTop = st;
    }, false);*/
</script>