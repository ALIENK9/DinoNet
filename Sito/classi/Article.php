<?php

include_once (__DIR__."/../loadFile.php");
include_once (__DIR__ . "/../message.php");
include_once (__DIR__."/../validate.php");
    
class Article{

    public static function printListArticle($connect, $filter, $basePathImg, $pathUpdate, $pathDelete, $pathComment){
        $sqlQuery = "SELECT count(id) as ntot FROM articolo";
		$result = $connect->query($sqlQuery);
        $row = $result->fetch_assoc();
        
        return Article::printListArticleLimit($connect, $filter, 0, $row["ntot"], $basePathImg, $pathUpdate, $pathDelete, $pathComment);
    }

    public static function printListArticleLimit($connect, $filter, $startNumView, $numView, $basePathImg, $pathUpdate, $pathDelete, $pathComment){
        $echoString="";
        $sqlFilter = "";

		if(isset($filter)){
			$words = explode(" ",$filter);
			$sqlFilter="WHERE ";
			foreach($words as $value){
				$sqlFilter .= "id LIKE '%".$value."%' OR titolo LIKE '%".$value."%' OR sottotitolo LIKE '%".$value."%' OR descrizione LIKE '%".$value."%' OR descrizioneimg LIKE '%".$value."%' OR idautore LIKE '%".$value."%' ";
			}
		}
		
		$sqlFilter .= "ORDER BY id DESC, titolo, sottotitolo";
		$sqlQuery = "SELECT id, titolo, sottotitolo, immagine, descrizioneimg FROM articolo ".$sqlFilter." LIMIT ".$startNumView.", ".$numView;
		$result = $connect->query($sqlQuery);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
                $echoString .='
				<div class="third wrap-padding">
                    <div class="daily card">
                        <div class="padding-large colored">
                            <h1> '.$row["id"].' </h1>
                        </div>
                        ';
                        if(isset($row["immagine"])){
                            $echoString .='  
								<div class="daily-wrapper">
									<img src="'.$basePathImg.$row["immagine"].'" alt="'.$row["descrizioneimg"].'"/>
								</div>';
                        }
                        $echoString .='
                        <div class="center padding-2">
                            <p>
                                <strong>Titolo: </strong> '.$row["titolo"].'<br>';
                                
                        if($row["sottotitolo"]!="" && $row["sottotitolo"]!=NULL)
                            $echoString .='<strong>Sottotitolo: </strong> '.$row["sottotitolo"].'<br>';      

                        $echoString .=' </p>
                        </div>
                        <div class="center padding-2">                                
                            <a href="'.$pathUpdate.'article='.$row["id"].'" class="btn">Modifica</a>
                            <a href="'.$pathComment.'article='.$row["id"].'" class="btn">Commenti</a>
                            <a href="'.$pathDelete.'article='.$row["id"].'" class="btn" onclick="return confirm(\'Sei sicuro di voler eliminare l\\\'articolo?\')">Elimina</a>                               
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
        return $echoString;
    }

    public static function printListArticleUser($connect, $filter, $basePathImg, $pathLink, $orderByInsert = false){
        $sqlQuery = "SELECT count(id) as ntot FROM articolo";
		$result = $connect->query($sqlQuery);
        $row = $result->fetch_assoc();
        
        return Article::printListArticleUserLimit($connect, $filter, 0, $row["ntot"], $basePathImg, $pathLink, $orderByInsert);
    }

