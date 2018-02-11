<?php 

include_once (__DIR__."/../loadFile.php");
include_once (__DIR__ . "/../message.php");
include_once (__DIR__."/../validate.php");

class Dinosaur {    
                
    //metodi
    public static function printListDinosaur($connect, $filter, $basePathImg, $pathUpdate, $pathDelete, $pathComment){
        
        $sqlQuery = "SELECT count(nome) as ntot FROM dinosauro";
		$result = $connect->query($sqlQuery);
        $row = $result->fetch_assoc();
       
        return Dinosaur::printListDinosaurLimit($connect, $filter, 0, $row["ntot"], $basePathImg, $pathUpdate, $pathDelete, $pathComment);
    }
    public static function printListDinosaurLimit($connect, $filter, $startNumView, $numView, $basePathImg, $pathUpdate, $pathDelete, $pathComment){
        $echoString="";
        if(isset($connect)){
            $sqlFilter = "";
            if(isset($filter) && $filter!=""){
                $words = explode(" ",$filter);
                $sqlFilter="WHERE ";
                foreach($words as $value){
                    $sqlFilter .= "nome LIKE '%".$value."%' OR peso LIKE '%".$value."%' OR altezza LIKE '%".$value."%' OR lunghezza LIKE '%".$value."%'
                    OR periodomin LIKE '%".$value."%' OR periodomax LIKE '%".$value."%' OR habitat LIKE '%".$value."%' OR alimentazione LIKE '%".$value."%' OR tipologiaalimentazione LIKE '%".$value."%'
                    OR descrizionebreve LIKE '%".$value."%' OR descrizione LIKE '%".$value."%' OR curiosita LIKE '%".$value."%' OR idautore LIKE '%".$value."%' ";
                }
            }
            
            $sqlFilter .= "ORDER BY datains DESC, nome";
            $sqlQuery = "SELECT nome, peso, altezza, lunghezza, tipologiaalimentazione, immagine FROM dinosauro ".$sqlFilter." LIMIT ".$startNumView.", ".$numView;
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $echoString .='
                    <div class="third wrap-padding">
                        <div class="daily card">
                            <div class="padding-large colored">
                                <h1>'.$row["nome"].'</h1>
                            </div>
                            ';
                            if(isset($row["immagine"])){
                                $echoString .='  
								<div class="daily-wrapper">
									<img src="'.$basePathImg.$row["immagine"].'" alt="'.$row["nome"].'"/>
								</div>';
                            }
                            $echoString .='
                            <div class="center padding-2">
                                <p>
                                    <strong>Peso: </strong> '.$row["nome"].'<br>';
                                
                                    if($row["altezza"]!="" && $row["altezza"]!=NULL)
                                        $echoString .='<strong>Altezza: </strong> '.$row["altezza"].'<br>';                            
                                    if($row["lunghezza"]!="" && $row["lunghezza"]!=NULL)
                                        $echoString .=' <strong>Lunghezza: </strong> '.$row["lunghezza"].'<br>';                           
                                    if($row["tipologiaalimentazione"]!="" && $row["tipologiaalimentazione"]!=NULL)
                                        $echoString .=' <strong>Alimentazione: </strong> '.$row["tipologiaalimentazione"];
    
                                    $echoString .='
                                </p>
                            </div>
                            <div class="center padding-2">
                                <a href="'.$pathUpdate.'nome='.urlencode($row["nome"]).'" title="Modifica la scheda di '.$row["nome"].'" class="btn"> Modifica </a>
                                <a href="'.$pathComment.'nome='.urlencode($row["nome"]).'" title="Visualizza i commenti su '.$row["nome"].'" class="btn"> Commenti </a>
                                <a href="'.$pathDelete.'nome='.urlencode($row["nome"]).'" title="Elimina la scheda di '.$row["nome"].'" class="btn" onclick="return confirm(\'Sei sicuro di voler eliminare il dinosauro?\')"> Elimina </a> 
                            </div>                           
                        </div>
                    </div>
                    ';              
                }
				$echoString = '<div class="row wrap-padding">'.$echoString.'</div>';
            } 
            else {    
                $echoString = message(messageEmpty()); 
            }
        }
        return $echoString;
    }

    public static function printListDinosaurUser($connect, $filter, $basePathImg, $pathLink, $orderByInsert = false){
        
        $sqlQuery = "SELECT count(nome) as ntot FROM dinosauro";
		$result = $connect->query($sqlQuery);
        $row = $result->fetch_assoc();
       
        return Dinosaur::printListDinosaurUserLimit($connect, $filter, 0, $row["ntot"], $basePathImg, $pathLink, $orderByInsert);
    }
    
    public static function printListDinosaurUserLimit($connect, $filter, $startNumView, $numView, $basePathImg, $pathLink, $orderByInsert = false){
        $echoString="";
        if(isset($connect)){
            $sqlFilter = "";
            if(isset($filter) && $filter!=""){
                $words = explode(" ",$filter);
                $sqlFilter="WHERE ";
                foreach($words as $value){
                    $sqlFilter .= "nome LIKE '%".$value."%' OR peso LIKE '%".$value."%' OR altezza LIKE '%".$value."%' OR lunghezza LIKE '%".$value."%'
                    OR periodomin LIKE '%".$value."%' OR periodomax LIKE '%".$value."%' OR habitat LIKE '%".$value."%' OR alimentazione LIKE '%".$value."%' OR tipologiaalimentazione LIKE '%".$value."%'
                    OR descrizionebreve LIKE '%".$value."%' OR descrizione LIKE '%".$value."%' OR curiosita LIKE '%".$value."%' OR idautore LIKE '%".$value."%' ";
                }
            }
             
            if($orderByInsert){                
                $sqlFilter .= "ORDER BY datains DESC, nome";
            }
            else{
                $sqlFilter .= "ORDER BY nome";
            }
            $sqlQuery = "SELECT nome, peso, altezza, lunghezza, tipologiaalimentazione, immagine, descrizionebreve FROM dinosauro ".$sqlFilter." LIMIT ".$startNumView.", ".$numView;
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $echoString .='
                    <div class="third wrap-padding">
                        <div  class="daily card margin-half">
                            <div class="padding-large colored">
                                <h1>'.$row["nome"].'</h1>
                            </div>
                            ';
                            if(isset($row["immagine"])){
                                $echoString .='  
								<div class="daily-wrapper">
									<img src="'.$basePathImg.$row["immagine"].'" alt="'.$row["nome"].'"/>
								</div>';
                            }
                            $echoString .='
                            <div class="padding-large">
                                <ul>
                                    <li><strong>Peso: </strong> '.$row["peso"].'</li>';
                                
                                    if($row["altezza"]!="" && $row["altezza"]!=NULL)
                                        $echoString .='<li><strong>Altezza: </strong> '.$row["altezza"].'</li>';                            
                                    if($row["lunghezza"]!="" && $row["lunghezza"]!=NULL)
                                        $echoString .='<li><strong>Lunghezza: </strong> '.$row["lunghezza"].'</li>';                           
                                    if($row["tipologiaalimentazione"]!="" && $row["tipologiaalimentazione"]!=NULL)
                                        $echoString .='<li><strong>Alimentazione: </strong> '.$row["tipologiaalimentazione"].'</li>';
    
                                    $echoString .='
                                </ul>
                                <p>
                                '.html_entity_decode($row["descrizionebreve"]).'
                                </p>
                            </div>
                            <div class="center padding-2">
                                <a href="'.$pathLink.'nome='.urlencode($row["nome"]).'" title="Leggi la scheda su '.$row["nome"].'" class="btn">Visualizza la scheda del dinosauro </a>
                            </div>
                        </div>
                    </div>
                    ';                
                }
				$echoString = '<div class="row wrap-padding">'.$echoString.'</div>';
            } 
            else { 
                $echoString = message(messageEmpty()); 
            }
        }
        return $echoString;
    }

    public static function printDinosaur($connect, $id, $basePathImg){
        $echoString="";
        $sqlQuery = "SELECT nome, periodomin, periodomax, peso, altezza, lunghezza, alimentazione, immagine, habitat, descrizione, curiosita FROM dinosauro WHERE nome='$id'";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $echoString .='
                    <div class="card">
                        <div class="colored center wrap-padding">
                            <h1 xml:lang="la" lang="la">'.$row["nome"].'</h1>
                        </div>
                        <div id="dino-card-head" class="wrap-padding w3-row-padding">

                            ';
                            if(isset($row["immagine"])){
                                $echoString .=' <img id="dino-immagine" src="'.$basePathImg.$row["immagine"].'" alt="'.$row["nome"].'"/>';
                            }
                            $echoString .='
                            <div id="caratteristiche" class="wrap-padding white">
                                <h2>Caratteristiche</h2>
                                <br>
                                <ul>';
                                if($row["periodomin"]!="" && $row["periodomin"]!=NULL)$echoString .='<li><strong>Età:</strong> '.$row["periodomin"].'-'.$row["periodomax"].' milioni</li>';
                                if($row["habitat"]!="" && $row["habitat"]!=NULL)$echoString .='<li><strong>Habitat:</strong> '.$row["habitat"].'</li>';
                                if($row["altezza"]!="" && $row["altezza"]!=NULL)$echoString .='<li><strong>Altezza:</strong> '.$row["altezza"].' cm</li>';
                                if($row["lunghezza"]!="" && $row["lunghezza"]!=NULL)$echoString .='<li><strong>Lunghezza:</strong> '.$row["lunghezza"].' cm</li>';
                                if($row["peso"]!="" && $row["peso"]!=NULL)$echoString .='<li><strong>Peso:</strong> '.$row["peso"].' kg</li>';
                                if($row["alimentazione"]!="" && $row["alimentazione"]!=NULL)$echoString .='<li><strong>Alimentazione:</strong> '.$row["alimentazione"].'</li>';
                                $echoString .='</ul>
                            </div>

                        </div>
                        <div class="wrap-padding white">
                            <h2>Descrizione</h2>
                            <br>
                            '.html_entity_decode($row["descrizione"]).'                            
                            ';
                            if($row["curiosita"]!="" && $row["curiosita"]!=NULL)
                            $echoString .='<br>
                                            <h2>Una curiosità</h2>
                                            <br>
                                            '.html_entity_decode($row["curiosita"]);
                            $echoString .='
                        </div>
                    </div>          
                ';
            }
        }
        else {       
            $echoString = messageBackPage(messageEmpty()); 
        }
        return $echoString; 
    }

    public static function deleteDinosaur($connect, $id, $basePathImg){
        $echoString = "";
        if(isset($connect)){
            if(isset($id)){

                $sqlQuery = "SELECT immagine FROM dinosauro WHERE nome = '".$id."' ";
                $result = $connect->query($sqlQuery);
                if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {                    
                    
                    if($row["immagine"]!=NULL && $row["immagine"]!="" )
                        delImage($basePathImg.$row["immagine"]);                   

                    $sqlQuery = "DELETE FROM dinosauro WHERE nome = '".$id."' ";
                    if( $connect->query($sqlQuery) ){
                        $echoString = message(messageDeleteConfirm()); 
                    } 
                    else {
                        $echoString = messageTryAgain(messageErrorDelete()); 
                    }
                }
                else{
                    $echoString = message(messageErrorDeleteStrong()); 
                }
            }
        }        
        return $echoString;
    }

    public static function formAddDinosaur($url, $nome = "", $peso = "", $altezza = "", $lunghezza = "", $periodomin = "", $periodomax = "", $habitat = "", $alimentazione = "", $tipologiaalimentazione = "", $descrizionebreve = "", $descrizione = "", $curiosita = "", $error = ""){
        if(!isset($nome)){ $nome = ""; }
        if(!isset($peso)){ $peso = ""; }
        if(!isset($altezza)){ $altezza = ""; }
        if(!isset($lunghezza)){ $lunghezza = ""; }
        if(!isset($periodomin)){ $periodomin = ""; }
        if(!isset($periodomax)){ $periodomax = ""; }
        if(!isset($habitat)){ $habitat = ""; }
        if(!isset($alimentazione)){ $alimentazione = ""; }
        if(!isset($tipologiaalimentazione) || $tipologiaalimentazione==""){ $tipologiaalimentazione = "carnivoro"; }
        if(!isset($descrizionebreve)){ $descrizionebreve = ""; }
        if(!isset($descrizione)){ $descrizione = ""; }
        if(!isset($curiosita)){ $curiosita = ""; }
        if(!isset($error)){ $error = ""; }

        $alimentazionecarnivora = "";
        $alimentazioneonnivora = "";
        $alimentazioneerbivora = "";
        if($tipologiaalimentazione=="carnivoro"){
            $alimentazionecarnivora = "checked";
        }
        if($tipologiaalimentazione=="onnivoro"){
            $alimentazioneonnivora = "checked";                
        }
        if($tipologiaalimentazione=="erbivoro"){
            $alimentazioneerbivora = "checked";                
        }

        $echoString ='
		
		<div class="parallax padding-6 form-image">
		
            <header id="header-form" class="content card white wrap-padding">			
                    <div id="title-card" class="card">
                        <h1> Aggiungi un dinosauro </h1>
                    </div>
            </header>
            <div id="content-form" class="content">';            
            include_once (__DIR__."/../breadcrumb.php");
            $echoString .= breadcrumbAdmin();
            if($error != ""){
                $echoString .= messageErrorForm($error);
            }
            $echoString .='
                <form action="'.$url.'?id=dino&sez=add" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(this)" class="card colored wrap-padding">
                    <p>I campi obbligatori sono contrassegnati con <abbr title="richiesto">*</abbr></p>
                    <fieldset>
                        <legend>Nome, dimensioni ed epoca</legend>
                        <p>
                            <label for="nome">Nome: <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il nome del dinosauro" id="nome" name="nome" data-validation-mode="nomi" value="'.$nome.'" required>
                        </p>
                        
                        <p>
                            <label for="peso">Peso in Kg: <abbr title="richiesto">*</abbr></label>
                            <input type="number" placeholder="Inserisci il suo peso" id="peso" name="peso" data-validation-mode="unsigned" value="'.$peso.'" required>
                        </p>
        
                        <p>
                            <label for="altezza">Altezza in cm: <abbr title="richiesto">*</abbr></label>
                            <input type="number" placeholder="Inserisci la sua altezza" id="altezza" name="altezza" data-validation-mode="unsigned" value="'.$altezza.'" required>
                        </p>
                        
                        <p>
                            <label for="lunghezza">Lunghezza in cm: <abbr title="richiesto">*</abbr></label>
                            <input type="number" placeholder="Inserisci la sua lunghezza " id="lunghezza" name="lunghezza" data-validation-mode="unsigned" value="'.$lunghezza.'" required>
                        </p>
                        
                        <p>
                            <label for="periodomin">Periodo minimo in milioni di anni (da che periodo visse): <abbr title="richiesto">*</abbr></label>
                            <input type="number" placeholder="Inserisci il periodo minimo di appartenenza" id="periodomin" name="periodomin" data-validation-mode="periodomin" value="'.$periodomin.'" required>
                        </p>
                        
                        <p>
                            <label for="periodomax">Periodo massimo in milioni di anni: <abbr title="richiesto">*</abbr></label>
                            <input type="number" placeholder="Inserisci il periodo massimo di appartenenza" id="periodomax" name="periodomax" data-validation-mode="periodomax" value="'.$periodomax.'" required>
                        </p>
                        
                    </fieldset>
                    <fieldset>
                        <legend>Alimentazione e habitat</legend>
                        
                        <p>Inserisci la categoria a cui appartiene: <abbr title="richiesto">*</abbr></p>
                        <p class="center">
                            <label for="tipologiaalimentazione1">Carnivoro:</label>
                            <input type="radio" id="tipologiaalimentazione1" name="tipologiaalimentazione" value="carnivoro" '.$alimentazionecarnivora.' required>
                        
                            <label for="tipologiaalimentazione2">Onnivoro:</label>
                            <input type="radio" id="tipologiaalimentazione2" name="tipologiaalimentazione" value="onnivoro" '.$alimentazioneonnivora.' required>
                        
                            <label for="tipologiaalimentazione3">Erbivoro:</label>
                            <input type="radio" id="tipologiaalimentazione3" name="tipologiaalimentazione" value="erbivoro" '.$alimentazioneerbivora.' required>
                        </p>
                        
                        <p>
                            <label for="alimentazione">Di cosa si nutriva? <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci la sua dieta" id="alimentazione" name="alimentazione" data-validation-mode="alpha" value="'.$alimentazione.'" required>
                        </p>
                        
                        <p>
                            <label for="habitat">Habitat: <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il habitat" id="habitat" name="habitat" data-validation-mode="alpha" value="'.$habitat.'" required>
                        </p>
                                               
                    </fieldset>                   
                                            
                          
                    <fieldset>
                        <legend>Corpo dell\'articolo</legend>
                         <p>
                            <label for="descrizionebreve">Descrizione breve: <abbr title="richiesto">*</abbr></label>
                            <textarea type="text" placeholder="Inserisci una breve descrizione " id="descrizionebreve" name="descrizionebreve" required>'.$descrizionebreve.'</textarea>
                        </p>
                        
                        
                        <p>
                            <label for="descrizione">Descrizione: <abbr title="richiesto">*</abbr></label>
                            <textarea type="text" placeholder="Inserisci la descrizione completa " id="descrizione" name="descrizione" required>'.$descrizione.'</textarea>
                        </p>
                        
                        <p>
                            <label for="curiosita">Curiosità:</label>
                            <textarea type="text" placeholder="Inserisci delle curiosità " id="curiosita" name="curiosita">'.$curiosita.'</textarea>  
                        </p>       
               
                        <p>
                            <label for="imgdinosaur">'.messageDinoFormLabelImage().' <abbr title="richiesto">*</abbr></label>
                            <input type="file" id="imgdinosaur" name="imgdinosaur" data-validation-mode="image" value="" required>
                        </p>
                    </fieldset>                    
                    <input type="submit" value="AGGIUNGI" title="Avvia l\'operazione" class="card btn wide text-colored white"/>
                </form>
            </div>
            
        </div>
        ';
        return $echoString;

    }

    
    public static function addDinosaur($connect, $idautore, $nome, $peso, $altezza, $lunghezza, $periodomin, $periodomax, $habitat, $alimentazione, $tipologiaalimentazione, $descrizionebreve, $descrizione, $curiosita, $immagine, $basePathImg){
        
        $returnArray[0] = 0;   
        $returnArray[1] = array();

        //Inizio Controlli campi
        $error = checkRequireArray(array($nome, $peso, $altezza, $lunghezza, $descrizionebreve, $descrizione, $periodomin, $periodomax, $habitat, $alimentazione, $tipologiaalimentazione, $immagine));
        if($error[0] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorRequire());
        }

        if(checkNameDinoAvailable($connect, $nome) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorDinoNameAvailable());
        }
        
        if(checkName($nome) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorDinoNome());
        }

        $error = checkPeriodoDino($periodomin, $periodomax);
        if( $error[3] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPeriodoMin());
        }
        if( $error[4] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPeriodoMax());
        }
        if( $error[5] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPeriodoMinMax());
        }
        
        if(checkPositiveInteger($peso) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPosInteger("peso"));
        }

        if(checkPositiveInteger($altezza) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPosInteger("altezza"));
        }

        if(checkPositiveInteger($lunghezza) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPosInteger("lunghezza"));
        }
        
        if(checkAlpha($alimentazione) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorAlpha("alimentazione"));
        }

        if(checkAlpha($habitat) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorAlpha("habitat"));
        }
           
        $error = checkImageContent($immagine,"");
        if($error[2] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorImage($error[4]));
        }

        if(!isset($tipologiaalimentazione)){ 
            $tipologiaalimentazione = "";
        }

        if(!isset($curiosita)){ 
            $curiosita = "";
        }

        //Fine Controlli campi
                    
        if($returnArray[0] == 1)    //Ritorna se sono presenti errori nei campi
            return $returnArray;

        $destinazioneFileDB = NULL;
        if($immagine['error'] == 0){
            $destinazioneFileDB = loadImage("dinosaurimg", $nome, $immagine, 650, 450);
        }
        $sqlQuery = "INSERT INTO dinosauro (
            nome, peso, altezza, lunghezza, periodomin, periodomax, habitat, alimentazione, tipologiaalimentazione, descrizionebreve, descrizione, curiosita, datains, idautore, immagine)
            VALUES ('".$nome."', '".$peso."', '".$altezza."', '".$lunghezza."', '".$periodomin."', '".$periodomax."', '".$habitat."', '".$alimentazione."', '".$tipologiaalimentazione."', '".htmlentities($descrizionebreve, ENT_QUOTES)."', '".htmlentities($descrizione, ENT_QUOTES)."', '".htmlentities($curiosita, ENT_QUOTES)."', '".date('Y-m-j')."', '".$idautore."', ";
        if( $destinazioneFileDB != NULL)
            $sqlQuery .= "'".$destinazioneFileDB."'";
        else{
            $sqlQuery .= "NULL";
        }
        $sqlQuery .=") ";
        if( $connect->query($sqlQuery) ){
            $returnArray[2] = messageAddConfirm();
        } 
        else {
            $returnArray[0] = 1;
            $returnArray[3] = messageErrorAdd();
            if( $destinazioneFileDB != NULL){                         
                delImage($basePathImg.$destinazioneFileDB);
            }
        }
    
        return $returnArray;
    }
    public static function formUpdateDinosaur($connect, $url, $id, $peso = "", $altezza = "", $lunghezza = "", $periodomin = "", $periodomax = "", $habitat = "", $alimentazione = "", $tipologiaalimentazione = "", $descrizionebreve = "", $descrizione = "", $curiosita = "", $error = ""){
        
        $echoString ="";

        if(!isset($peso)){ $peso = ""; }
        if(!isset($altezza)){ $altezza = ""; }
        if(!isset($lunghezza)){ $lunghezza = ""; }
        if(!isset($periodomin)){ $periodomin = ""; }
        if(!isset($periodomax)){ $periodomax = ""; }
        if(!isset($habitat)){ $habitat = ""; }
        if(!isset($alimentazione)){ $alimentazione = ""; }
        if(!isset($tipologiaalimentazione) || $tipologiaalimentazione==""){ $tipologiaalimentazione = "carnivoro"; }
        if(!isset($descrizionebreve)){ $descrizionebreve = ""; }
        if(!isset($descrizione)){ $descrizione = ""; }
        if(!isset($curiosita)){ $curiosita = ""; }
        if(!isset($error)){ $error = ""; }

        if( $error == ""){
            $sqlQuery = "SELECT * FROM dinosauro WHERE nome = '".$id."' ";
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $peso = $row["peso"];
                $altezza = $row["altezza"];
                $lunghezza = $row["lunghezza"];
                $periodomin = $row["periodomin"];
                $periodomax = $row["periodomax"];
                $habitat = $row["habitat"];
                $alimentazione = $row["alimentazione"];
                $tipologiaalimentazione = $row["tipologiaalimentazione"];
                $descrizionebreve = $row["descrizionebreve"];
                $descrizione = $row["descrizione"];
                $curiosita = $row["curiosita"];
            }
        }

        $alimentazionecarnivora = "";
        $alimentazioneonnivora = "";
        $alimentazioneerbivora = "";
        if($tipologiaalimentazione=="carnivoro"){
            $alimentazionecarnivora = "checked";
        }
        if($tipologiaalimentazione=="onnivoro"){
            $alimentazioneonnivora = "checked";                
        }
        if($tipologiaalimentazione=="erbivoro"){
            $alimentazioneerbivora = "checked";                
        }

            
        $echoString ='
        
        <div class="parallax padding-6 form-image">
        
            <header id="header-form" class="content card white wrap-padding">			
                <div id="title-card" class="card">
                    <h1> Modifica il dinosauro </h1>
                </div>
            </header>
            
            <div id="content-form" class="content">';            
            include_once (__DIR__."/../breadcrumb.php");
            $echoString .= breadcrumbAdmin();
            if($error != ""){
                $echoString .= messageErrorForm($error);
            }
            $echoString .='
                <form action="'.$url.'?id=dino&sez=update" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(this)" class="card colored wrap-padding">
                    <p>I campi obbligatori sono contrassegnati con <abbr title="richiesto">*</abbr></p>
                    <fieldset>
                        <legend>Nome, dimensioni ed epoca</legend>
                        <p>
                            <label for="nome">Nome (non modificabile)</label>
                            <input type="text" placeholder="Inserisci il nome del dinosauro" id="nome" name="nome" value="'.$id.'" readonly>
                        </p>
                        
                        <p>
                            <label for="peso">Peso in kg: <abbr title="richiesto">*</abbr></label>
                            <input type="number" placeholder="Inserisci il suo peso" id="peso" name="peso" data-validation-mode="unsigned" value="'.$peso.'" required>
                        </p>

                        <p>
                            <label for="altezza">Altezza in cm: <abbr title="richiesto">*</abbr></label>
                            <input type="number" placeholder="Inserisci la sua altezza" id="altezza" name="altezza" data-validation-mode="unsigned" value="'.$altezza.'" required>
                        </p>
                        
                        <p>
                            <label for="lunghezza">Lunghezza in cm: <abbr title="richiesto">*</abbr></label>
                            <input type="number" placeholder="Inserisci la sua lunghezza" id="lunghezza" name="lunghezza" data-validation-mode="unsigned" value="'.$lunghezza.'" required>
                        </p>
                                                    
                        <p>
                            <label for="periodomin">Periodo minimo in milioni di anni: <abbr title="richiesto">*</abbr></label>
                            <input type="number" placeholder="Inserisci il periodo minimo di appartenenza" id="periodomin" name="periodomin" data-validation-mode="periodomin" value="'.$periodomin.'" required>
                        </p>
                        
                        <p>
                            <label for="periodomax">Periodo massimo in milioni di anni: <abbr title="richiesto">*</abbr></label>
                            <input type="number" placeholder="Inserisci il periodo massimo di appartenenza" id="periodomax" name="periodomax" data-validation-mode="periodomax" value="'.$periodomax.'" required>
                        </p>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Alimentazione e habitat</legend>
                        
                        <p>Seleziona la categoria a cui appartiene: <abbr title="richiesto">*</abbr></p> 
                        <p class="center">
                            <label for="tipologiaalimentazione1">Carnivoro</label>
                            <input type="radio" id="tipologiaalimentazione1" name="tipologiaalimentazione" value="carnivoro" '.$alimentazionecarnivora.' required>
                        
                            <label for="tipologiaalimentazione2">Onnivoro</label>
                            <input type="radio" id="tipologiaalimentazione2" name="tipologiaalimentazione" value="onnivoro" '.$alimentazioneonnivora.' required>
                    
                            <label for="tipologiaalimentazione3">Erbivoro</label>
                            <input type="radio" id="tipologiaalimentazione3" name="tipologiaalimentazione" value="erbivoro" '.$alimentazioneerbivora.' required>
                        </p>
                        
                        <p>
                            <label for="alimentazione">Di cosa si nutriva? <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci la sua dieta" id="alimentazione" name="alimentazione" data-validation-mode="alpha" value="'.$alimentazione.'" required>
                        </p>
                        
                        <p>
                            <label for="habitat">Habitat: <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il suo habitat" id="habitat" name="habitat" data-validation-mode="alpha" value="'.$habitat.'" required>
                        </p>
                            
                    </fieldset>
                    
                    <fieldset>
                        <legend>Corpo dell\'articolo</legend>
                    
                        <p>
                            <label for="descrizionebreve">Descrizione breve: <abbr title="richiesto">*</abbr></label>
                            <textarea type="text" placeholder="Inserisci una breve descrizione" id="descrizionebreve" name="descrizionebreve" required> '.html_entity_decode($descrizionebreve).'</textarea>
                        </p>
                        
                        <p>
                            <label for="descrizione">Descrizione: <abbr title="richiesto">*</abbr></label>
                            <textarea type="text" placeholder="Inserisci la descrizione completa" id="descrizione" name="descrizione" required> '.html_entity_decode($descrizione).'</textarea>
                        </p>
                        
                        <p>
                            <label for="curiosita">Curiosità:</label>
                            <textarea type="text" placeholder="Inserisci delle curiosità" id="curiosita" name="curiosita"> '.html_entity_decode($curiosita).'</textarea>
                        </p>
                        
                        <p>
                            <label for="imgdinosaur">'.messageDinoFormLabelImage().' <abbr title="richiesto">*</abbr></label>
                            <input type="file" id="imgdinosaur" name="imgdinosaur" data-validation-mode="image" value=""  required>
                        </p>
            
                        <p>
                            <label for="imgdinosaurremove">Rimozione immagine (non verrà caricata nessuna immagine e l\'immagine attuale verrà rimossa)</label>
                            <input type="checkbox" id="imgdinosaurremove" name="imgdinosaurremove" value="true">
                        </p>
                    </fieldset>

                    <input type="submit" value="MODIFICA" title="Avvia l\'operazione" class="card btn wide text-colored white">
                </form>
            </div>
        </div>
        <script type="text/javascript">disableInputImmagine();</script>
        ';
        
        
        return $echoString;

    }

    public static function updateDinosaur($connect, $nome, $peso, $altezza, $lunghezza, $periodomin, $periodomax, $habitat, $alimentazione, $tipologiaalimentazione, $descrizionebreve, $descrizione, $curiosita, $immagine, $removeImage, $basePathImg){
    
        
        $returnArray[0] = 0;   
        $returnArray[1] = array();

        //Inizio Controlli campi
        $error = checkRequireArray(array($nome, $peso, $altezza, $lunghezza, $descrizionebreve, $descrizione, $periodomin, $periodomax, $habitat, $alimentazione, $tipologiaalimentazione, $immagine));
        if($error[0] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorRequire());
        }
        
        if(checkName($nome) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorDinoNome());
        }

        $error = checkPeriodoDino($periodomin, $periodomax);
        if( $error[3] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPeriodoMin());
        }
        if( $error[4] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPeriodoMax());
        }
        if( $error[5] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPeriodoMinMax());
        }
        
        if(checkPositiveInteger($peso) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPosInteger("peso"));
        }

        if(checkPositiveInteger($altezza) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPosInteger("altezza"));
        }

        if(checkPositiveInteger($lunghezza) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPosInteger("lunghezza"));
        }
        
        if(checkAlpha($alimentazione) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorAlpha("alimentazione"));
        }

        if(checkAlpha($habitat) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorAlpha("habitat"));
        }
           
        $error = checkImageContent($immagine,"");
        if($error[2] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorImage($error[4]));
        }

        if(!isset($tipologiaalimentazione)){ 
            $tipologiaalimentazione = "";
        }

        if(!isset($curiosita)){ 
            $curiosita = "";
        }

        //Fine Controlli campi
                    
        if($returnArray[0] == 1)    //Ritorna se sono presenti errori nei campi
            return $returnArray;



        if($removeImage){  
            $sqlQuery = "SELECT immagine FROM dinosauro WHERE nome = '".$nome."' ";
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {         
                if($row["immagine"]!="" && $row["immagine"]!=NULL){
                    delImage($basePathImg.$row["immagine"]);
                }
            }
        }

        $destinazioneFileDB = NULL;
        if(!$removeImage && $immagine['error'] == 0){
            $destinazioneFileDB = loadImage("dinosaurimg", $nome, $immagine, 650, 450);
        }

        $sqlQuery = "UPDATE dinosauro SET peso='".$peso."', altezza='".$altezza."', lunghezza='".$lunghezza."', 
        periodomin='".$periodomin."', periodomax='".$periodomax."', habitat='".$habitat."', alimentazione='".$alimentazione."', tipologiaalimentazione='".$tipologiaalimentazione."', descrizionebreve='".htmlentities($descrizionebreve, ENT_QUOTES)."',
        descrizione='".htmlentities($descrizione, ENT_QUOTES)."', curiosita='".htmlentities($curiosita, ENT_QUOTES)."'";
        if( $destinazioneFileDB != NULL){
            $sqlQuery .= ", immagine='". $destinazioneFileDB."'";
        }
        if($removeImage){
            $sqlQuery .= ", immagine=NULL ";
        }
        $sqlQuery .= "WHERE nome='".$nome."'";

            
        if( $connect->query($sqlQuery) ){    
            $returnArray[2] = messageUpdateConfirm();
        } 
        else {   
            $returnArray[0] = 1;
            $returnArray[3] = messageErrorUpdate();
        }
        
        return $returnArray;
      
    }
    public static function getDinosaurDay($connect, $basePathImg, $pathLink){
        
        $echoString ="";
        
        $sqlQuery = "SELECT nome, data FROM dinosaurodelgiorno ORDER BY data DESC LIMIT 1";
        $result = $connect->query($sqlQuery);
        
        $id = "";
        $data = "";
        if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {
            $id = $row['nome']; 
            $data = $row['data'];
        }

        
        if($result->num_rows == 0 || $data != date('Y-m-d')){
            $sqlQuery2 = "SELECT nome FROM dinosauro WHERE nome != '$id' ORDER BY rand() LIMIT 1";
            $result2 = $connect->query($sqlQuery2);
            if ($result2->num_rows > 0 && $row2 = $result2->fetch_assoc()) {
                $id = $row2['nome'];
                $sqlQuery3 = "INSERT INTO dinosaurodelgiorno  (nome,data) values ('$id', '".date('Y-m-d')."') ";
                if( !$connect->query($sqlQuery3) ){
                    $echoString = messageReload(messageErrorUpdateSettings());     
                } 
            }
            else{
                $echoString = messageReload(messageErrorNoDino());  
            }
            
        }
        if($echoString == ""){
            
            $sqlQuery4 = "SELECT * FROM dinosauro WHERE nome = '$id'"; 
            $result4 = $connect->query($sqlQuery4);
            
            if ($result4->num_rows > 0 && $row4 = $result4->fetch_assoc()) {
                $echoString = '
                    <div  class="daily card margin-half">
                        <div class="padding-large colored">
                            <h1> '.$row4["nome"].' </h1>
                        </div>
                        ';
                        if(isset($row4["immagine"])){
                            $echoString .=' 
								<div class="daily-wrapper">
									<img src="'.$basePathImg.$row4["immagine"].'" alt="'.$row4["nome"].'"/>
								</div>';
                        }
                        $echoString .='
                        <div class="padding-large">
                            <ul>
                                <li><strong>Alimentazione:</strong> '.$row4["tipologiaalimentazione"].'</li>
                                <li><strong>Habitat:</strong>'.$row4["habitat"].'</li>
                                <li><strong>Peso:</strong> '.$row4["peso"].'</li>
                            </ul>
                            <p>
                            '.html_entity_decode($row4["descrizionebreve"]).'
                            </p>
                        </div>
                        <div class="center padding-2">
                            <a href="'.$pathLink.'nome='.urlencode($row4["nome"]).'" title="Le la scheda su '.$row4["nome"].'" class="btn"> Visualizza la scheda del dinosauro </a>
                        </div>
                    </div>             
                ';
            }
            else{
                $echoString = messageReload(messageErrorNoDino()); 
            }
        }

        return $echoString;
    }

    public static function getComment($connect, $idDino, $basePathImg){
        $echoString ="";
        
        $sqlQuery = "SELECT nome, cognome, commento, immagine FROM commentodinosauro INNER JOIN utente ON commentodinosauro.idutente=utente.email WHERE iddinosauro=\"$idDino\"";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $echoString .= '
                    <div class="comment">
                        <p>
                        ';
                        if($row["immagine"]!=NULL && $row["immagine"]!=""){
                            $echoString .= ' <img class="profile-pic-comment" src="'.$basePathImg.$row["immagine"].'" alt="Profilo di '.$row["nome"].' '.$row["cognome"].'"/> ';
                        }
                        
                        $echoString .= $row["nome"].' '.$row["cognome"].'
                        </p>
                        <p class="card wrap-padding-small">
                            '.$row["commento"].'
                        </p>
                    </div>';
            }
        }
        else{
            $echoString = "Non sono presenti commenti";
        }
        return $echoString;
    }

    public static function getCommentToDelete($connect, $idDino, $url, $basePathImg){
        $echoString ='
        <div id="commentboard" class="content panel">
            <div class="wrap-padding card">            
                <div class="padding-large colored">
                    <h1>Commenti</h1>
                </div>';
        
        $sqlQuery = "SELECT id, nome, cognome, commento, immagine FROM commentodinosauro INNER JOIN utente ON commentodinosauro.idutente=utente.email WHERE iddinosauro=\"$idDino\"";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $echoString .= '
                    <div class="comment">
                        <p>
                        ';
                        if($row["immagine"]!=NULL && $row["immagine"]!=""){
                            $echoString .= ' <img class="profile-pic-comment" src="'.$basePathImg.$row["immagine"].'" alt="Profilo di '.$row["nome"].' '.$row["cognome"].'"/> ';
                        }
                        
                        $echoString .= $row["nome"].' '.$row["cognome"].'
                        </p>
                        <p class="card wrap-padding-small">
                            '.$row["commento"].'
                        </p>
                        <a href="'.$url.'idcommento='.$row["id"].'" title="Elimina il commento di '.$row["nome"].' '.$row["cognome"].'" class="btn card wrap-margin" onclick="return confirm(\'Sei Sicuro di voler eliminare il commento?\')">Elimina</a>
            
                    </div>';
            }      
        }
        else{
            $echoString = message(messageErrorNoComments()); 
        }
              
        $echoString .= '
            </div>
        </div>';
        return $echoString;
    }

    public static function addComment($connect, $idDino, $idUser, $text){
        $sqlQuery = "INSERT INTO commentodinosauro (idutente, iddinosauro, commento) VALUES ('".$idUser."', '".$idDino."', '".$text."')";
        if( $connect->query($sqlQuery) ){
            $echoString = message(messageAddConfirm()); 
        } 
        else {
            $echoString = message(messageErrorAdd()); 
        }
        return $echoString;
    }
     
    public static function deleteComment($connect, $idComment){        
        $sqlQuery = "DELETE FROM commentodinosauro WHERE id = '".$idComment."' ";
        if( $connect->query($sqlQuery) ){
            $echoString = message(messageDeleteConfirm()); 
        } 
        else {
            $echoString = message(messageErrorDelete()); 
        }
        return $echoString;
    }
}
?>