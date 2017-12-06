<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    if(isset($connect)){

        if(
            isset($_GET["titolo"]) && $_GET["titolo"]!=null &&
            isset($_GET["sottotitolo"]) && $_GET["sottotitolo"]!=null &&
            isset($_GET["descrizione"]) && $_GET["descrizione"]!=null &&
            isset($_GET["eta"]) && $_GET["eta"]!=null &&
            isset($_GET["descrizioneimg"]) && $_GET["descrizioneimg"]!=null /*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            $sqlQuery = "INSERT INTO articolo (titolo, sottotitolo, descrizione, eta, descrizioneimg, datains, idautore) VALUES ('".$_GET['titolo']."', '".$_GET['sottotitolo']."', '".$_GET['descrizione']."', '".$_GET['eta']."', '".$_GET['descrizioneimg']."', '".date('Y-m-j')."', 'dino@dinosauro.it') ";
            
            if( $connect->query($sqlQuery) ){
                echo "Elemento Aggiunto";
            } 
            else {
                echo "Elemento NON Aggiunto";
            }
        }
        else{
            echo "Errore campi";
        }
    }
}
else{
    
    header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
    exit();
}
?>