    public static function printListArticleUserLimit($connect, $filter, $startNumView, $numView, $basePathImg, $pathLink, $orderByInsert = false){
        $echoString="";
        $sqlFilter = "";

		if(isset($filter)){
			$words = explode(" ",$filter);
			$sqlFilter="WHERE ";
			foreach($words as $value){
				$sqlFilter .= "id LIKE '%".$value."%' OR titolo LIKE '%".$value."%' OR sottotitolo LIKE '%".$value."%' OR descrizione LIKE '%".$value."%' OR descrizioneimg LIKE '%".$value."%' OR idautore LIKE '%".$value."%' ";
			}
		}
		
        if($orderByInsert){                
            $sqlFilter .= "ORDER BY id DESC, titolo, sottotitolo";
        }
        else{
            $sqlFilter .= "ORDER BY id, titolo, sottotitolo";
        }
		$sqlQuery = "SELECT id, titolo, sottotitolo, immagine, descrizioneimg, anteprima FROM articolo ".$sqlFilter." LIMIT ".$startNumView.", ".$numView;
		$result = $connect->query($sqlQuery);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
                $echoString .='
				<div class="third wrap-padding">
                    <div class="daily card margin-half">
                        <div class="padding-large colored">
                            <h1> '.$row["titolo"].' </h1>
                        </div>
                        ';
                        if(isset($row["immagine"])){
                            $echoString .='  
								<div class="daily-wrapper">
									<img src="'.$basePathImg.$row["immagine"].'" alt="'.$row["descrizioneimg"].'"/>
								</div>';
                        }
                        $echoString .='
                        <div class="padding-large">';
                                                        
                        if($row["sottotitolo"]!="" && $row["sottotitolo"]!=NULL)
                            $echoString .='<h3 class="text-colored center"> '.$row["sottotitolo"].' </h3><br>';                            
                       
                        $echoString .='                           
                            <p>
                                '.$row["anteprima"].'
                            </p>
                        </div>
                        <div class="center padding-2">
                            <a href="'.$pathLink.'id='.$row["id"].'&titolo='.$row["titolo"].'" class="btn">Leggi l\'articolo</a>
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
        return $echoString;
    }

