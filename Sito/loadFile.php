<?php

    function loadImage($cartella, $nome, $immagine, $sizeWidth, $sizeHeight){

        $estensioneFile = strtolower(pathinfo($immagine["name"],PATHINFO_EXTENSION));
        $destinazioneFileDB = "/img/".$cartella."/".$nome.".".$estensioneFile; 
        $destinazioneFile = __DIR__."/img/".$cartella."/".$nome.".".$estensioneFile;

        $error = validateImage($immagine, $sizeWidth, $sizeHeight);
        
        // Controlla se il file esiste
        if (file_exists($destinazioneFile) && delImage($destinazioneFile)) {
            $echoString = "Il File è gia presente e non sostituibile";
            $error = 1;
        }

        if ($error == 0) {
            if (!move_uploaded_file($immagine["tmp_name"], $destinazioneFile)) {
                $echoString = "Errore caricamento immagine";
                $error = 1;
            }
        }
        if ($error == 0) {            
            return $destinazioneFileDB;
        }
        else{
            return NULL;
        }
    }

    function validateImage($immagine, $sizeWidth, $sizeHeight){
        
        $estensioneFile = strtolower(pathinfo($immagine["name"],PATHINFO_EXTENSION));
        $error = 0;
        
        $stato = getimagesize($immagine["tmp_name"]);
        if($stato === false) {
            $echoString = "Il File non è una immagine";
            $error = 1;
        }
        
        // Controlla la dimensione del file
        if ($immagine["size"] > 500000) {
            $echoString = "Il File è troppo grande";
            $error = 1;
        }
        // Controlla se il file è nei formati JPG, JPEG, PNG e GIF
        if($estensioneFile != "jpg" && $estensioneFile != "png" && $estensioneFile != "jpeg"
        && $estensioneFile != "gif" ) {
            $echoString = "Sono consentiti solo file JPG, JPEG, PNG e GIF";
            $error = 1;
        }

        if($stato[0]!=$sizeWidth || $stato[1]!=$sizeHeight){
            $echoString = "l'immagine non rispetta le dimensioni consentite";
            $error = 1;
        }
        return $error;
    }

    function delImage($path){
        $echoString = "";

        if(file_exists($path)){
            unlink($path);
        } 
        else{
            $echoString = "Errore elemanto non presente";
        }
        return $echoString;
    }

?>