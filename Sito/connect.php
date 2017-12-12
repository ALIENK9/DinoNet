<?php
function startConnect(){
	$connect=new mysqli("http://alessandrozangari.altervista.org","alessandrozangari","","my_alessandrozangari");
	if($connect->connect_error){
		echo "Errore di connessione: " . $connect->connect_error;
		$connect = null;
	}
	return $connect;
}

function closeConnect($connect){
	if(isset($connect)){	
		$connect->close();
	}
}
?>
