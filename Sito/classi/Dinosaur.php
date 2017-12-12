<?php 
include_once ($_SERVER['DOCUMENT_ROOT'] ."/connect.php");

class Dinosaur {    
                
    //metodi
    public static function printListDinosaur($filter){
        $connect = startConnect();     
        
        $sqlQuery = "SELECT count(nome) as ntot FROM dinosauro";
		$result = $connect->query($sqlQuery);
        $row = $result->fetch_assoc();
        closeConnect($connect);

        return Dinosaur::printListDinosaurLimit($filter,0,$row["ntot"]);
    }
    public static function printListDinosaurLimit($filter, $startNumView, $numView){
        $connect = startConnect();     
        $echoString="";
        if(isset($connect)){
            $sqlFilter = "";
            if(isset($filter) && $filter!=""){
                $words = explode(" ",$filter);
                $sqlFilter="WHERE ";
                foreach($words as $value){
                    $sqlFilter .= "nome LIKE '%".$value."%' OR peso LIKE '%".$value."%' OR altezza LIKE '%".$value."%' OR lunghezza LIKE '%".$value."%'
                    OR periodomin LIKE '%".$value."%' OR periodomax LIKE '%".$value."%' OR habitat LIKE '%".$value."%' OR alimentazione LIKE '%".$value."%' OR tipologiaalimentazione LIKE '%".$value."%'
                    OR descrizioneautore LIKE '%".$value."%' OR descrizione LIKE '%".$value."%' OR curiosita LIKE '%".$value."%' OR idautore LIKE '%".$value."%' ";
                }
            }
            
            $sqlFilter .= "ORDER BY nome";
            $sqlQuery = "SELECT nome, peso, altezza, lunghezza, tipologiaalimentazione FROM dinosauro ".$sqlFilter." LIMIT ".$startNumView.", ".$numView;
            $result = $connect->query($sqlQuery);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $echoString .='
                    <div class="third wrap-padding">
                        <div id="" class="daily-dino card">
                            <div class="padding-large colored">
                                <h1>'.$row["nome"].'</h1>
                            </div>
                            <!--<img src="img/immagineprofilo.jpg" alt="immagine profilo utente">-->
                            <div class="padding-medium">
                                <p>
                                    Peso: '.$row["nome"].'<br>
                                    Altezza: '.$row["altezza"].'<br>
                                    Lunghezza: '.$row["lunghezza"].'<br>
                                    Tipologia di alimentazione: '.$row["tipologiaalimentazione"].'
                                </p>
                            </div>
                            <div class="center padding-2">
                                <a href="'.$_SERVER["PHP_SELF"].'?id=dino&sez=formupdate&nome='.$row["nome"].'" class="btn green-sea"><p> Modifica</p></a>
                                <a href="'.$_SERVER["PHP_SELF"].'?id=dino&sez=delete&nome='.$row["nome"].'" class="btn green-sea"><p> Elimina </p></a>
                            </div>
                        </div>
                    </div>
                    ';                
                }
            } 
            else {
                $echoString = "0 risultati";
            }
        }
        closeConnect($connect);
        return $echoString;
    }

    public function deleteDinosaur($id){
        $echoString = "";
        $connect = startConnect(); 
        if(isset($connect)){
            if(isset($id)){
                $sqlQuery = "DELETE FROM dinosauro WHERE nome = '".$id."' ";
                if( $connect->query($sqlQuery) ){
                    $echoString = "Elemento eliminato";
                } 
                else {
                    $echoString = "Elemento NON eliminato";
                }
            }
        }        
        closeConnect($connect);
        return $echoString;
    }

    public static function formAddDinosaur($url){
        $echoString ='
            <form action="'.$url.'?id=dino&sez=add" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="">
                
                <label for="peso">Peso in Kg:</label>
                <input type="number" id="peso" name="peso" value="">

                <label for="altezza">Altezza in cm:</label>
                <input type="number" id="altezza" name="altezza" value="">
                
                <label for="lunghezza">Lunghezza in cm:</label>
                <input type="number" id="lunghezza" name="lunghezza" value="">
                
                <label for="periodomin">Periodo minimo in milioni di anni:</label>
                <input type="number" id="periodomin" name="periodomin" value="">
                
                <label for="periodomax">Periodo massimo in milioni di anni:</label>
                <input type="number" id="periodomax" name="periodomax" value="">
                
                <label for="habitat">Habitat:</label>
                <input type="text" id="habitat" name="habitat" value="">
                
                <label for="tipologiaalimentazione1">Carnivoro:</label>
                <input type="radio" id="tipologiaalimentazione1" name="tipologiaalimentazione" value="carnivoro" checked>
                
                <label for="tipologiaalimentazione2">Onnivoro:</label>
                <input type="radio" id="tipologiaalimentazione2" name="tipologiaalimentazione" value="onnivoro">
                
                <label for="tipologiaalimentazione3">Erbivoro:</label>
                <input type="radio" id="tipologiaalimentazione3" name="tipologiaalimentazione" value="erbivoro">
                
                <label for="alimentazione">Alimentazione:</label>
                <input type="text" id="alimentazione" name="alimentazione" value="">
                
                <label for="descrizioneautore">Descrizione Autore:</label>
                <input type="text" id="descrizioneautore" name="descrizioneautore" value="">
                
                <label for="descrizione">Descrizione:</label>
                <input type="text" id="descrizione" name="descrizione" value="">
                
                <label for="curiosita">Curiosità:</label>
                <input type="text" id="curiosita" name="curiosita" value="">

                <input type="submit" value="Aggiungi" title="Avvia l\'operazione" />
            </form>
        ';
        return $echoString;

    }

    //sarei quasi indeciso se istanziare il dinosauro e passarlo a questo metodo per il salvataggio nel DB
    public static function addDinosaur($idautore, $nome, $peso, $altezza, $lunghezza, $periodomin, $periodomax, $habitat, $alimentazione, $tipologiaalimentazione, $descrizioneautore, $descrizione, $curiosita){
        $echoString ="";
        $connect = startConnect(); 
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
            isset($descrizioneautore) &&
            isset($descrizione) &&
            isset($curiosita)  /*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            $sqlQuery = "INSERT INTO dinosauro (
                nome, peso, altezza, lunghezza, periodomin, periodomax, habitat, alimentazione, tipologiaalimentazione, descrizioneautore, descrizione, curiosita, datains, idautore)
                VALUES ('".$nome."', '".$peso."', '".$altezza."', '".$lunghezza."', '".$periodomin."', '".$periodomax."', '".$habitat."', '".$alimentazione."', '".$tipologiaalimentazione."', '".$descrizioneautore."', '".$descrizione."', '".$curiosita."', '".date('Y-m-j')."', '".$idautore."') ";
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
    public static function formUpdateDinosaur($url, $id){
        $echoString ="";
        $connect = startConnect(); 
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
                <form action="'.$url.'?id=dino&sez=update" method="POST">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="'.$row["nome"].'" readonly>
                    
                    <label for="peso">Peso in Kg:</label>
                    <input type="number" id="peso" name="peso" value="'.$row["peso"].'">

                    <label for="altezza">Altezza in cm:</label>
                    <input type="number" id="altezza" name="altezza" value="'.$row["altezza"].'">
                    
                    <label for="lunghezza">Lunghezza in cm:</label>
                    <input type="number" id="lunghezza" name="lunghezza" value="'.$row["lunghezza"].'">
                    
                    <label for="periodomin">Periodo minimo in milioni di anni:</label>
                    <input type="number" id="periodomin" name="periodomin" value="'.$row["periodomin"].'">
                    
                    <label for="periodomax">Periodo massimo in milioni di anni:</label>
                    <input type="number" id="periodomax" name="periodomax" value="'.$row["periodomax"].'">
                    
                    <label for="habitat">Habitat:</label>
                    <input type="text" id="habitat" name="habitat" value="'.$row["habitat"].'">
                    
                    <label for="tipologiaalimentazione1">Carnivoro:</label>
                    <input type="radio" id="tipologiaalimentazione1" name="tipologiaalimentazione" value="carnivoro" '.$alimentazionecarnivora.'>
                    
                    <label for="tipologiaalimentazione2">Onnivoro:</label>
                    <input type="radio" id="tipologiaalimentazione2" name="tipologiaalimentazione" value="onnivoro" '.$alimentazioneonnivora.'>
                    
                    <label for="tipologiaalimentazione3">Erbivoro:</label>
                    <input type="radio" id="tipologiaalimentazione3" name="tipologiaalimentazione" value="erbivoro" '.$alimentazioneerbivora.'>
                    
                    <label for="alimentazione">Alimentazione:</label>
                    <input type="text" id="alimentazione" name="alimentazione" value="'.$row["alimentazione"].'">
                    
                    <label for="descrizioneautore">Descrizione Autore:</label>
                    <input type="text" id="descrizioneautore" name="descrizioneautore" value="'.$row["descrizioneautore"].'">
                    
                    <label for="descrizione">Descrizione:</label>
                    <input type="text" id="descrizione" name="descrizione" value="'.$row["descrizione"].'">
                    
                    <label for="curiosita">Curiosità:</label>
                    <input type="text" id="curiosita" name="curiosita" value="'.$row["curiosita"].'">

                    <input type="submit" value="Modifica" title="Avvia l\'operazione" />
                </form>
            ';
        }
        else{
            echo "Errore: Dinosauro non presente";
        }
        closeConnect($connect);
        return $echoString;

    }

    public static function updateDinosaur($nome, $peso, $altezza, $lunghezza, $periodomin, $periodomax, $habitat, $alimentazione, $tipologiaalimentazione, $descrizioneautore, $descrizione, $curiosita){
    
        $echoString ="";
        $connect = startConnect(); 

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
            isset($descrizioneautore) &&
            isset($descrizione) &&
            isset($curiosita)/*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            $sqlQuery = "UPDATE dinosauro SET peso='".$peso."', altezza='".$altezza."', lunghezza='".$lunghezza."', 
            periodomin='".$periodomin."', periodomax='".$periodomax."', habitat='".$habitat."', alimentazione='".$alimentazione."', tipologiaalimentazione='".$tipologiaalimentazione."', descrizioneautore='".$descrizioneautore."',
            descrizione='".$descrizione."', curiosita='".$curiosita."' WHERE nome='".$nome."'";
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