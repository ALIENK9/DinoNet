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
    return "<h2>Compilare tutti i campi obbligatori</h2>";
}

function messageErrorImage(){
    return "<h2>Immagine non confrome ai vincoli</h2>";
}

function messageErrorUpdate(){
    return "<h2>Elemento non modificato</h2>";
}

function messageUpdateConfirm(){
    return "<h2>Elemento modificato!</h2>";
}

function messageDeleteConfirm(){
    return "<h2>Elemento eliminato</h2>";
}

function messageErrorDelete(){
    return "<h2>Elemento non eliminato</h2>";
}

function messageErrorDeleteStrong(){
    return "<h2>Elemento non eliminabile</h2>";
}

function messageErrorUpdateSettings(){
    return "<h2>Errore aggiornamento impostazioni</h2>";
}

function messageErrorAdd(){
    return "<h2>Elemento NON aggiunto</h2>";
}

function messageAddConfirm(){
    return "<h2>Elemento aggiunto</h2>";
}

function messageErrorPosInteger($value){
    return "<h2>Il campo $value non &#233; valido</h2>";
}

function messageErrorAlpha($value){
    return "<h2>Il campo $value pu&#242; contenere solo caratteri alfabetici</h2>";
}

function messageErrorDescImage(){
    return "<h2>&#201; richiesta una descrizione per l'immagine</h2>";
}

function messageEmpty(){
    return "<h2>Nessun risultato</h2>";
}

function messageErrorNoComments(){
    return "<h2>Non sono presenti commenti</h2>";
}

//Messaggi Utenti
function messageErrorEmailAvailable(){
    return "<h2>L'email inserita non &#233; disponibile</h2>";
}

function messageErrorEmail(){
    return "<h2>L'indirizzo email non &#233; valido</h2>";
}

function messageErrorPasswordShort(){
    return "<h2>La password deve essere formata da almeno 4 caratteri</h2>";
}

function messageErrorPasswordConfirm(){
    return "<h2>La password e la conferma non coincidono</h2>";
}

function messageErrorNameSurname(){
    return "<h2>Nome o cognome non sono scritti con caratteri consentiti</h2>";
}

function messageErrorData(){
    return "<h2>Data non conforme ai vincoli</h2>";
}

function messageUserAddConfirm(){
    return "<h2>Utente registrato</h2>";
}

function messageErrorUserAdd(){
    return "<h2>Utente non registrato</h2>";
}

function messageUserUpdateConfirm(){
    return "<h2>Utente modificato!</h2>";
}

function messageUserErrorUpdate(){
    return "<h2>Utente non modificato</h2>";
}

function messageUserDeleteMySelfAdmin(){
    return "<h2>Non ti puoi eliminare</h2>";
}


//Messaggi Dinosauri
function messageErrorNoDino(){
    return "<h2>Dinosauro non presente</h2>";
}

function messageErrorNoDinos(){
    return "<h2>Dinosauri non presenti</h2>";
}

function messageErrorDinoNameAvailable(){
    return "<h2>Il nome del dinosauro non &#233; disponibile</h2>";
}

function messageErrorPeriodoMin(){
    return "<h2>Il periodo minimo riportato non &#233; valido</h2>";
}

function messageErrorPeriodoMax(){
    return "<h2>Il periodo massimo riportato non &#233; valido</h2>";
}

function messageErrorPeriodoMinMax(){
    return "<h2>Il periodo riportato non &#233; valido</h2>";
}

function messageErrorDinoNome(){
    return "<h2>Il nome non &#233; scritto con caratteri consentiti</h2>";
}

//Messaggi Articoli
function messageErrorNoArticle(){
    return "<h2>Articolo non presente</h2>";
}

function messageErrorNoArticles(){
    return "<h2>Articoli non presenti</h2>";
}


?>