<!-- Loading -->

<div id="loading" class="loading colored require-js">
	<div class="display-middle center">
        <span id="loading-image" class="bounce margin-2"></span>
        <p>Caricamento</p>
    </div>
</div>

<!-- Loading - script -->
<script>
    document.getElementById("loading").classList.remove("require-js"); //rende visibile l'animazione di loading

	$(document).ready(function() {
		$(window).load(function() {
		$(".loading").fadeOut("slow");
		});
	});
</script>

<!-- Loading - script -->

<!-- /Loading -->
