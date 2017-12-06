<?php

if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    if(isset($connect)){

        $sqlQuery = "SELECT nome FROM dinosauro WHERE nome = '".$_GET['nome']."' ";
        $result = $connect->query($sqlQuery);

        if(
            $result->num_rows == 0 &&
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
            isset($_GET["curiosita"]) && $_GET["curiosita"]!=null /*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            $sqlQuery = "INSERT INTO dinosauro (
                nome, peso, altezza, lunghezza, periodomin, periodomax, habitat, alimentazione, tipologiaalimentazione, descrizioneautore, descrizione, curiosita, datains, idautore)
                VALUES ('".$_GET['nome']."', '".$_GET['peso']."', '".$_GET['altezza']."', '".$_GET['lunghezza']."', '".$_GET['periodomin']."', '".$_GET['periodomax']."', '".$_GET['habitat']."', '".$_GET['alimentazione']."', '".$_GET['tipologiaalimentazione']."', '".$_GET['descrizioneautore']."', '".$_GET['descrizione']."', '".$_GET['curiosita']."', '".date('Y-m-j')."', 'dino@dinosauro.it') ";
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