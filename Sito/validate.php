<?php

include_once ("loadFile.php");

/**
 * Funzione che controlla se all'interno di $arrayValue tutti i campi di indice $listRequire sono inizializzati
 * @return array associativo
 */
function checkRequire($listRequire, $arrayValue){
    $error[0] = 0;  
    foreach($listRequire as $value){
        if(!isset($arrayValue[$value]) || $arrayValue[$value]==""){
            $error[0] = 1;
            $error[$value] = 1;
        }
        else{        
            $error[$value] = 0;
        }
    }
    return $error;
}

/**
 * Funzione che controlla se all'interno di $arrayValue tutti i campi di indice $listRequire sono inizializzati
 * @return array associativo
 */
function checkRequireArray($arrayValue){
    $error[0] = 0;  
    foreach($arrayValue as $i => $value){
        if(!isset($value) || $value==""){
            $error[0] = 1;
            $error[$i+1] = 1;
        }
        else{        
            $error[$i+1] = 0;
        }
    }
    return $error;
}

/**
 * Funzione che controlla se il periodo del dinosauro è corretto
 * @return array
 */
function checkPeriodoDino($periodoMin, $periodoMax){
    $error[0] = 0;  //Rilevato errore
    $error[1] = 0;  //Errore $periodoMin non valido
    $error[2] = 0;  //Errore $periodoMax non valido
    $error[3] = 0;  //Errore $periodoMin non inizializzato
    $error[4] = 0;  //Errore $periodoMax non inizializzato
    $error[5] = 0;  //Errore date non coerenti
    
    if(!isset($periodoMin) || $periodoMin == ""){
        $error[0] = 1;  
        $error[1] = 1;
    } 
    
    if(!isset($periodoMax) || $periodoMax == ""){
        $error[0] = 1;  
        $error[2] = 1;
    } 

    if($error[1] == 0 &&  $periodoMin > 350){
        $error[0] = 1;  
        $error[3] = 1;
    } 

    if($error[2] == 0 &&  $periodoMax < 60){
        $error[0] = 1;  
        $error[4] = 1;
    } 

    if(isset($periodoMin) && isset($periodoMax) && $periodoMin != "" && $periodoMax != "" && $periodoMin < $periodoMax){
        $error[0] = 1;  
        $error[5] = 1;
    }
    return $error;
}

/**
 * Funzione che controlla se il parametro è intero positivo
 * @return int
 */
function checkPositiveInteger($value){
    if(isset($value) && ctype_digit(strval($value)) && $value >= 0){
        return 0;
    }
    return 1;
}

/**
 * Funzione che controlla se il parametro è formato da soli caratteri e segni di punteggiatura
 * @return int
 */
function checkAlpha($value){
    if(isset($value) && preg_match("/^([A-zèéìòùàç]+[-.,;\"'()\s]*)*$/i", $value)){
        return 0;
    }
    return 1;
}

/**
 * Funzione che controlla se il parametro è una email
 * @return int
 */
function checkEmail($value){
    if(isset($value) && preg_match("/^[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i", $value)){
        return 0;
    }
    return 1;
} 

/**
 * Funzione che controlla se l'email è disponibile
 * @return int
 */
function checkEmailAvailable($connect, $email){
    $sqlQuery = "SELECT email FROM utente WHERE email = '".$email."' ";
    $result = $connect->query($sqlQuery); 
    if($result->num_rows > 0){
        return 1;
    }
    return 0;
} 

/**
 * Funzione che controlla se il nome del dinosauro è disponibile
 * @return int
 */
function checkNameDinoAvailable($connect, $nome){
    $sqlQuery = "SELECT nome FROM dinosauro WHERE nome = '".$nome."' ";
    $result = $connect->query($sqlQuery); 
    if($result->num_rows > 0){
        return 1;
    }
    return 0;
} 

/**
 * Funzione che controlla se il parametro è una nome o cognome valido
 * @return int
 */
function checkName($value){
    if(isset($value) && preg_match("/^([A-zèéìòùàç]+[\s\-']?)*$/i", $value)){
        return 0;
    }
    return 1;
} 

/**
 * Funzione che controlla se il parametro è la password e la password di conferma sono valide
 * @return array
 */
function checkPassword($password1, $password2){
    $error[0] = 0;  
    $error[1] = 0;
    $error[2] = 0;
    $error[3] = 0;
    if(!isset($password1) ||  strlen($password1) < 4){
        $error[0] = 1;  
        $error[1] = 1;
    } 
    if(!isset($password2) ||  strlen($password2) < 4){
        $error[0] = 1;  
        $error[2] = 1;
    } 
    if(isset($password1) && isset($password2) &&  $password1 != $password2){
        $error[0] = 1;  
        $error[3] = 1;
    }
    return $error;
}     

/**
 * Funzione che controlla se il parametro è data valida
 * @return int
 */
function checkData($value){
    $error[0] = 0;  //Rilevato errore
    $error[1] = 0;  //Errore $value non inizializzato
    $error[2] = 0;  //Errore $value non rappresenta una data
    $error[3] = 0;  //Errore data non valida

    $anno = 0;
    $mese = 0;
    $giorno = 0;

    if(!isset($value) || $value == "" ){
        $error[0] = 1;  
        $error[1] = 1;
    }
    else{
        if(!(false === strtotime($value))){
            list($anno, $mese, $giorno) = explode('-', $value); 

            if($anno<1900 || $mese==0 || $mese>12 || $giorno==0 || $giorno>31){   
                $error[0] = 1;  
                $error[3] = 1;
            }
        }
        else{
            $error[0] = 1;  
            $error[2] = 1;
        }
    }   

    return $error;
} 

/**
 * Funzione che controlla se il parameto img è una immagine valida per l'utente e se il campo desc è inizializzato
 * @return int
 */
function checkImageProfile($img){
    return checkImage($img, "Profilo utente");
}  
/**
 * Funzione che controlla se il parameto img è una immagine valida per gli articoli o per i dinosauri e se il campo desc è inizializzato
 * @return int
 */
function checkImageContent($img, $desc){
    return checkImage($img, $desc);
}   

/**
 * Funzione che controlla se il parametro img è una immagine valida e se il campo desc è inizializzato
 * @return int
 */
function checkImage($img, $desc){

    $error[0] = 0;  //Rilevato errore
    $error[1] = 0;  //Errore immagine non presente
    $error[2] = 0;  //Errore immagine non rispetta i vincoli
    $error[3] = 0;  //Errore descrizione assente
    $error[4] = 0;  //Array di messaggi di errore

    if($img['error'] != 0){
        $error[0] = 1;
        $error[1] = 1;
    }

    $validazione = validateImage($img);
    if($error[1] === 0 && $validazione[0] === 1){
        $error[0] = 1;
        $error[2] = 1;
        $error[4] = $validazione[1];
    }

    if($error[1] == 0 && (!isset($desc) || $desc=="") ){
        $error[0] = 1;
        $error[3] = 1;
    }
    return $error;
}  
?>