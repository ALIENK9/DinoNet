<!-- Loading -->

<div id="loading" class="loading colored no-js">
	<div class="display-middle center">
		<img class="bounce" src="img/dino-loading.png" alt="Caricamento">
    </div>
</div>

<!-- Loading - script -->
<script>
    function addJS() {
        var str = document.getElementById("loading").innerHTML;
        var txt = str.replace(/no-js/i,"js");
        document.getElementById("loading").innerHTML = txt;
    }

	$(document).ready(function() {
		$(window).load(function() {
		$(".loading").fadeOut("slow");
		});
	});
</script>

<!-- Loading - script -->

<!-- /Loading -->
