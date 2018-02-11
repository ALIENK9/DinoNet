<?php

//Contenitori messaggi
function message($value){
    return "
        <div class='padding-6 content center'>
            <div class='card wrap-padding'>
                $value
            </div>
        </div>							
    ";
}

function messageBack($value){
    return "
        <div class='padding-6 content center'>
            <div class='card wrap-padding'>
                $value
                <a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Indietro </a>
            </div>
        </div>							
    ";
}

function messageBackPage($value){
    return "
        <div class='padding-6 content center'>
            <div class='card wrap-padding'>
                $value
                <a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Torna alla pagina precedente </a>
            </div>
        </div>							
    ";
}

function messageTryAgain($value){
    return "
        <div class='padding-6 content center'>
            <div class='card wrap-padding'>
                $value
                <a href=\"#\" class='btn card wrap-margin'> Riprova </a>
            </div>
        </div>							
    ";
}

function messageReload($value){
    return "
        <div class='padding-6 content center'>
            <div class='card wrap-padding'>
                $value
                <a href=\"#\" class='btn card wrap-margin'> Ricarica la pagina </a>
            </div>
        </div>							
    ";
}

function messageAddAnother($value,$url){
    return "
        <div class='padding-6 content center'>
            <div class='card wrap-padding'>
                $value
                <a href=\"$url\" class='btn card wrap-margin'> Aggiungi un altro elemento </a>
            </div>
        </div>							
    ";
}

function messageErrorForm($value){
    $echoString = "<div id=\"title-card\" class=\"card\">
                <h1 class=\"text-colored\"> Errori: </h1>";
                foreach($value as $i){
                    $echoString .= $i;
                }
        $echoString .= "</div>";
    return $echoString;
}

function messageLinkDoubleBack($url, $textButton){
    return "
    <div class=\"center wrap-padding\">
        <a href=\"".$_SERVER["HTTP_REFERER"]."\" class=\"btn card wrap-margin\">Torna alla pagina precedente</a>  
        <a href=\"".$url."\" class=\"btn card wrap-margin\"> Vai alla <span xml:lang=\"en\" lang=\"en\">".$textButton."</span></a>
    </div>	";
}

//Messaggi Generali
function messageErrorRequire(){
    return "<strong class=\"alert\">Compilare tutti i campi obbligatori</strong>";
}

function messageErrorImage($list){
    $string = "";
    foreach ($list as $msg) {
        $string .= "<strong class=\"alert\">";
        $string .= $msg;
        $string .= "</strong>";
    }
    return $string;
}

function messageErrorUpdate(){
    return "<strong class=\"alert\">Elemento non modificato</strong>";
}

function messageUpdateConfirm(){
    return "<strong class=\"alert\">Elemento modificato!</strong>";
}

function messageDeleteConfirm(){
    return "<strong class=\"alert\">Elemento eliminato</strong>";
}

function messageErrorDelete(){
    return "<strong class=\"alert\">Elemento non eliminato</strong>";
}

function messageErrorDeleteStrong(){
    return "<strong class=\"alert\">Elemento non eliminabile</strong>";
}

function messageErrorUpdateSettings(){
    return "<strong class=\"alert\">Errore aggiornamento impostazioni</strong>";
}

function messageErrorAdd(){
    return "<strong class=\"alert\">Elemento NON aggiunto</strong>";
}

function messageAddConfirm(){
    return "<strong class=\"alert\">Elemento aggiunto</strong>";
}

function messageErrorPosInteger($value){
    return "<strong class=\"alert\">Il campo $value non &#233; valido</strong>";
}

function messageErrorAlpha($value){
    return "<strong class=\"alert\">Il campo $value pu&#242; contenere solo caratteri alfabetici</strong>";
}

function messageErrorDescImage(){
    return "<strong class=\"alert\">&#201; richiesta una descrizione per l'immagine</strong>";
}

function messageEmpty(){
    return "<strong class=\"alert\">Nessun risultato</strong>";
}

function messageErrorNoComments(){
    return "<strong class=\"alert\">Non sono presenti commenti</strong>";
}

//Messaggi Utenti
function messageErrorEmailAvailable(){
    return "<strong class=\"alert\">L'email inserita non &#233; disponibile</strong>";
}

function messageErrorEmail(){
    return "<strong class=\"alert\">L'indirizzo email non &#233; valido</strong>";
}

function messageErrorPasswordShort(){
    return "<strong class=\"alert\">La password deve essere formata da almeno 4 caratteri</strong>";
}

function messageErrorPasswordConfirm(){
    return "<strong class=\"alert\">La password e la conferma non coincidono</strong>";
}

function messageErrorNameSurname(){
    return "<strong class=\"alert\">Nome o cognome non sono scritti con caratteri consentiti</strong>";
}

function messageErrorData(){
    return "<strong class=\"alert\">Data non conforme ai vincoli</strong>";
}

function messageUserAddConfirm(){
    return "<strong class=\"alert\">Utente registrato</strong>";
}

function messageErrorUserAdd(){
    return "<strong class=\"alert\">Utente non registrato</strong>";
}

function messageUserUpdateConfirm(){
    return "<strong class=\"alert\">Utente modificato!</strong>";
}

function messageUserErrorUpdate(){
    return "<strong class=\"alert\">Utente non modificato</strong>";
}

function messageUserDeleteMySelfAdmin(){
    return "<strong class=\"alert\">Non ti puoi eliminare</strong>";
}


//Messaggi Dinosauri
function messageErrorNoDino(){
    return "<strong class=\"alert\">Dinosauro non presente</strong>";
}

function messageErrorNoDinos(){
    return "<strong class=\"alert\">Dinosauri non presenti</strong>";
}

function messageErrorDinoNameAvailable(){
    return "<strong class=\"alert\">Il nome del dinosauro non &#233; disponibile</strong>";
}

function messageErrorPeriodoMin(){
    return "<strong class=\"alert\">Il periodo minimo riportato non &#233; valido</strong>";
}

function messageErrorPeriodoMax(){
    return "<strong class=\"alert\">Il periodo massimo riportato non &#233; valido</strong>";
}

function messageErrorPeriodoMinMax(){
    return "<strong class=\"alert\">Il periodo riportato non &#233; valido</strong>";
}

function messageErrorDinoNome(){
    return "<strong class=\"alert\">Il nome non &#233; scritto con caratteri consentiti</strong>";
}

//Messaggi Articoli
function messageErrorNoArticle(){
    return "<strong class=\"alert\">Articolo non presente</strong>";
}

function messageErrorNoArticles(){
    return "<strong class=\"alert\">Articoli non presenti</strong>";
}


?>