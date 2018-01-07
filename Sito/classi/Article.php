<?php

include_once (__DIR__."/../loadFile.php");
    
class Article{

    public static function printListArticle($connect, $filter, $basePathImg, $pathUpdate, $pathDelete){
        $sqlQuery = "SELECT count(id) as ntot FROM articolo";
		$result = $connect->query($sqlQuery);
        $row = $result->fetch_assoc();
        
        return Article::printListArticleLimit($connect, $filter, 0, $row["ntot"], $basePathImg, $pathUpdate, $pathDelete);
    }

    public static function printListArticleLimit($connect, $filter, $startNumView, $numView, $basePathImg, $pathUpdate, $pathDelete){
        $echoString="";
        $sqlFilter = "";

		if(isset($filter)){
			$words = explode(" ",$filter);
			$sqlFilter="WHERE ";
			foreach($words as $value){
				$sqlFilter .= "id LIKE '%".$value."%' OR titolo LIKE '%".$value."%' OR sottotitolo LIKE '%".$value."%' OR descrizione LIKE '%".$value."%' OR eta LIKE '%".$value."%' OR descrizioneimg LIKE '%".$value."%' OR idautore LIKE '%".$value."%' ";
			}
		}
		
		$sqlFilter .= "ORDER BY id, titolo, sottotitolo, eta";
		$sqlQuery = "SELECT id, titolo, sottotitolo, eta, immagine, descrizioneimg FROM articolo ".$sqlFilter." LIMIT ".$startNumView.", ".$numView;
		$result = $connect->query($sqlQuery);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
                $echoString .='
				<div class="third wrap-padding">
                    <div id="" class="daily-dino card">
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
                                <strong>Titolo: </strong> '.$row["titolo"].'<br>
                                <strong>Sottotitolo: </strong> '.$row["sottotitolo"].'<br>
                                <strong>Età: </strong> '.$row["eta"].'
                            </p>
                        </div>
                        <div class="center padding-2">                                
                            <a href="'.$pathUpdate.'article='.$row["id"].'" class="btn colored"><p> Modifica</p></a>
                            <a href="'.$pathDelete.'article='.$row["id"].'" class="btn colored"><p> Elimina </p></a>                               
                        </div>
                    </div>
                </div>
                ';
			}
			$echoString = '<div class="row wrap-padding">'.$echoString.'</div>';
		} 
		else {
            $echoString = "0 risultati";
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
				$sqlFilter .= "id LIKE '%".$value."%' OR titolo LIKE '%".$value."%' OR sottotitolo LIKE '%".$value."%' OR descrizione LIKE '%".$value."%' OR eta LIKE '%".$value."%' OR descrizioneimg LIKE '%".$value."%' OR idautore LIKE '%".$value."%' ";
			}
		}
		
        if($orderByInsert){                
            $sqlFilter .= "ORDER BY id DESC, titolo, sottotitolo, eta";
        }
        else{
            $sqlFilter .= "ORDER BY id, titolo, sottotitolo, eta";
        }
		$sqlQuery = "SELECT id, titolo, sottotitolo, eta, immagine, descrizioneimg, anteprima FROM articolo ".$sqlFilter." LIMIT ".$startNumView.", ".$numView;
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
                        <div class="padding-large">
                            <h3 class="text-colored center"> '.$row["sottotitolo"].' </h3>
                            <br>
                            <p>
                                '.$row["anteprima"].'
                            </p>
                        </div>
                        <div class="center padding-2">
                            <a href="'.$pathLink.'id='.$row["id"].'&titolo='.$row["titolo"].'" class="btn colored"><p> Leggi l\'articolo </p></a>
                        </div>
                    </div>
                </div>
                ';
			}
			$echoString = '<div class="row wrap-padding">'.$echoString.'</div>';
		} 
		else {
            $echoString = "0 risultati";
		}
        return $echoString;
    }

    public static function printArticle($connect, $id, $basePathImg){
        $echoString="";
        $sqlQuery = "SELECT sottotitolo, descrizione FROM articolo WHERE id='$id'";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $echoString .='
                    <div class="card">
                        <div class="padding-large colored">
                            <h1> '.$row["sottotitolo"].'</h1>
                        </div>

                        <div class="wrap-padding article-content">
                            '.html_entity_decode($row["descrizione"]).'                            
                        </div>
                    </div>            
                ';
            }
        }
        else {
            $echoString = "0 risultati";
        }
        return $echoString; 
    }

    public static function deleteArticle($connect, $id){   
        $echoString="";
        if(isset($id)){                    
            $sqlQuery = "SELECT immagine FROM articolo WHERE id = '".$id."' ";
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {  
                
                if($row["immagine"]!=NULL && $row["immagine"]!="" )
                    delImage(__DIR__."/../".$row["immagine"]);  

                $sqlQuery = "DELETE FROM articolo WHERE id = '".$id."' ";
                if( $connect->query($sqlQuery) ){
                    $echoString = "Elemento eliminato";
                } 
                else {
                    $echoString = "Elemento NON eliminato";
                }
            }
            else{
                $echoString = "Elemento NON eliminabile";
            }
        }
        return $echoString;
    }             
    public static function formAddArticle($url){
        $echoString ='
		
		<header id="header-home" class="full-screen parallax">
			<div class="padding-12 content">						
				<div class="card white wrap-padding">
					<h1>Aggiungi un articolo</h1>
				</div>
				<div class="card colored wrap-padding">
					<form action="'.$url.'?id=article&sez=add" method="POST" enctype="multipart/form-data">
						<p><label for="titolo">Titolo:</label></p>
						<input type="text" id="titolo" name="titolo" value="">
						
						<p><label for="sottotitolo">Sottotitolo:</label></p>
						<input type="text" id="sottotitolo" name="sottotitolo" value="">
						
						<p><label for="descrizione">Descrizione:</label></p>
                        <textarea type="text" id="descrizione" name="descrizione" value=""></textarea>
                        
						<p><label for="anteprima">Anteprima:</label></p>
						<textarea type="text" id="anteprima" name="anteprima" value=""></textarea>
						
						<p><label for="eta">Età di riferimento (in milioni di anni):</label></p>
						<input type="number" id="eta" name="eta" value="">
						
						<p><label for="descrizioneimg">Descrizione della immagine:</label></p>
						<input type="text" id="descrizioneimg" name="descrizioneimg" value="">

                        <p><label for="imgarticle">Immagine:</label></p>
                        <input type="file" id="imgarticle" name="imgarticle" value="">

						<br>
						
						<input type="submit" value="AGGIUGI" title="Avvia l\'operazione" class="card btn wide text-colored white" />
					</form>
				</div>
			</div>
		</header>
        ';
        return $echoString;
    }
    public static function addArticle($connect, $idautore, $titolo, $sottotitolo, $descrizione, $anteprima, $eta, $descrizioneimg, $immagine){
        $echoString="";
        if(
            isset($titolo) &&
            isset($sottotitolo) &&
            isset($descrizione) &&
            isset($anteprima) &&
            isset($eta) &&
            isset($descrizioneimg) /*&&
            bisogna controllare che la data sia effettivamente una data
            */
        ){
            
            $sqlQuery = "INSERT INTO articolo (titolo, sottotitolo, descrizione, anteprima, eta, descrizioneimg, datains, idautore) VALUES ('".$titolo."', '".$sottotitolo."', '".htmlentities($descrizione, ENT_QUOTES)."', '".htmlentities($anteprima, ENT_QUOTES)."', '".$eta."', '".$descrizioneimg."', '".date('Y-m-j')."', '".$idautore."') ";
            
            if( $connect->query($sqlQuery) ){
                $echoString = "Elemento Aggiunto";
                $destinazioneFileDB = NULL;
                if($immagine['error'] == 0){
                    $idInserito = $connect->insert_id;
                    $destinazioneFileDB = loadImage("articleimg", $idInserito, $immagine);
                    
                    $sqlQuery2 = "UPDATE articolo SET immagine='".$destinazioneFileDB."'WHERE id='".$idInserito."'";
                    if($destinazioneFileDB != NULL && $connect->query($sqlQuery2) ){
                        $echoString .= "<br> Immagine caricata";
                    }
                    else{                        
                        $echoString .= "<br> Immagine non caricata";
                    }
                }
            } 
            else {
                $echoString = "Elemento NON Aggiunto";
            }
        }
        else{
            $echoString = "Errore campi";
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
			
			<header id="header-home" class="full-screen parallax">
				<div class="padding-12 content">						
					<div class="card white wrap-padding">
						<h1>Modifica un articolo</h1>
					</div>
					<div class="card colored wrap-padding">
						<form action="'.$url.'?id=article&sez=update" method="POST"  enctype="multipart/form-data">
							<p><label for="article">Identificativo articolo:</label></p>
							<input type="number" id="article" name="article" value="'.$row["id"].'" readonly>
							
							<p><label for="titolo">Titolo:</label></p>
							<input type="text" id="titolo" name="titolo" value="'.$row["titolo"].'">
							
							<p><label for="sottotitolo">Sottotitolo:</label></p>
							<input type="text" id="sottotitolo" name="sottotitolo" value="'.$row["sottotitolo"].'">
							
							<p><label for="descrizione">Descrizione:</label></p>
							<textarea type="text" id="descrizione" name="descrizione">'.$row["descrizione"].'</textarea>
                            
                            <p><label for="anteprima">Anteprima:</label></p>
							<textarea type="text" id="anteprima" name="anteprima">'.$row["anteprima"].'</textarea>
							
							<p><label for="eta">Eta in milioni di anni:</label></p>
							<input type="number" id="eta" name="eta" value="'.$row["eta"].'">
							
							<p><label for="descrizioneimg">Descrizione immagine:</label></p>
							<input type="text" id="descrizioneimg" name="descrizioneimg" value="'.$row["descrizioneimg"].'">
							
                            <p><label for="imgarticle">Immagine:</label></p>
                            <input type="file" id="imgarticle" name="imgarticle" value="">
                
                            <p><label for="imgarticleremove">Nessuna immagine:</label></p>
                            <input type="checkbox" id="imgarticleremove" name="imgarticleremove" value="true">

							<br>
							
							<input type="submit" value="MODIFICA" title="Avvia la modifica" class="card btn wide text-colored white" />
						</form>
					</div>
				</div>
			</header>
                ';
            }
        
        else{
            $echoString = "Errore: Articolo non presente";
        }
        return $echoString;
    }

    public static function updateArticle($connect, $idarticolo, $titolo, $sottotitolo, $descrizione, $anteprima, $eta, $descrizioneimg, $immagine, $removeImage){
        $echoString="";
        if(
            isset($titolo) &&
            isset($sottotitolo) &&
            isset($descrizione) &&
            isset($descrizioneimg) &&
            isset($eta) /*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            if($removeImage){  
                $sqlQuery = "SELECT immagine FROM articolo WHERE id = '".$idarticolo."' ";
                $result = $connect->query($sqlQuery);
                if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {         
                    if($row["immagine"]!="" && $row["immagine"]!=NULL){        
                        global $homepath;
                        delImage($homepath.$row["immagine"]);
                    }
                }
            }

            $destinazioneFileDB = NULL;
            if(!$removeImage && $immagine['error'] == 0){
                $destinazioneFileDB = loadImage("articleimg", $idarticolo, $immagine);
            }

            $sqlQuery = "UPDATE articolo SET titolo='".$titolo."', sottotitolo='".$sottotitolo."', descrizione='".htmlentities($descrizione, ENT_QUOTES)."', anteprima='".htmlentities($anteprima, ENT_QUOTES)."', eta='".$eta."', descrizioneimg='".$descrizioneimg."'";
            if( $destinazioneFileDB != NULL){
                $sqlQuery .= ", immagine='". $destinazioneFileDB."'";
            }
            if($removeImage){
                $sqlQuery .= ", immagine=NULL ";
            }
            $sqlQuery .= "WHERE id='".$idarticolo."'";

            if( $connect->query($sqlQuery) ){
                $echoString = "Elemento Modificato";
            } 
            else {
                $echoString = "Elemento NON Modificato";
            }
        }
        else{
            $echoString = "Errore campi";
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
                    $echoString = "Errore: Aggiornamento Articolo del giorno";
                } 
            }
            else{
                $echoString = "Errore: Non ci sono articoli";
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
                            <a href="'.$pathLink.'id='.$row4["id"].'&titolo='.$row4["titolo"].'" class="btn colored"><p> Leggi l\'articolo </p></a>
                        </div>
                    </div>       
                                   
                ';
            }
            else{
                $echoString = "Errore: Non ci sono articoli";
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
    
    public static function addComment($connect, $idArticle, $idUser, $text){
        $sqlQuery = "INSERT INTO commentoarticolo (idutente, idarticolo, commento) VALUES ('".$idUser."', '".$idArticle."', '".$text."')";
        if( $connect->query($sqlQuery) ){
            $echoString = "Elemento Aggiunto";
        } 
        else {
            $echoString = "Elemento NON Aggiunto";
        }
        return $echoString;
    }

}

?>