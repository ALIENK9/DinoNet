<!-- To the top btn -->

<a id="toTheTop" href="#main" title="Torna su" class="up-arrow arrow btn card"></a>

<script>
    document.getElementById("toTheTop").style.display = "none"; //all'inizio non si vede

    //Quando l'utente scorre almeno 200px dalla cima del documento allora viene mostrato
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            document.getElementById("toTheTop").style.display = "block";
        }
        else {
            document.getElementById("toTheTop").style.display = "none";
        }
    }
</script>

<!-- /To the top btn -->