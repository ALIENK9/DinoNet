<?php

include_once (__DIR__."/../loadFile.php");
    
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
		
		$sqlFilter .= "ORDER BY id, titolo, sottotitolo";
		$sqlQuery = "SELECT id, titolo, sottotitolo, immagine, descrizioneimg FROM articolo ".$sqlFilter." LIMIT ".$startNumView.", ".$numView;
		$result = $connect->query($sqlQuery);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
                $echoString .='
				<div class="third wrap-padding">
                    <div class="daily-dino card">
                        <div class="padding-large colored">
                            <h1> '.$row["id"].' </h1>
                        </div>
                        ';
                        if(isset($row["immagine"])){
                            $echoString .=' <img src="'.$basePathImg.$row["immagine"].'" alt="'.$row["descrizioneimg"].'"/>';
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
			$echoString = "
                <div class='padding-6 content center'>
                    <div class='card wrap-padding'>
                        <h1>Nessun risultato</h1>
                    </div>
                </div>							
            ";
		}
        return $echoString;
    }

    public static function printListArticleUser($connect, $filter, $basePathImg, $pathLink, $orderByInsert = false){
        $sqlQuery = "SELECT count(id) as ntot FROM articolo";
		$result = $connect->query($sqlQuery);
        $row = $result->fetch_assoc();
        
        return Article::printListArticleUserLimit($connect, $filter, 0, $row["ntot"], $basePathImg, $pathLink);
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
                    <div class="daily-article card margin-half">
                        <div class="padding-large colored">
                            <h1> '.$row["titolo"].' </h1>
                        </div>
                        ';
                        if(isset($row["immagine"])){
                            $echoString .=' <img src="'.$basePathImg.$row["immagine"].'" alt="'.$row["descrizioneimg"].'"/>';
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
			$echoString = "
                <div class='padding-6 content center'>
                    <div class='card wrap-padding'>
                        <h1>Nessun risultato</h1>
                    </div>
                </div>							
            ";
		}
        return $echoString;
    }

    public static function printArticle($connect, $id, $basePathImg){
        $echoString="";
        $sqlQuery = "SELECT sottotitolo, anteprima FROM articolo WHERE id='$id'";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $echoString .='
                    <div class="card">
                    ';
                    if($row["sottotitolo"]!="" && $row["sottotitolo"]!=NULL){
                        $echoString .='
                        <div class="padding-large colored">
                            <h1> '.$row["sottotitolo"].'</h1>
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
			$echoString = "
                <div class='padding-6 content center'>
                    <div class='card wrap-padding'>
                        <h1>Nessun risultato</h1>
                    </div>
                </div>							
            ";
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
                    $echoString = "
                        <div class='padding-6 content center'>
                            <div class='card wrap-padding'>
                                <h1>Elemento eliminato</h1>
                            </div>
                        </div>							
                    ";
                } 
                else {
                    $echoString = "
                        <div class='padding-6 content center'>
                            <div class='card wrap-padding'>
                                <h1>Elemento NON eliminato</h1>
                                <a href=\"#\" class='btn card wrap-margin'> Riprova </a>
                            </div>
                        </div>							
                    ";
                }
            }
            else{
                $echoString = "
                    <div class='padding-6 content center'>
                        <div class='card wrap-padding'>
                            <h1>Elemento NON eliminabile</h1>
                        </div>
                    </div>						
                ";
            }
        }
        return $echoString;
    }             
    public static function formAddArticle($url){
        $echoString ='
		
		<header id="header-home" class="parallax padding-6 header-image">
			<div class="content">						
				<div class="card white wrap-padding">
					<h1>Aggiungi un articolo</h1>
				</div>
				<div class="card colored wrap-padding">
					<form action="'.$url.'?id=article&sez=add" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(this)">
						<p>
                            <label for="titolo">Titolo</label>
                            <input type="text" placeholder="Inserisci il titolo dell\'articolo" id="titolo" name="titolo" value="" required>
						</p>
						
						<p>
                            <label for="sottotitolo">Sottotitolo</label>
                            <input type="text" placeholder="Inserisci il sottotitolo" id="sottotitolo" name="sottotitolo" value="" required>
                        </p>
						
						<p>
						    <label for="descrizione">Descrizione</label>
                            <textarea type="text" placeholder="Inserisci il testo dell\'articolo" id="descrizione" name="descrizione" value="" required></textarea>
                        </p>
                        
						<p>
                            <label for="anteprima">Anteprima</label>
                            <textarea type="text" placeholder="Inserisci il testo di anteprima dell\'articolo" id="anteprima" name="anteprima" value=""></textarea>
						</p>
												
						<p>
                            <label for="descrizioneimg">Descrizione alternativa dell\'immagine (per l\'attributo \'alt\')</label>
                            <input type="text" placeholder="Se carichi un\'immagine scrivi cosa rappresenta" id="descrizioneimg" name="descrizioneimg" data-validation-mode="descrizioneimg" value="">
                        </p>
                        
                        <p>
                            <label for="imgarticle">Immagine</label>
                            <input type="file" id="imgarticle" name="imgarticle" data-validation-mode="immaginearticolo" value="">
                        </p>
                        					
						<input type="submit" value="AGGIUNGI" title="Avvia l\'operazione" class="card btn wide text-colored white">
					</form>
				</div>
			</div>
		</header>
        ';
        return $echoString;
    }
    public static function addArticle($connect, $idautore, $titolo, $sottotitolo, $descrizione, $anteprima, $descrizioneimg, $immagine){
        $echoString="";
        if(
            isset($titolo) && $titolo!="" &&
            isset($descrizione) && $descrizione!="" &&
            ($immagine['error'] != 0 || (isset($descrizioneimg) && $descrizioneimg!=""))
        ){
            
            if(!isset($sottotitolo)){ $sottotitolo = "";}
            if(!isset($anteprima)){ $anteprima = "";}
            if(!isset($descrizioneimg)){ $descrizioneimg = "";}
            
            $sqlQuery = "INSERT INTO articolo (titolo, sottotitolo, descrizione, anteprima, descrizioneimg, datains, idautore) VALUES ('".$titolo."', '".$sottotitolo."', '".htmlentities($descrizione, ENT_QUOTES)."', '".htmlentities($anteprima, ENT_QUOTES)."', '".$descrizioneimg."', '".date('Y-m-j')."', '".$idautore."') ";
            
            if( $connect->query($sqlQuery) ){
                $echoString = "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Elemento aggunto</h1>
						
				";
                $destinazioneFileDB = NULL;
                if($immagine['error'] == 0){
                    $idInserito = $connect->insert_id;
                    $destinazioneFileDB = loadImage("articleimg", $idInserito, $immagine);
                    
                    $sqlQuery2 = "UPDATE articolo SET immagine='".$destinazioneFileDB."'WHERE id='".$idInserito."'";
                    if($destinazioneFileDB != NULL && $connect->query($sqlQuery2) ){
                        $echoString .= "
						    <h2>Immagine caricata</h2>";
                    }
                    else{                        
                        $echoString .= "
                        <h2>Immagine non caricata</h2>";
                    }
                }
                $echoString .= "
                        <a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Aggiungine un altro </a>
                    </div>
                </div> ";
            } 
            else {
                $echoString = "
					<div class='padding-6 content'>
						<div class='card wrap-padding'>
							<h1>Elemento NON Aggiunto</h1>
							<a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Riprova </a>
						</div>
					</div>
				";
            }
        }
        else{
            $echoString = "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Errore campi</h1>
						<a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Riprova </a>
					</div>
				</div>
			";
        }
        return $echoString;
    }
    public static function formUpdateArticle($connect, $url, $id){
        $echoString="";
        $sqlQuery = "SELECT * FROM articolo WHERE id = '".$_GET['article']."' ";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $echoString ='
			
			<header id="header-home" class="parallax padding-6 header-image">
				<div class="content">						
					<div class="card white wrap-padding">
						<h1>Modifica un articolo</h1>
					</div>
					<div class="card colored wrap-padding">
						<form action="'.$url.'?id=article&sez=update" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(this)">
							<p>
                                <label for="article">Identificativo articolo</label>
                                <input type="number" id="article" name="article" value="'.$row["id"].'" readonly>
							</p>
							
							<p>
                                <label for="titolo">Titolo</label>
                                <input type="text" placeholder="Inserisci il titolo dell\'articolo" id="titolo" name="titolo" value="'.$row["titolo"].'" required>
							</p>
							
							<p>
                                <label for="sottotitolo">Sottotitolo</label>
                                <input type="text" placeholder="Inserisci il sottotitolo" id="sottotitolo" name="sottotitolo" value="'.$row["sottotitolo"].'" required>
							</p>
							
							<p>
                                <label for="descrizione">Descrizione</label>
                                <textarea type="text" placeholder="Inserisci il testo dell\'articolo" id="descrizione" name="descrizione" required>'.$row["descrizione"].'</textarea>
							</p>
                            
                            <p>
                                <label for="anteprima">Anteprima</label>
                                <textarea type="text" placeholder="Inserisci il testo di anteprima dell\'articolo" id="anteprima" name="anteprima" required>'.$row["anteprima"].'</textarea>
							</p>
							
							<p>
                                <label for="descrizioneimg">Descrizione alternativa dell\'immagine (per l\'attributo \'alt\')</label>
                                <input type="text" placeholder="Se carichi un\'immagine scrivi cosa rappresenta" id="descrizioneimg" name="descrizioneimg" data-validation-mode="descrizioneimg" value="'.$row["descrizioneimg"].'">
							</p>
							
                            <p>
                                <label for="imgarticle">Immagine</label>
                                <input type="file" id="imgarticle" name="imgarticle" data-validation-mode="immaginearticolo" value="">
                            </p>
                
                            <p>
                                <label for="imgarticleremove">Nessuna immagine</label>
                                <input type="checkbox" id="imgarticleremove" name="imgarticleremove" value="true">
                            </p>
							
							<input type="submit" value="MODIFICA" title="Avvia la modifica" class="card btn wide text-colored white">
						</form>
					</div>
				</div>
			</header>
                ';
            }
        
        else{
			$echoString = "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Articolo non presente</h1>
						<a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Indietro </a>
					</div>
				</div>							
			";
        }
        return $echoString;
    }

    public static function updateArticle($connect, $idarticolo, $titolo, $sottotitolo, $descrizione, $anteprima, $descrizioneimg, $immagine, $removeImage, $basePathImg){
        $echoString="";
        if(
            isset($titolo) && $titolo!="" &&
            isset($descrizione) && $descrizione!="" &&
            ($immagine['error'] != 0 || (isset($descrizioneimg) && $descrizioneimg!=""))
        ){
            if(!isset($sottotitolo)){ $sottotitolo = "";}
            if(!isset($anteprima)){ $anteprima = "";}
            if(!isset($descrizioneimg)){ $descrizioneimg = "";}

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
                $destinazioneFileDB = loadImage("articleimg", $idarticolo, $immagine);
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
				$echoString = "
					<div class='padding-6 content center'>
						<div class='card wrap-padding'>
							<h1>Elemento modificato!</h1>
						</div>
					</div>							
				";
            } 
            else {            
				$echoString = "
					<div class='padding-6 content center'>
						<div class='card wrap-padding'>
							<h1>Elemento non modificato</h1>
							<a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Riprova </a>
						</div>
					</div>							
				";
            }
        }
        else{         
			$echoString = "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Errore campi</h1>
						<a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Riprova </a>
					</div>
				</div>							
			";
        }
        return $echoString;
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
                    $echoString = "
                        <div class='padding-6 content center'>
                            <div class='card wrap-padding'>
                                <h1>Errore aggiornamento impostazioni</h1>
                                <a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Riprova </a>
                            </div>
                        </div>							
                    ";  
                } 
            }
            else{
                $echoString = "
                    <div class='padding-6 content center'>
                        <div class='card wrap-padding'>
                            <h1>Dinosauro non presente</h1>
                            <a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Indietro </a>
                        </div>
                    </div>							
                ";
            }
            
        }

        if($echoString == ""){
            
            $sqlQuery4 = "SELECT * FROM articolo WHERE id = '$id'"; 
            $result4 = $connect->query($sqlQuery4);
            
            if ($result4->num_rows > 0 && $row4 = $result4->fetch_assoc()) {
                $echoString = '
                    <div class="daily-article card margin-half">
                        <div class="padding-large colored">
                            <h1> '.$row4["titolo"].' </h1>
                        </div>
                        ';
                        if(isset($row4["immagine"])){
                            $echoString .=' <img src="'.$basePathImg.$row4["immagine"].'" alt="'.$row4["descrizioneimg"].'"/>';
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
                $echoString = "
                    <div class='padding-6 content center'>
                        <div class='card wrap-padding'>
                            <h1>Articoli non presenti</h1>
                            <a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Indietro </a>
                        </div>
                    </div>							
                ";
            }
        }

        return $echoString;
    }
      
    public static function getComment($connect, $idArticle){
        $echoString ="";
        
        $sqlQuery = "SELECT nome, cognome, commento FROM commentoarticolo INNER JOIN utente ON commentoarticolo.idutente=utente.email WHERE idarticolo=\"$idArticle\"";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $echoString .= '
                    <div class="comment">
                        <p>
                            '.$row["nome"].' '.$row["cognome"].'
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

    public static function getCommentToDelete($connect, $idArticle, $url){
        $echoString ='
        <div id="commentboard" class="content panel">
            <div class="card wrap-padding">            
                <div class="padding-large colored">
                    <h1>Commenti</h1>
                </div>';
        
        $sqlQuery = "SELECT id, nome, cognome, commento FROM commentoarticolo INNER JOIN utente ON commentoarticolo.idutente=utente.email WHERE idarticolo=\"$idArticle\"";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $echoString .= '
                    <div class="comment">
                        <p>
                            '.$row["nome"].' '.$row["cognome"].'
                        </p>
                        <p class="card wrap-padding-small">
                            '.$row["commento"].'
                        </p>
                        <a href="'.$url.'idcommento='.$row["id"].'" class="btn card wrap-margin" onclick="return confirm(\'Sei Sicuro di voler eliminare il commento?\')">Elimina</a>
            
                    </div>';
            } 
        }
        else{
            $echoString .= "Non sono presenti commenti";
        }
        $echoString .= '
            </div>
        </div>';
        return $echoString;
    }

    public static function addComment($connect, $idArticle, $idUser, $text){
        $sqlQuery = "INSERT INTO commentoarticolo (idutente, idarticolo, commento) VALUES ('".$idUser."', '".$idArticle."', '".$text."')";
        if( $connect->query($sqlQuery) ){
			$echoString = "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Elemento Aggiunto</h1>
					</div>
				</div>							
			";
        } 
        else {
			$echoString = "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Elemento NON Aggiunto</h1>
					</div>
				</div>							
			";
        }
        return $echoString;
    }

    public static function deleteComment($connect, $idComment){        
        $sqlQuery = "DELETE FROM commentoarticolo WHERE id = '".$idComment."' ";
        if( $connect->query($sqlQuery) ){
			$echoString = "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Elemento eliminato</h1>
					</div>
				</div>							
			";
        } 
        else {
			$echoString = "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Elemento NON eliminato</h1>
					</div>
				</div>							
			";
        }
        return $echoString;
    }

}

?>