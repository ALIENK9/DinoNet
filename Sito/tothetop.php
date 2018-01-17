<!-- To the top btn -->

<a id="toTheTop" href="#main" title="Torna su" class="up-arrow arrow btn card">
    <span class="hidden"> Torna su</span>
</a>

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

<!-- Smooth Scrolling -->

<script>
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
