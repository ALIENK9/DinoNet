<div class="card green-sea wrap-padding content panel">
	<p class="comment">
		Questo è un commento!!
	</p>
	<br/>
	<form>
		<label for="casella-commento"><p>Lascia un commento</p></label>
		<input type="text" name="casella-commento" placeholder="Scrivi qui il tuo commento" id="casella-commento" class="comment"/>
		<br/>
		<input type="submit" value="Pubblica" class="card btn green-sea"/>
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