    public static function printArticle($connect, $id, $basePathImg){
        $echoString="";
        $sqlQuery = "SELECT sottotitolo, descrizione, anteprima, immagine, descrizioneimg FROM articolo WHERE id='$id'";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $echoString .='                
                    <div class="daily card">
                    ';
                    if($row["sottotitolo"]!="" && $row["sottotitolo"]!=NULL){
                        $echoString .='
                        <div class="padding-large colored">
                            <h1> '.$row["sottotitolo"].'</h1>
                        </div>';
                    }
                    if(isset($row["immagine"])){
                        $echoString .='
							<div class="daily-wrapper">
								<img src="'.$basePathImg.$row["immagine"].'" alt="'.$row["descrizioneimg"].'"/>
							</div>';
                    }
                    $echoString .='
                        <div class="wrap-padding article-content">
                            '.html_entity_decode($row["descrizione"]).'                            
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

    public static function deleteArticle($connect, $id, $basePathImg){   
        $echoString="";
        if(isset($id)){                    
            $sqlQuery = "SELECT immagine FROM articolo WHERE id = '".$id."' ";
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {  
                
                if($row["immagine"]!=NULL && $row["immagine"]!="" )
                    delImage($basePathImg.$row["immagine"]);  

                $sqlQuery = "DELETE FROM articolo WHERE id = '".$id."' ";
                if( $connect->query($sqlQuery) ){
                    $echoString = message(messageDeleteConfirm());
                } 
                else {
                    $echoString = messageTryAgain(messageErrorDelete());
                }
            }
            else{
                $echoString = message(messageErrorDelete());
            }
        }
        return $echoString;
    }             
    public static function formAddArticle($url, $titolo = "", $sottotitolo = "", $descrizione = "", $anteprima = "", $error = ""){
        if(!isset($titolo)){ $titolo = ""; }
        if(!isset($sottotitolo)){ $sottotitolo = ""; }
        if(!isset($descrizione)){ $descrizione = ""; }
        if(!isset($anteprima)){ $anteprima = ""; }
        if(!isset($error)){ $error = ""; }


        $echoString ='
		
		<div class="parallax padding-6 form-image">
			
            <header id="header-form" class="content card white wrap-padding">			
                <div id="title-card" class="card">
                    <h1> Aggiungi un articolo </h1>
                </div>
            </header>
            
            <div id="content-form" class="content">';            
            include_once (__DIR__."/../breadcrumb.php");
            $echoString .= breadcrumbAdmin();
            if($error != ""){
                $echoString .= messageErrorForm($error);
            }
            $echoString .='
                <form action="'.$url.'?id=article&sez=add" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(this)" class="card colored wrap-padding">
                    <p>I campi obbligatori sono contrassegnati con <abbr title="richiesto">*</abbr></p>
                    <p>
                        <label for="titolo">Titolo: <abbr title="richiesto">*</abbr></label>
                        <input type="text" placeholder="Inserisci il titolo dell\'articolo" id="titolo" name="titolo" value="'.$titolo.'" required>
                    </p>
                    
                    <p>
                        <label for="sottotitolo">Sottotitolo: <abbr title="richiesto">*</abbr></label>
                        <input type="text" placeholder="Inserisci il sottotitolo" id="sottotitolo" name="sottotitolo" value="'.$sottotitolo.'" required>
                    </p>
                    
                    <p>
                        <label for="descrizione">Testo dell\'articolo: <abbr title="richiesto">*</abbr></label>
                        <textarea type="text" placeholder="Inserisci il testo dell\'articolo" id="descrizione" name="descrizione" required>'.$descrizione.'</textarea>
                    </p>
                    
                    <p>
                        <label for="anteprima">Anteprima:</label>
                        <textarea type="text" placeholder="Inserisci il testo di anteprima dell\'articolo" id="anteprima" name="anteprima" >'.$anteprima.'</textarea>
                    </p>
                                            
                    <p>
                        <label for="descrizioneimg">'.messageArticleFormLabelImage().'</label>
                        <input type="text" placeholder="Se carichi un\'immagine scrivi cosa rappresenta" id="descrizioneimg" name="descrizioneimg" data-validation-mode="descrizioneimg" value="">
                    </p>
                    
                    <p>
                        <label for="imgarticle">Immagine (il file deve avere una dimensione di 450px per 450px e il formato deve essere png, jpg o jpeg):</label>
                        <input type="file" id="imgarticle" name="imgarticle" data-validation-mode="image" value="">
                    </p>
                                        
                    <input type="submit" value="AGGIUNGI" title="Avvia l\'operazione" class="card btn wide text-colored white">
                    
                </form>
            </div>
                    
        </div>
        ';
        return $echoString;
    }
    public static function addArticle($connect, $idautore, $titolo, $sottotitolo, $descrizione, $anteprima, $descrizioneimg, $immagine){

        $returnArray[0] = 0; 
        $returnArray[1] = array();  

        //Inizio Controlli campi
        $error = checkRequireArray(array($titolo, $descrizione));
        if($error[0] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorRequire());
        }
  
        $error = checkImageContent($immagine,$descrizioneimg);
        if($error[2] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorImage($error[4]));
        }
        if($error[3] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorDescImage());
        }

        if(!isset($sottotitolo)){ 
            $sottotitolo = "";
        }

        if(!isset($anteprima)){ 
            $anteprima = "";
        }

       //Fine Controlli campi
                    
        if($returnArray[0] == 1)    //Ritorna se sono presenti errori nei campi
            return $returnArray;

            
        $sqlQuery = "INSERT INTO articolo (titolo, sottotitolo, descrizione, anteprima, descrizioneimg, datains, idautore) VALUES ('".$titolo."', '".$sottotitolo."', '".htmlentities($descrizione, ENT_QUOTES)."', '".htmlentities($anteprima, ENT_QUOTES)."', '".$descrizioneimg."', '".date('Y-m-j')."', '".$idautore."') ";
        
        if( $connect->query($sqlQuery) ){            
            $destinazioneFileDB = NULL;
            if($immagine['error'] == 0){
                $idInserito = $connect->insert_id;
                $destinazioneFileDB = loadImage("articleimg", $idInserito, $immagine, 450, 450);
                
                $sqlQuery2 = "UPDATE articolo SET immagine='".$destinazioneFileDB."'WHERE id='".$idInserito."'";
                $connect->query($sqlQuery2);
            }
            $returnArray[2] = messageAddConfirm();
        } 
        else {
            $returnArray[0] = 1;
            $returnArray[3] = messageErrorAdd();
        }
        
        return $returnArray;
    }
    public static function formUpdateArticle($connect, $url, $id, $titolo = "", $sottotitolo = "", $descrizione = "", $anteprima = "", $error = ""){
        $echoString="";

        if(!isset($id)){ $id = ""; }
        if(!isset($titolo)){ $titolo = ""; }
        if(!isset($sottotitolo)){ $sottotitolo = ""; }
        if(!isset($descrizione)){ $descrizione = ""; }
        if(!isset($anteprima)){ $anteprima = ""; }
        if(!isset($descrizioneimg)){ $descrizioneimg = ""; }
        if(!isset($error)){ $error = ""; }

        if( $error == ""){
            $sqlQuery = "SELECT * FROM articolo WHERE id = '".$_GET['article']."' ";
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $titolo = $row["titolo"];
                $sottotitolo = $row["sottotitolo"];
                $descrizione = $row["descrizione"];
                $anteprima = $row["anteprima"];
                $descrizioneimg = $row["descrizioneimg"];
            }
        }

        
            $echoString ='
			
			<div class="parallax padding-6 form-image">
			
                <header id="header-form" class="content card white wrap-padding">			
                    <div id="title-card" class="card">
                        <h1> Modifica l\'articolo </h1>
                    </div>
                </header>
                <div id="content-form" class="content">
                    ';            
                    include_once (__DIR__."/../breadcrumb.php");
                    $echoString .= breadcrumbAdmin();
                    if($error != ""){
                        $echoString .= messageErrorForm($error);
                    }
                    $echoString .='
                    <form action="'.$url.'?id=article&sez=update" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(this)" class="card colored wrap-padding">
                        <p>I campi obbligatori sono contrassegnati con <abbr title="richiesto">*</abbr></p>
                        <p>
                            <label for="article">Identificativo articolo (non modificabile)</label>
                            <input type="number" id="article" name="article" value="'.$id.'" readonly>
                        </p>
                        
                        <p>
                            <label for="titolo">Titolo: <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il titolo dell\'articolo" id="titolo" name="titolo" value="'.$titolo.'" required>
                        </p>
                        
                        <p>
                            <label for="sottotitolo">Sottotitolo: <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il sottotitolo" id="sottotitolo" name="sottotitolo" value="'.$sottotitolo.'" required>
                        </p>
                        
                        <p>
                            <label for="descrizione">Testo dell\'articolo:  <abbr title="richiesto">*</abbr></label>
                            <textarea type="text" placeholder="Inserisci il testo dell\'articolo" id="descrizione" name="descrizione" required>'.$descrizione.'</textarea>
                        </p>
                        
                        <p>
                            <label for="anteprima">Anteprima:</label>
                            <textarea type="text" placeholder="Inserisci il testo di anteprima dell\'articolo" id="anteprima" name="anteprima" required>'.$anteprima.'</textarea>
                        </p>
                        
                        <p>
                            <label for="descrizioneimg">Descrizione alternativa dell\'immagine (per l\'attributo \'alt\'):</label>
                            <input type="text" placeholder="Se carichi un\'immagine scrivi cosa rappresenta" id="descrizioneimg" name="descrizioneimg" data-validation-mode="descrizioneimg" value="'.$descrizioneimg.'">
                        </p>
                        
                        <p>
                            <label for="imgarticle">'.messageArticleFormLabelImage().'</label>
                            <input type="file" id="imgarticle" name="imgarticle" data-validation-mode="image" value="">
                        </p>
            
                        <p>
                            <label for="imgarticleremove">Rimozione immagine (non verrà caricata nessuna immagine e l\'immagine attuale verrà rimossa)</label>
                            <input type="checkbox" id="imgarticleremove" name="imgarticleremove" value="true">
                        </p>
                        
                        <input type="submit" value="MODIFICA" title="Avvia la modifica" class="card btn wide text-colored white">
                    </form>
                </div>    
            </div>
            <script type="text/javascript">disableInputImmagine();</script>
        ';
        
        return $echoString;
    }

    public static function updateArticle($connect, $idarticolo, $titolo, $sottotitolo, $descrizione, $anteprima, $descrizioneimg, $immagine, $removeImage, $basePathImg){
        $returnArray[0] = 0;   
        $returnArray[1] = array();

        //Inizio Controlli campi
        $error = checkRequireArray(array($titolo, $descrizione));
        if($error[0] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorRequire());
        }
  
        $error = checkImageContent($immagine,$descrizioneimg);
        if($error[2] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorImage($error[4]));
        }
        if($error[3] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorDescImage());
        }

        if(!isset($sottotitolo)){ 
            $sottotitolo = "";
        }

        if(!isset($anteprima)){ 
            $anteprima = "";
        }

       //Fine Controlli campi
                    
        if($returnArray[0] == 1)    //Ritorna se sono presenti errori nei campi
            return $returnArray;

        if($removeImage){  
            $sqlQuery = "SELECT immagine FROM articolo WHERE id = '".$idarticolo."' ";
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {         
                if($row["immagine"]!="" && $row["immagine"]!=NULL){        
                    delImage($basePathImg.$row["immagine"]);
                }
            }
        }

        $destinazioneFileDB = NULL;
        if(!$removeImage && $immagine['error'] == 0){
            $destinazioneFileDB = loadImage("articleimg", $idarticolo, $immagine, 450, 450);
        }

        $sqlQuery = "UPDATE articolo SET titolo='".$titolo."', sottotitolo='".$sottotitolo."', descrizione='".htmlentities($descrizione, ENT_QUOTES)."', anteprima='".htmlentities($anteprima, ENT_QUOTES)."', descrizioneimg='".$descrizioneimg."'";
        if( $destinazioneFileDB != NULL){
            $sqlQuery .= ", immagine='". $destinazioneFileDB."'";
        }
        if($removeImage){
            $sqlQuery .= ", immagine=NULL ";
        }
        $sqlQuery .= "WHERE id='".$idarticolo."'";

        if( $connect->query($sqlQuery) ){          
            $returnArray[2] = messageUpdateConfirm();
        } 
        else {    
            $returnArray[0] = 1;
            $returnArray[3] = messageErrorUpdate();
        }
        
        return $returnArray;
    }
    public static function getArticleDay($connect, $basePathImg, $pathLink){
        
        $echoString ="";
        
        $sqlQuery = "SELECT idarticolo, data FROM articolodelgiorno ORDER BY data DESC LIMIT 1";
        $result = $connect->query($sqlQuery);
        
        $id = "";
        $data = "";
        if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {
            $id = $row['idarticolo']; 
            $data = $row['data'];
        }

        if($result->num_rows == 0 || $data != date('Y-m-d')){
            $sqlQuery2 = "SELECT id FROM articolo WHERE id != '$id' ORDER BY rand() LIMIT 1";
            $result2 = $connect->query($sqlQuery2);
            if ($result2->num_rows > 0 && $row2 = $result2->fetch_assoc()) {
                $id = $row2['id'];
                $sqlQuery3 = "INSERT INTO articolodelgiorno  (idarticolo,data) values ('$id', '".date('Y-m-d')."') ";
                if( !$connect->query($sqlQuery3) ){    
                    $echoString = messageReload(messageErrorUpdateSettings()); 
                } 
            }
            else{
                $echoString = messageReload(messageErrorNoArticle()); 
            }
            
        }

        if($echoString == ""){
            
            $sqlQuery4 = "SELECT * FROM articolo WHERE id = '$id'"; 
            $result4 = $connect->query($sqlQuery4);
            
            if ($result4->num_rows > 0 && $row4 = $result4->fetch_assoc()) {
                $echoString = '
                    <div class="daily card margin-half">
                        <div class="padding-large colored">
                            <h1> '.$row4["titolo"].' </h1>
                        </div>
                        ';
                        if(isset($row4["immagine"])){
                            $echoString .=' 
								<div class="daily-wrapper">
									<img src="'.$basePathImg.$row4["immagine"].'" alt="'.$row4["descrizioneimg"].'"/>
								</div>
							';
                        }
                        $echoString .='
                        <div class="padding-large">
                            <h3 class="text-colored center"> '.$row4["sottotitolo"].' </h3>
                            <br>
                            <p>
                                '.$row4["anteprima"].'
                            </p>
                        </div>
                        <div class="center padding-2">
                            <a href="'.$pathLink.'id='.$row4["id"].'&titolo='.$row4["titolo"].'" class="btn">Leggi l\'articolo </a>
                        </div>
                    </div>       
                                   
                ';
            }
            else{
                $echoString = messageReload(messageErrorNoArticles()); 
            }
        }

        return $echoString;
    }
      
    public static function getComment($connect, $idArticle, $basePathImg){
        $echoString ="";
        
        $sqlQuery = "SELECT nome, cognome, commento, immagine FROM commentoarticolo INNER JOIN utente ON commentoarticolo.idutente=utente.email WHERE idarticolo=\"$idArticle\"";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $echoString .= '
                    <div class="comment">
                        <p>
                        ';
                        if($row["immagine"]!=NULL && $row["immagine"]!=""){
                            $echoString .= ' <img class="profile-pic-comment" src="'.$basePathImg.$row["immagine"].'" alt="Immagine profilo utente '.$row["nome"].' '.row["cognome"].'"/> ';
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

    public static function getCommentToDelete($connect, $idArticle, $url, $basePathImg){
        $echoString ='
        <div id="commentboard" class="content panel">
            <div class="wrap-padding card">          
                <div class="padding-large colored">
                    <h1>Commenti</h1>
                </div>';
        
        $sqlQuery = "SELECT id, nome, cognome, commento, immagine FROM commentoarticolo INNER JOIN utente ON commentoarticolo.idutente=utente.email WHERE idarticolo=\"$idArticle\"";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $echoString .= '
                    <div class="comment">
                        <p>
                        ';
                        if($row["immagine"]!=NULL && $row["immagine"]!=""){
                            $echoString .= ' <img class="profile-pic-comment" src="'.$basePathImg.$row["immagine"].'" alt="Immagine profilo utente '.$row["nome"].' '.row["cognome"].'"/> ';
                        }
                        
                        $echoString .= $row["nome"].' '.$row["cognome"].'
                        </p>
                        <p class="card wrap-padding-small">
                            '.$row["commento"].'
                        </p>
                        <a href="'.$url.'idcommento='.$row["id"].'" class="btn card wrap-margin" onclick="return confirm(\'Sei Sicuro di voler eliminare il commento?\')">Elimina</a>
            
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

    public static function addComment($connect, $idArticle, $idUser, $text){
        $sqlQuery = "INSERT INTO commentoarticolo (idutente, idarticolo, commento) VALUES ('".$idUser."', '".$idArticle."', '".$text."')";
        if( $connect->query($sqlQuery) ){
            $echoString = message(messageAddConfirm()); 
        } 
        else {
            $echoString = message(messageErrorAdd()); 
        }
        return $echoString;
    }

    public static function deleteComment($connect, $idComment){        
        $sqlQuery = "DELETE FROM commentoarticolo WHERE id = '".$idComment."' ";
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