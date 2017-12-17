<?php
    function loadImage($cartella, $nome, $immagine){
        $homepath = substr( $_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
        if (strpos($_SERVER['SCRIPT_NAME'], 'TecWeb') !== false) {
            $homepath .= "/TecWeb";
        }
        //$destinazioneFileDB = "/img/".$cartella."/".basename($_FILES["imgaccount"]["name"]); //Da eliminare nel definitivo
        //$destinazioneFile = $homepath."/img/".$cartella."/".basename($_FILES["imgaccount"]["name"]);
        $estensioneFile = strtolower(pathinfo($immagine["name"],PATHINFO_EXTENSION));
        $destinazioneFileDB = "/img/".$cartella."/".$nome.".".$estensioneFile; 
        $destinazioneFile = $homepath."/img/".$cartella."/".$nome.".".$estensioneFile;
        $statoCaricamento = 1;
        
        $stato = getimagesize($immagine["tmp_name"]);
        if($stato === false) {
            $echoString = "Il File non è una immagine";
            $statoCaricamento = 0;
        }
        
        // Controlla se il file esiste
        if (file_exists($destinazioneFile) && delImage($destinazioneFile)) {
            $echoString = "Il File è gia presente e non sostituibile";
            $statoCaricamento = 0;
        }
        // Controlla la dimensione del file
        if ($immagine["size"] > 500000) {
            $echoString = "Il File è troppo grande";
            $statoCaricamento = 0;
        }
        // Controlla se il file è nei formati JPG, JPEG, PNG e GIF
        if($estensioneFile != "jpg" && $estensioneFile != "png" && $estensioneFile != "jpeg"
        && $estensioneFile != "gif" ) {
            $echoString = "Sono consentiti solo file JPG, JPEG, PNG e GIF";
            $statoCaricamento = 0;
        }
        if ($statoCaricamento != 0) {
            if (!move_uploaded_file($immagine["tmp_name"], $destinazioneFile)) {
                $echoString = "Errore caricamento immagine";
                $statoCaricamento = 0;
            }
        }
        if ($statoCaricamento != 0) {            
            return $destinazioneFileDB;
        }
        else{
            return NULL;
        }
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