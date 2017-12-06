<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    if(isset($connect)){

        $sqlQuery = "SELECT email FROM utente WHERE email = '".$_GET['email']."' ";
        $result = $connect->query($sqlQuery);

        if(
            $result->num_rows == 0 &&
            isset($_GET["email"]) && $_GET["email"]!=null &&
            isset($_GET["nome"]) && $_GET["nome"]!=null &&
            isset($_GET["cognome"]) && $_GET["cognome"]!=null &&
            isset($_GET["datanascita"]) && $_GET["datanascita"]!=null &&
            isset($_GET["password"]) && $_GET["password"]!=null &&
            isset($_GET["passwordconf"]) && $_GET["passwordconf"]!=null &&
            $_GET["password"]==$_GET["passwordconf"] /*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            $sqlQuery = "INSERT INTO utente (email, nome, cognome, datanascita, password) VALUES ('".$_GET['email']."', '".$_GET['nome']."', '".$_GET['cognome']."', '".$_GET['datanascita']."', '".$_GET['password']."') ";
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