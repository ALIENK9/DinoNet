<?php
function startConnect(){
	
	//$connect=new mysqli("http://alessandrozangari.altervista.org","alessandrozangari","","my_alessandrozangari");//DB di Alessandro
	//$connect=new mysqli("http://tecweb.altervista.org","tecweb","","my_tecweb");//DB di Cristiano
	$connect=new mysqli("127.0.0.1","root","","tecweb");//DB di cristiano 
	//$connect=new mysqli("localhost","root","","my_matteorizzo");//DB di Matteo 

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
