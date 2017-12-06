
<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
	if(isset($connect)){
		$sqlFilter = "";
		if(isset($_GET["filter"]) && $_GET["filter"]!=null){
			$words = explode(" ",$_GET["filter"]);
			$sqlFilter="WHERE ";
			foreach($words as $value){
				$sqlFilter .= "nome LIKE '%".$value."%' OR cognome LIKE '%".$value."%' OR email LIKE '%".$value."%' ";
			}
		}
		
		$sqlFilter .= "ORDER BY email, nome, cognome";
		$sqlQuery = "SELECT email, nome, cognome FROM utente ".$sqlFilter;
		$result = $connect->query($sqlQuery);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			?>
				<div class="third wrap-padding">
				<div id="" class="card wrap-margin">
					<div class="padding-medium green-sea">
						<h1> <?php echo $row["email"]; ?> </h1>
					</div>
					<!--<img src="img/immagineprofilo.jpg" alt="immagine profilo utente">-->
					<div class="padding-medium">
						<p>
							Nome: <?php echo $row["nome"]; ?><br>
							Cognome: <?php echo $row["cognome"]; ?>
						</p>
					</div>
					<div class="center padding-2">
						<a href="<?php echo $_SERVER["PHP_SELF"]."?id=".$_GET["id"]."&sez=formupdate&user=".$row["email"]?>" class="btn green-sea"><p> Modifica</p></a>
						<a href="<?php echo $_SERVER["PHP_SELF"]."?id=".$_GET["id"]."&sez=delete&user=".$row["email"]?>" class="btn green-sea"><p> Elimina </p></a>
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