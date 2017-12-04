<div class="card colored text-area-padding content panel">
    <a class="aiuti_nascosti" href="#casella-commento">Salta a inserisci un commento</a>
	<p class="text-area-padding">
		Questo è un commento!!
	</p>
	<br/>
	<h3 class="center">Commenta</h3>
	<form class="center">
		<p><label for="casella-commento">Lascia un commento</label></p>
		<input type="text" name="casella-commento" placeholder="Scrivi qui il tuo commento" id="casella-commento" class="fancy-border text-area-padding"/>
		<br/>
		<input type="submit" value="PUBBLICA" class="card btn wide text-colored white"/>
	</form>
</div>


<!--script>
	var acc = document.getElementsByClassName("expanding");
	var i;

	for (i = 0; i < acc.length; i++) {
	    acc[i].onclick = function(){
	        this.classList.toggle("active");
	        var panel = this.nextElementSibling;
	        if (panel.style.display === "block") {
	            panel.style.display = "none";
	        } else {
	            panel.style.display = "block";
	        }
	    }
}
</script-->