<?php 

include_once (__DIR__."/../loadFile.php");

class Dinosaur {    
                
    //metodi
    public static function printListDinosaur($connect, $filter, $basePathImg, $pathUpdate, $pathDelete){
        
        $sqlQuery = "SELECT count(nome) as ntot FROM dinosauro";
		$result = $connect->query($sqlQuery);
        $row = $result->fetch_assoc();
       
        return Dinosaur::printListDinosaurLimit($connect, $filter, 0, $row["ntot"], $basePathImg, $pathUpdate, $pathDelete);
    }
    public static function printListDinosaurLimit($connect, $filter, $startNumView, $numView, $basePathImg, $pathUpdate, $pathDelete){
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
            
            $sqlFilter .= "ORDER BY nome";
            $sqlQuery = "SELECT nome, peso, altezza, lunghezza, tipologiaalimentazione, immagine FROM dinosauro ".$sqlFilter." LIMIT ".$startNumView.", ".$numView;
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $echoString .='
                    <div class="third wrap-padding">
                        <div id="" class="daily-dino card">
                            <div class="padding-large colored">
                                <h1>'.$row["nome"].'</h1>
                            </div>
                            ';
                            if(isset($row["immagine"])){
                                $echoString .=' <img src="'.$basePathImg.$row["immagine"].'" alt="Immagine di un '.$row["nome"].'"/>';
                            }
                            $echoString .='
                            <div class="center padding-2">
                                <p>
                                    <strong>Peso: </strong> '.$row["nome"].'<br>
                                    <strong>Altezza: </strong> '.$row["altezza"].'<br>
                                    <strong>Lunghezza: </strong> '.$row["lunghezza"].'<br>
                                    <strong>Alimentazione: </strong> '.$row["tipologiaalimentazione"].'
                                </p>
                            </div>
                            <div class="center padding-2">
                                <a href="'.$pathUpdate.'nome='.$row["nome"].'" class="btn colored"><p> Modifica</p></a>
                                <a href="'.$pathDelete.'nome='.$row["nome"].'" class="btn colored"><p> Elimina </p></a> 
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
        }
        return $echoString;
    }

    public static function printListDinosaurUser($connect, $filter, $basePathImg, $pathLink, $orderByInsert = false){
        
        $sqlQuery = "SELECT count(nome) as ntot FROM dinosauro";
		$result = $connect->query($sqlQuery);
        $row = $result->fetch_assoc();
       
        return Dinosaur::printListDinosaurUserLimit($connect, $filter, 0, $row["ntot"], $basePathImg, $pathLink, $orderByInsert = false);
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
                        <div  class="daily-dino card margin-half">
                            <div class="padding-large colored">
                                <h1>'.$row["nome"].'</h1>
                            </div>
                            ';
                            if(isset($row["immagine"])){
                                $echoString .=' <img src="'.$basePathImg.$row["immagine"].'" alt="Immagine di un '.$row["nome"].'"/>';
                            }
                            $echoString .='
                            <div class="padding-large">
                                <ul>
                                    <li><strong>Peso: </strong> '.$row["peso"].'</li>
                                    <li><strong>Altezza: </strong> '.$row["altezza"].'</li>
                                    <li><strong>Lunghezza: </strong> '.$row["lunghezza"].'</li>
                                    <li><strong>Alimentazione: </strong> '.$row["tipologiaalimentazione"].'</li>
                                </ul>
                                <p>
                                '.html_entity_decode($row["descrizionebreve"]).'
                                </p>
                            </div>
                            <div class="center padding-2">
                                <a href="'.$pathLink.'nome='.$row["nome"].'" class="btn colored"><p> Visualizza la scheda del dinosauro </p></a>
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
                                $echoString .=' <img id="dino-immagine" src="'.$basePathImg.$row["immagine"].'" alt="Immagine di un '.$row["nome"].'"/>';
                            }
                            $echoString .='
                            <div id="caratteristiche" class="wrap-padding white">
                                <h2>Caratteristiche</h2>
                                <br>
                                <ul>
                                    <li><strong>Età:</strong> '.$row["periodomin"].'-'.$row["periodomax"].' milioni</li>
                                    <li><strong>Habitat:</strong> '.$row["habitat"].'</li>
                                    <li><strong>Altezza:</strong> '.$row["altezza"].' cm</li>
                                    <li><strong>Lunghezza:</strong> '.$row["lunghezza"].' cm</li>
                                    <li><strong>Peso:</strong> '.$row["peso"].' kg</li>
                                    <li><strong>Alimentazione:</strong> '.$row["alimentazione"].'</li>
                                </ul>
                            </div>

                        </div>
                        <div class="wrap-padding white">
                            <h2>Descrizione</h2>
                            <br>
                            '.html_entity_decode($row["descrizione"]).'                            
                            <br>
                            <h2>Una curiosità</h2>
                            <br>
                            '.html_entity_decode($row["curiosita"]).'
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

    public function deleteDinosaur($connect, $id){
        $echoString = "";
        if(isset($connect)){
            if(isset($id)){

                $sqlQuery = "SELECT immagine FROM dinosauro WHERE nome = '".$id."' ";
                $result = $connect->query($sqlQuery);
                if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {                    
                    
                    if($row["immagine"]!=NULL && $row["immagine"]!="" )
                        delImage(__DIR__."/../".$row["immagine"]);                   

                    $sqlQuery = "DELETE FROM dinosauro WHERE nome = '".$id."' ";
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
        }        
        return $echoString;
    }

    public static function formAddDinosaur($url){
        $echoString ='
		
		<header id="header-home" class="full-screen parallax">
			<div class="padding-12 content">						
				<div class="card white wrap-padding">
					<h1>Aggiungi un dinosauro</h1>
				</div>
				<div class="card colored wrap-padding">
					<form action="'.$url.'?id=dino&sez=add" method="POST" enctype="multipart/form-data">
						<p><label for="nome">Nome:</label></p>
						<input type="text" id="nome" name="nome" value="">
						
						<p><label for="peso">Peso in Kg:</label></p>
						<input type="number" id="peso" name="peso" value="">

						<p><label for="altezza">Altezza in cm:</label></p>
						<input type="number" id="altezza" name="altezza" value="">
						
						<p><label for="lunghezza">Lunghezza in cm:</label></p>
						<input type="number" id="lunghezza" name="lunghezza" value="">
						
						<p><label for="periodomin">Periodo minimo in milioni di anni:</label></p>
						<input type="number" id="periodomin" name="periodomin" value="">
						
						<p><label for="periodomax">Periodo massimo in milioni di anni:</label></p>
						<input type="number" id="periodomax" name="periodomax" value="">
						
						<p><label for="habitat">Habitat:</label></p>
						<input type="text" id="habitat" name="habitat" value="">
						
						<br>
						
						<label for="tipologiaalimentazione1">Carnivoro:</label>
						<input type="radio" id="tipologiaalimentazione1" name="tipologiaalimentazione" value="carnivoro" checked>
						
						<label for="tipologiaalimentazione2">Onnivoro:</label>
						<input type="radio" id="tipologiaalimentazione2" name="tipologiaalimentazione" value="onnivoro">
						
						<label for="tipologiaalimentazione3">Erbivoro:</label>
						<input type="radio" id="tipologiaalimentazione3" name="tipologiaalimentazione" value="erbivoro">
						
						<p><label for="alimentazione">Alimentazione:</label></p>
						<input type="text" id="alimentazione" name="alimentazione" value="">
						
						<p><label for="descrizionebreve">Descrizione Breve:</label></p>
						<textarea type="text" id="descrizionebreve" name="descrizionebreve" value=""></textarea>
						
						<p><label for="descrizione">Descrizione:</label></p>
						<textarea type="text" id="descrizione" name="descrizione" value=""></textarea>
						
						<p><label for="curiosita">Curiosità:</label></p>
                        <textarea type="text" id="curiosita" name="curiosita" value=""></textarea>         
               
                        <p><label for="imgdinosaur">Immagine dinosauro:</label></p>
                        <input type="file" id="imgdinosaur" name="imgdinosaur" value="">

						<br>
						
						<input type="submit" value="AGGIUNGI" title="Avvia l\'operazione" class="card btn wide text-colored white"/>
					</form>
				</div>
			</div>
		</header>
        ';
        return $echoString;

    }

    //sarei quasi indeciso se istanziare il dinosauro e passarlo a questo metodo per il salvataggio nel DB
    public static function addDinosaur($connect, $idautore, $nome, $peso, $altezza, $lunghezza, $periodomin, $periodomax, $habitat, $alimentazione, $tipologiaalimentazione, $descrizionebreve, $descrizione, $curiosita, $immagine){
        $echoString ="";
        $sqlQuery = "SELECT nome FROM dinosauro WHERE nome = '".$nome."' ";
        $result = $connect->query($sqlQuery);
        if(
            $result->num_rows == 0 &&
            isset($nome) &&
            isset($peso) &&
            isset($altezza)  &&
            isset($lunghezza) &&
            isset($periodomin)  &&
            isset($periodomax) &&
            isset($habitat) &&
            isset($alimentazione)  &&
            isset($tipologiaalimentazione) &&
            isset($descrizionebreve) &&
            isset($descrizione) &&
            isset($curiosita)  /*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){

            $destinazioneFileDB = NULL;
            if($immagine['error'] == 0){
                $destinazioneFileDB = loadImage("dinosaurimg", $nome, $immagine);
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
                $echoString = "Elemento Aggiunto";
            } 
            else {
                $echoString = "Elemento NON Aggiunto";
                if( $destinazioneFileDB != NULL){
                    //ELIMINARE IMMAGINE CARICATA
                }
            }
        }
        else{
            $echoString = "Errore campi";
        }           
        return $echoString;
    }
    public static function formUpdateDinosaur($connect, $url, $id){
        $echoString ="";
        $sqlQuery = "SELECT * FROM dinosauro WHERE nome = '".$id."' ";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();   
            $alimentazionecarnivora = "";
            $alimentazioneonnivora = "";
            $alimentazioneerbivora = "";
            if($row["tipologiaalimentazione"]=="carnivoro"){
                $alimentazionecarnivora = "checked";
            }
            if($row["tipologiaalimentazione"]=="onnivoro"){
                $alimentazioneonnivora = "checked";                
            }
            if($row["tipologiaalimentazione"]=="erbivoro"){
                $alimentazioneerbivora = "checked";                
            }
            
            $echoString ='
			
			<header id="header-home" class="full-screen parallax">
				<div class="padding-12 content">						
					<div class="card white wrap-padding">
						<h1>Modifica un dinosauro</h1>
					</div>
					<div class="card colored wrap-padding">
						<form action="'.$url.'?id=dino&sez=update" method="POST" enctype="multipart/form-data">
							<p><label for="nome">Nome:</label></p>
							<input type="text" id="nome" name="nome" value="'.$row["nome"].'" readonly>
							
							<p><label for="peso">Peso in Kg:</label></p>
							<input type="number" id="peso" name="peso" value="'.$row["peso"].'">

							<p><label for="altezza">Altezza in cm:</label></p>
							<input type="number" id="altezza" name="altezza" value="'.$row["altezza"].'">
							
							<p><label for="lunghezza">Lunghezza in cm:</label></p>
							<input type="number" id="lunghezza" name="lunghezza" value="'.$row["lunghezza"].'">
							
							<p><label for="periodomin">Periodo minimo in milioni di anni:</label></p>
							<input type="number" id="periodomin" name="periodomin" value="'.$row["periodomin"].'">
							
							<p><label for="periodomax">Periodo massimo in milioni di anni:</label></p>
							<input type="number" id="periodomax" name="periodomax" value="'.$row["periodomax"].'">
							
							<p><label for="habitat">Habitat:</label></p>
							<input type="text" id="habitat" name="habitat" value="'.$row["habitat"].'">
							
							<br>
							
							<label for="tipologiaalimentazione1">Carnivoro:</label>
							<input type="radio" id="tipologiaalimentazione1" name="tipologiaalimentazione" value="carnivoro" '.$alimentazionecarnivora.'>
							
							<label for="tipologiaalimentazione2">Onnivoro:</label>
							<input type="radio" id="tipologiaalimentazione2" name="tipologiaalimentazione" value="onnivoro" '.$alimentazioneonnivora.'>
							
							<label for="tipologiaalimentazione3">Erbivoro:</label>
							<input type="radio" id="tipologiaalimentazione3" name="tipologiaalimentazione" value="erbivoro" '.$alimentazioneerbivora.'>
							
							<p><label for="alimentazione">Alimentazione:</label></p>
							<input type="text" id="alimentazione" name="alimentazione" value="'.$row["alimentazione"].'">
							
							<p><label for="descrizionebreve">Descrizione breve:</label></p>
							<textarea type="text" id="descrizionebreve" name="descrizionebreve"> '.html_entity_decode($row["descrizionebreve"]).'</textarea>
							
							<p><label for="descrizione">Descrizione:</label></p>
							<textarea type="text" id="descrizione" name="descrizione"> '.html_entity_decode($row["descrizione"]).'</textarea>
							
							<p><label for="curiosita">Curiosità:</label></p>
							<textarea type="text" id="curiosita" name="curiosita"> '.html_entity_decode($row["curiosita"]).'</textarea>
                            
                            <p><label for="imgdinosaur">Immagine dinosauro:</label></p>
                            <input type="file" id="imgdinosaur" name="imgdinosaur" value="">
                
                            <p><label for="imgdinosaurremove">Nessuna immagine:</label></p>
                            <input type="checkbox" id="imgdinosaurremove" name="imgdinosaurremove" value="true">

							<br>
							
							<input type="submit" value="MODIFICA" title="Avvia l\'operazione" / class="card btn wide text-colored white">
						</form>
					</div>
				</div>
			</header>
            ';
        }
        else{
            echo "Errore: Dinosauro non presente";
        }
        return $echoString;

    }

    public static function updateDinosaur($connect, $nome, $peso, $altezza, $lunghezza, $periodomin, $periodomax, $habitat, $alimentazione, $tipologiaalimentazione, $descrizionebreve, $descrizione, $curiosita, $immagine, $removeImage){
    
        $echoString ="";
        
        if(
            isset($nome) &&
            isset($peso) &&
            isset($altezza) &&
            isset($lunghezza) &&
            isset($periodomin) &&
            isset($periodomax) &&
            isset($habitat) &&
            isset($alimentazione) &&
            isset($tipologiaalimentazione) &&
            isset($descrizionebreve) &&
            isset($descrizione) &&
            isset($curiosita)/*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){

            if($removeImage){  
                $sqlQuery = "SELECT immagine FROM dinosauro WHERE nome = '".$nome."' ";
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
                $destinazioneFileDB = loadImage("dinosaurimg", $nome, $immagine);
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
                    $echoString = "Errore: Aggiornamento impostazioni";
                } 
            }
            else{
                $echoString = "Errore: Non ci sono dinosauri";
            }
            
        }
        if($echoString == ""){
            
            $sqlQuery4 = "SELECT * FROM dinosauro WHERE nome = '$id'"; 
            $result4 = $connect->query($sqlQuery4);
            
            if ($result4->num_rows > 0 && $row4 = $result4->fetch_assoc()) {
                $echoString = '
                    <div  class="daily-dino card margin-half">
                        <div class="padding-large colored">
                            <h1> '.$row4["nome"].' </h1>
                        </div>
                        ';
                        if(isset($row4["immagine"])){
                            $echoString .=' <img src="'.$basePathImg.$row4["immagine"].'" alt="Immagine di un '.$row4["nome"].'"/>';
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
                            <a href="'.$pathLink.'nome='.$row4["nome"].'" class="btn colored"><p> Visualizza la scheda del dinosauro </p></a>
                        </div>
                    </div>             
                ';
            }
            else{
                $echoString = "Errore: Non ci sono dinosauri";
            }
        }

        return $echoString;
    }

    public static function getComment($connect, $idDino){
        $echoString ="";
        
        $sqlQuery = "SELECT nome, cognome, commento FROM commentodinosauro INNER JOIN utente ON commentodinosauro.idutente=utente.email WHERE iddinosauro=\"$idDino\"";
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
    
    public static function addComment($connect, $idDino, $idUser, $text){
        $sqlQuery = "INSERT INTO commentodinosauro (idutente, iddinosauro, commento) VALUES ('".$idUser."', '".$idDino."', '".$text."')";
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