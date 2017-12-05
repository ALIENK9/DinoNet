<!-- To the top btn -->

<button onclick="topFunction()" id="toTheTop" title="Torna su" class="up-arrow arrow btn card"></button>

<script>
// When the user scrolls down 200px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        document.getElementById("toTheTop").style.display = "block";
    } else {
        document.getElementById("toTheTop").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

<!-- /To the top btn -->