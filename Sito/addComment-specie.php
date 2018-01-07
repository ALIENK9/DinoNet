<?php
include_once ("classi/User.php");
session_start();
include_once ("classi/Dinosaur.php");

include_once ("connect.php");
$connectSpecies = startConnect();

if(isset($_SESSION['user']) && isset($_POST["idspecie"]) ){
    if(!isset($_POST["casella-commento"])){
        $_POST["casella-commento"] = "";
    }
   echo Dinosaur::addComment($connectSpecies,$_POST["idspecie"],$_SESSION["user"]->getEmail(),$_POST["casella-commento"]);

}

header("Location: ".$_SERVER["HTTP_REFERER"]."#commentboard");


closeConnect($connectSpecies);

?>