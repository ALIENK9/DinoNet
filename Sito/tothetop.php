<!-- To the top btn -->

<a id="toTheTop" href="#main" title="Torna su" class="up-arrow arrow btn card">
    <span class="hidden"> Torna su</span>
</a>

<?php if (strpos(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 'admin1234') !== false)
        echo '<script type="text/javascript" src="../js/buttons.js"></script>'; //lato admin
    else
        echo '<script type="text/javascript" src="js/buttons.js"></script>';    //lato pubblico
?>


<script type="text/javascript">
    document.getElementById("toTheTop").style.display = "none"; //all'inizio non si vede

    //Quando l'utente scorre almeno 200px dalla cima del documento allora viene mostrato
    window.onscroll = function() {scrollFunction()};
</script>

<!-- /To the top btn -->

<!-- Smooth Scrolling -->

<script type="text/javascript">
$(document).ready(function(){
  $("a").on('click', function(event) {

    if (this.hash !== "") {
      event.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        window.location.hash = hash;
      });
    }
  });
});
</script>
<!-- /Smooth Scrolling -->
