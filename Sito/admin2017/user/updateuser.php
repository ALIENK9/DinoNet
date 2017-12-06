<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    if(isset($connect)){
        if(
            isset($_GET["nome"]) && $_GET["nome"]!=null &&
            isset($_GET["cognome"]) && $_GET["cognome"]!=null &&
            isset($_GET["datanascita"]) && $_GET["datanascita"]!=null &&
            isset($_GET["password"]) && $_GET["password"]!=null &&
            isset($_GET["passwordconf"]) && $_GET["passwordconf"]!=null &&
            $_GET["password"]==$_GET["passwordconf"] /*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            $sqlQuery = "UPDATE utente SET nome='".$_GET['nome']."', cognome='".$_GET['cognome']."', datanascita='".$_GET['datanascita']."', password='".$_GET['password']."' WHERE email='".$_GET['email']."'";
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