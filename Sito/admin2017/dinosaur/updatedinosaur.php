<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    if(isset($connect)){
        if(
            isset($_GET["nome"]) && $_GET["nome"]!=null &&
            isset($_GET["peso"]) && $_GET["peso"]!=null &&
            isset($_GET["altezza"]) && $_GET["altezza"]!=null &&
            isset($_GET["lunghezza"]) && $_GET["lunghezza"]!=null &&
            isset($_GET["periodomin"]) && $_GET["periodomin"]!=null &&
            isset($_GET["periodomax"]) && $_GET["periodomax"]!=null &&
            isset($_GET["habitat"]) && $_GET["habitat"]!=null &&
            isset($_GET["alimentazione"]) && $_GET["alimentazione"]!=null &&
            isset($_GET["tipologiaalimentazione"]) && $_GET["tipologiaalimentazione"]!=null &&
            isset($_GET["descrizioneautore"]) && $_GET["descrizioneautore"]!=null &&
            isset($_GET["descrizione"]) && $_GET["descrizione"]!=null &&
            isset($_GET["curiosita"]) && $_GET["curiosita"]!=null/*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            $sqlQuery = "UPDATE dinosauro SET peso='".$_GET['peso']."', altezza='".$_GET['altezza']."', lunghezza='".$_GET['lunghezza']."', 
            periodomin='".$_GET['periodomin']."', periodomax='".$_GET['periodomax']."', habitat='".$_GET['habitat']."', alimentazione='".$_GET['alimentazione']."', tipologiaalimentazione='".$_GET['tipologiaalimentazione']."', descrizioneautore='".$_GET['descrizioneautore']."',
            descrizione='".$_GET['descrizione']."', curiosita='".$_GET['curiosita']."' WHERE nome='".$_GET['nome']."'";
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