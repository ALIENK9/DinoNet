<div id="topbar" class="center">
    <form id="searchbar">
        <label for="search-input" class="hidden">Ricerca nel sito</label>
        <div id="wrapper">
            <input id="search-input" type="search" placeholder=
                <?php 
                if($currentPage == $pages["articles"] or $currentPage == $pages["all-articles"]) echo '"Cerca un articolo (ex: la grande scoperta)"';
                else if($currentPage == $pages["species"] or $currentPage == $pages["all-species"]) echo '"Cerca un dinosauro (ex: T-Rex)"';
                else echo '"Cerca una specie o un articolo"'?>>
            <input id="conferma" type="submit" title="Avvia la ricerca" value="">
        </div>
    </form>

    <a id="mobile-menu-icon" href="#nojs-avviso" class="hide-large bar-item btn right" onclick="">&#9776;</a>
</div>


<script>
    function addJS() { //rende visibile il menù laterale
        document.getElementById("mobile-menu-icon").setAttribute("href", "javascript:void(0)");
        document.getElementById("mobile-menu-icon").setAttribute("onclick", "open_menu()");
    }
    addJS();

    // Script per aprire il menù
    function open_menu() {
        document.getElementById("sidebar").style.display = "block";
        document.getElementById("overlay").style.display = "block";
    }

    //Script per chiudere il menù
    function close_menu() {
        document.getElementById("sidebar").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }

    /*Nasconde la barra di ricerca quando si scorre verso il basso*/
    var lastScrollTop = 0;
    window.addEventListener("scroll", function(){
        var st = window.pageYOffset || document.documentElement.scrollTop;
        if (st > lastScrollTop && (document.documentElement.scrollTop > 150 || document.body.scrollTop > 150)) {
            document.getElementById("searchbar").classList.add("hidden");
        }
        else {
            document.getElementById("searchbar").classList.remove("hidden");
        }
        lastScrollTop = st;
    }, false);
</script>