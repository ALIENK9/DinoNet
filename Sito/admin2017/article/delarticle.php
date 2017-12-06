<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    if(isset($connect)){
        if(isset($_GET["article"]) && $_GET["article"]!=null){
            $sqlQuery = "DELETE FROM articolo WHERE id = '".$_GET['article']."' ";
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