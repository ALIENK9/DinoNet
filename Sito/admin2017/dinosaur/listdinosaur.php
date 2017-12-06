
<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
	if(isset($connect)){
		$sqlFilter = "";
		if(isset($_GET["filter"]) && $_GET["filter"]!=null){
			$words = explode(" ",$_GET["filter"]);
			$sqlFilter="WHERE ";
			foreach($words as $value){
				$sqlFilter .= "nome LIKE '%".$value."%' OR peso LIKE '%".$value."%' OR altezza LIKE '%".$value."%' OR lunghezza LIKE '%".$value."%'
				OR periodomin LIKE '%".$value."%' OR periodomax LIKE '%".$value."%' OR habitat LIKE '%".$value."%' OR alimentazione LIKE '%".$value."%' OR tipologiaalimentazione LIKE '%".$value."%'
				OR descrizioneautore LIKE '%".$value."%' OR descrizione LIKE '%".$value."%' OR curiosita LIKE '%".$value."%' OR idautore LIKE '%".$value."%' ";
			}
		}
		
		$sqlFilter .= "ORDER BY nome";
		$sqlQuery = "SELECT nome, peso, altezza, lunghezza, tipologiaalimentazione FROM dinosauro ".$sqlFilter;
		$result = $connect->query($sqlQuery);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			?>
				<div class="third wrap-padding">
				<div id="" class="card wrap-margin">
					<div class="padding-medium green-sea">
						<h1> <?php echo $row["nome"]; ?> </h1>
					</div>
					<!--<img src="img/immagineprofilo.jpg" alt="immagine profilo utente">-->
					<div class="padding-medium">
						<p>
							Peso: <?php echo $row["nome"]; ?><br>
							Altezza: <?php echo $row["altezza"]; ?><br>
							Lunghezza: <?php echo $row["lunghezza"]; ?><br>
							Tipologia di alimentazione: <?php echo $row["tipologiaalimentazione"]; ?>
						</p>
					</div>
					<div class="center padding-2">
						<a href="<?php echo $_SERVER["PHP_SELF"]."?id=".$_GET["id"]."&sez=formupdate&nome=".$row["nome"]?>" class="btn green-sea"><p> Modifica</p></a>
						<a href="<?php echo $_SERVER["PHP_SELF"]."?id=".$_GET["id"]."&sez=delete&nome=".$row["nome"]?>" class="btn green-sea"><p> Elimina </p></a>
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