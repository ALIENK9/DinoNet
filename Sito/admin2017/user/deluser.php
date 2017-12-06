<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    if(isset($connect)){
        if(isset($_GET["user"]) && $_GET["user"]!=null){
            $sqlQuery = "DELETE FROM utente WHERE email = '".$_GET['user']."' ";
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