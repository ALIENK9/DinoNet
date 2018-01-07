<!-- To the top btn -->

<a id="toTheTop" href="#main" title="Torna su" class="up-arrow arrow btn card"><p>Torna su</p></a>

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
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }
  });
});
</script>

<!-- /Smooth Scrolling -->
