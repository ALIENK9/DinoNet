<?php

    function loadImage($cartella, $nome, $immagine, $sizeWidth, $sizeHeight){

        $estensioneFile = strtolower(pathinfo($immagine["name"],PATHINFO_EXTENSION));
        $destinazioneFileDB = "/img/".$cartella."/".$nome.".".$estensioneFile; 
        $destinazioneFile = __DIR__."/img/".$cartella."/".$nome.".".$estensioneFile;

        $error = resizeImage($immagine, $sizeWidth, $sizeHeight, $estensioneFile);

        if($error == 0)
            $error = validateImage($immagine);
        
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


    /**
     * Controlla che l'immagine sia di un formato supportato e che non sia troppo grande
     * @param $immagine
     * @return int
     */
    function validateImage($immagine){
        
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

        return $error;
    }


    /**
     * Ridimensiona l'immagine caricata.
     * @param $immagine
     * @param $sizeWidth
     * @param $sizeHeight
     * @param $estensioneFile
     * @return int, 0 se non ci sono stati errori, 1 se ci sono stati
     */
    function resizeImage($immagine, $sizeWidth, $sizeHeight, $estensioneFile) {
        $error = 0;
        $resourceImage = false;
        switch($estensioneFile) {
            case 'jpg':
            case 'jpeg':
                $resourceImage = imagecreatefromjpeg($immagine["tmp_name"]);
                break;
            case 'png':
                $resourceImage = imagecreatefrompng($immagine["tmp_name"]);
                break;
            case 'gif':
                $resourceImage = imagecreatefromgif($immagine["tmp_name"]);
                break;
            default:
                $error = 1;
                break;
        }
        if ($resourceImage !== false) {
            $scaledImage = imagescale($resourceImage, $sizeWidth, $sizeHeight);
            if ($scaledImage !== false) {
                $ok = false;
                delImage($immagine["tmp_name"]);
                switch ($estensioneFile) {
                    case 'jpg':
                    case 'jpeg':
                        $ok = imagejpeg($scaledImage, $immagine["tmp_name"]);
                        break;
                    case 'png':
                        $ok = imagepng($scaledImage, $immagine["tmp_name"]);
                        break;
                    case 'gif':
                        $ok = imagegif($scaledImage, $immagine["tmp_name"]);
                        break;
                }
                if ($ok === false)
                    $error = 1;
            }
            else
                $error = 1;
        }
        else
            $error = 1;

        return $error;
    }

    /**
     * Elimina il file con percorso $path, se esiste
     * @param $path
     * @return string
     */
    function delImage($path){
        $echoString = "";

        if(file_exists($path)){
            unlink($path);
        } 
        else{
            $echoString = "Errore elemento non presente";
        }
        return $echoString;
    }

?>