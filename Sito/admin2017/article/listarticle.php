
<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
	if(isset($connect)){
		$sqlFilter = "";
		if(isset($_GET["filter"]) && $_GET["filter"]!=null){
			$words = explode(" ",$_GET["filter"]);
			$sqlFilter="WHERE ";
			foreach($words as $value){
				$sqlFilter .= "id LIKE '%".$value."%' OR titolo LIKE '%".$value."%' OR sottotitolo LIKE '%".$value."%' OR descrizione LIKE '%".$value."%' OR eta LIKE '%".$value."%' OR descrizioneimg LIKE '%".$value."%' OR idautore LIKE '%".$value."%' ";
			}
		}
		
		$sqlFilter .= "ORDER BY id, titolo, sottotitolo, eta";
		$sqlQuery = "SELECT id, titolo, sottotitolo, eta FROM articolo ".$sqlFilter;
		$result = $connect->query($sqlQuery);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			?>
				<div class="third wrap-padding">
				<div id="" class="card wrap-margin">
					<div class="padding-medium green-sea">
						<h1> <?php echo $row["id"]; ?> </h1>
					</div>
					<!--<img src="img/immagineprofilo.jpg" alt="immagine profilo utente">-->
					<div class="padding-medium">
						<p>
							Titolo: <?php echo $row["titolo"]; ?><br>
							Sottotitolo: <?php echo $row["sottotitolo"]; ?><br>
							Età: <?php echo $row["eta"]; ?>
						</p>
					</div>
					<div class="center padding-2">
						<a href="<?php echo $_SERVER["PHP_SELF"]."?id=".$_GET["id"]."&sez=formupdate&article=".$row["id"]?>" class="btn green-sea"><p> Modifica</p></a>
						<a href="<?php echo $_SERVER["PHP_SELF"]."?id=".$_GET["id"]."&sez=delete&article=".$row["id"]?>" class="btn green-sea"><p> Elimina </p></a>
					</div>
				</div>
			</div>
			<?php
			}
		} 
		else {
			echo "0 risultati";
		}
	}
}
else{
	
	header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
	exit();
}
?>