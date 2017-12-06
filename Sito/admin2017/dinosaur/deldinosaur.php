<?php

if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    if(isset($connect)){
        if(isset($_GET["nome"]) && $_GET["nome"]!=null){
            $sqlQuery = "DELETE FROM dinosauro WHERE nome = '".$_GET['nome']."' ";
            if( $connect->query($sqlQuery) ){
                echo "Elemento eliminato";
            } 
            else {
                echo "Elemento NON eliminato";
            }
        }
    }
}
else{
    
    header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
    exit();
}
?>