<?php
include_once ("classi/User.php");
session_start();
include_once ("classi/Article.php");

include_once ("connect.php");
$connectArticle = startConnect();

if(isset($_SESSION['user']) && isset($_POST["idarticolo"]) ){
    if(!isset($_POST["casella-commento"])){
        $_POST["casella-commento"] = "";
    }
   echo Article::addComment($connectArticle,$_POST["idarticolo"],$_SESSION["user"]->getEmail(),$_POST["casella-commento"]);
}

header("Location: ".$_SERVER["HTTP_REFERER"]."#commentboard");


closeConnect($connectArticle);

?>