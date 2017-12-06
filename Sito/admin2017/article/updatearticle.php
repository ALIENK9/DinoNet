<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    if(isset($connect)){
        if(
            isset($_GET["titolo"]) && $_GET["titolo"]!=null &&
            isset($_GET["sottotitolo"]) && $_GET["sottotitolo"]!=null &&
            isset($_GET["descrizione"]) && $_GET["descrizione"]!=null &&
            isset($_GET["descrizioneimg"]) && $_GET["descrizioneimg"]!=null &&
            isset($_GET["eta"]) && $_GET["eta"]!=null /*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            $sqlQuery = "UPDATE articolo SET titolo='".$_GET['titolo']."', sottotitolo='".$_GET['sottotitolo']."', descrizione='".$_GET['descrizione']."', eta='".$_GET['eta']."', descrizioneimg='".$_GET['descrizioneimg']."' WHERE id='".$_GET['article']."'";
        
            if( $connect->query($sqlQuery) ){
                echo "Elemento Modificato";
            } 
            else {
                echo "Elemento NON Modificato";
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