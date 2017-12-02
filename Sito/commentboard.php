<div class="card text-area-padding content panel">
    <a class="aiuti_nascosti" href="#casella-commento">Salta a inserisci un commento</a>
	<p class="fancy-border text-area-padding">
		Questo è un commento!!
	</p>
	<br/>
	<form class="center">
		<label for="casella-commento">Lascia un commento</label>
		<input type="text" name="casella-commento" placeholder="Scrivi qui il tuo commento" id="casella-commento" class="fancy-border text-area-padding"/>
		<br/>
		<input type="submit" value="PUBBLICA" class="btn small-btn colored wide"/>
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