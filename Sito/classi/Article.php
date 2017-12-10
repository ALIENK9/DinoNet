<?php

include_once ($_SERVER['DOCUMENT_ROOT'] ."/connect.php");

class Article{

    public static function printListArticle($filter){
        $connect = startConnect();     
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
		$sqlQuery = "SELECT id, titolo, sottotitolo, eta FROM articolo ".$sqlFilter;
		$result = $connect->query($sqlQuery);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
                $echoString .='
				<div class="third wrap-padding">
                    <div id="" class="daily-dino card">
                        <div class="padding-large colored">
                            <h1> '.$row["id"].' </h1>
                        </div>
                        <!--<img src="img/immagineprofilo.jpg" alt="immagine profilo utente">-->
                        <div class="padding-medium">
                            <p>
                                Titolo: '.$row["titolo"].'<br>
                                Sottotitolo: '.$row["sottotitolo"].'<br>
                                Età: '.$row["eta"].'
                            </p>
                        </div>
                        <div class="center padding-2">
                            <a href="'.$_SERVER["PHP_SELF"].'?id=article&sez=formupdate&article='.$row["id"].'" class="btn green-sea"><p> Modifica</p></a>
                            <a href="'.$_SERVER["PHP_SELF"].'?id=article&sez=delete&article='.$row["id"].'" class="btn green-sea"><p> Elimina </p></a>
                        </div>
                    </div>
                </div>
                ';
			}
		} 
		else {
            $echoString = "0 risultati";
		}
        closeConnect($connect);
        return $echoString;
    }
    public static function deleteArticle($id){   
        $connect = startConnect();     
        $echoString="";
        if(isset($id)){
            $sqlQuery = "DELETE FROM articolo WHERE id = '".$id."' ";
            if( $connect->query($sqlQuery) ){
                $echoString = "Elemento eliminato";
            } 
            else {
                $echoString = "Elemento NON eliminato";
            }
        }
        closeConnect($connect);
        return $echoString;
    }             
    public static function formAddArticle($url){
        $echoString ='
            <form action="'.$url.'?id=article&sez=add" method="POST">
                <label for="titolo">Titolo:</label>
                <input type="text" id="titolo" name="titolo" value="">
                
                <label for="sottotitolo">Sottotitolo:</label>
                <input type="text" id="sottotitolo" name="sottotitolo" value="">
                
                <label for="descrizione">Descrizione:</label>
                <input type="text" id="descrizione" name="descrizione" value="">
                
                <label for="eta">Età di riferimento (in milioni di anni):</label>
                <input type="number" id="eta" name="eta" value="">
                
                <label for="descrizioneimg">Descrizione della immagine:</label>
                <input type="text" id="descrizioneimg" name="descrizioneimg" value="">

                <input type="submit" value="Aggiungi" title="Avvia l\'operazione" />
            </form>
        ';
        return $echoString;
    }
    public static function addArticle($idautore, $titolo, $sottotitolo, $descrizione, $eta, $descrizioneimg){
        $connect = startConnect();     
        $echoString="";
        if(
            isset($titolo) &&
            isset($sottotitolo) &&
            isset($descrizione) &&
            isset($eta) &&
            isset($descrizioneimg) /*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            $sqlQuery = "INSERT INTO articolo (titolo, sottotitolo, descrizione, eta, descrizioneimg, datains, idautore) VALUES ('".$titolo."', '".$sottotitolo."', '".$descrizione."', '".$eta."', '".$descrizioneimg."', '".date('Y-m-j')."', '".$idautore."') ";
            
            if( $connect->query($sqlQuery) ){
                $echoString = "Elemento Aggiunto";
            } 
            else {
                $echoString = "Elemento NON Aggiunto";
            }
        }
        else{
            $echoString = "Errore campi";
        }
        closeConnect($connect);
        return $echoString;
    }
    public static function formUpdateArticle($url, $id){
        $connect = startConnect();     
        $echoString="";
        $sqlQuery = "SELECT * FROM articolo WHERE id = '".$_GET['article']."' ";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $echoString ='
                <form action="'.$url.'?id=article&sez=update" method="POST">
                    <label for="article">Identificativo articolo:</label>
                    <input type="number" id="article" name="article" value="'.$row["id"].'" readonly>
                    
                    <label for="titolo">Titolo:</label>
                    <input type="text" id="titolo" name="titolo" value="'.$row["titolo"].'">
                    
                    <label for="sottotitolo">Sottotitolo:</label>
                    <input type="text" id="sottotitolo" name="sottotitolo" value="'.$row["sottotitolo"].'">
                    
                    <label for="descrizione">Descrizione:</label>
                    <input type="text" id="descrizione" name="descrizione" value="'.$row["descrizione"].'">
                    
                    <label for="eta">Eta in milioni di anni:</label>
                    <input type="number" id="eta" name="eta" value="'.$row["eta"].'">
                    
                    <label for="descrizioneimg">Descrizione immagine:</label>
                    <input type="text" id="descrizioneimg" name="descrizioneimg" value="'.$row["descrizioneimg"].'">
                    
                    <input type="submit" value="Modifica" title="Avvia la modifica" />
                </form>
                ';
            }
        
        else{
            $echoString = "Errore: Articolo non presente";
        }
        closeConnect($connect);
        return $echoString;
    }

    public static function updateArticle($idarticolo, $titolo, $sottotitolo, $descrizione, $eta, $descrizioneimg){
        $connect = startConnect();     
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
            $sqlQuery = "UPDATE articolo SET titolo='".$titolo."', sottotitolo='".$sottotitolo."', descrizione='".$descrizione."', eta='".$eta."', descrizioneimg='".$descrizioneimg."' WHERE id='".$idarticolo."'";
        
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
        closeConnect($connect);
        return $echoString;
    }
                    
}

?>