<?php 
	$homepath = substr( $_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
	//$homepath = $_SERVER["DOCUMENT_ROOT"];

	include_once ($homepath . "/connect.php");
	include_once ($homepath . "/classi/User.php");

class UserAdmin extends User {
    
    public static function printListUser($filter){
        $connect = startConnect();     
        
        $sqlQuery = "SELECT count(email) as ntot FROM utente";
		$result = $connect->query($sqlQuery);
        $row = $result->fetch_assoc();
        closeConnect($connect);

        return UserAdmin::printListUserLimit($filter,0,$row["ntot"]);        
    }

    public static function printListUserLimit($filter, $startNumView, $numView){
        $connect = startConnect();     
        $echoString="";
        if(isset($connect)){
            $sqlFilter = "";
            if(isset($filter) && $filter!=""){
                $words = explode(" ",$filter);
                $sqlFilter="WHERE ";
                foreach($words as $value){
                    $sqlFilter .= "nome LIKE '%".$value."%' OR cognome LIKE '%".$value."%' OR email LIKE '%".$value."%' ";
                }
            }
            
            $sqlFilter .= "ORDER BY email, nome, cognome";
            $sqlQuery = "SELECT email, nome, cognome FROM utente ".$sqlFilter." LIMIT ".$startNumView.", ".$numView;
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $echoString .='
                    <div class="third wrap-padding">
                        <div id="" class="daily-dino card">
                            <div class="padding-large colored">
                                <h1>'.$row["email"].'</h1>
                            </div>
                            <!--<img src="img/immagineprofilo.jpg" alt="immagine profilo utente">-->
                            <div class="padding-medium">
                                <p>
                                    Nome:'.$row["nome"].'<br>
                                    Cognome:'.$row["cognome"].'
                                </p>
                            </div>
                            <div class="center padding-2">
                                <a href="'.$_SERVER["PHP_SELF"].'?id=user&sez=formupdate&user='.$row["email"].'" class="btn green-sea"><p> Modifica</p></a>
                                <a href="'.$_SERVER["PHP_SELF"].'?id=user&sez=delete&user='.$row["email"].'" class="btn green-sea"><p> Elimina </p></a>
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
    
    public function deleteUser($id){
        $echoString = "";
        $connect = startConnect();    
        if($this->getEmail()!=$id){
            if(isset($connect)){
                if(isset($id)){
                    $sqlQuery = "DELETE FROM utente WHERE email = '".$id."' ";
                    if( $connect->query($sqlQuery) ){
                        $echoString = "Elemento eliminato";
                    } 
                    else {
                        $echoString = "Elemento NON eliminato";
                    }
                }
            }
        }
        else{
            $echoString = "Non ti puoi eliminare";
        }
        
        closeConnect($connect);
        return $echoString;
    }
    
    //bisogna creare un trigger o dei controlli per le chiavi esterne
    public static function deleteUserForce($id){
        $echoString = "";
        $connect = startConnect();  
        if(isset($connect)){
            if(isset($id)){
                $sqlQuery = "DELETE FROM utente WHERE email = '".$id."' ";
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

    public static function formAddUser($url){
        $echoString ='
        <form action="'.$url.'?id=user&sez=add" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="">
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="">
            
            <label for="cognome">Cognome:</label>
            <input type="text" id="cognome" name="cognome" value="">
            
            <label for="datanascita">Data di nascita:</label>
            <input type="date" id="datanascita" name="datanascita" value="">
            
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" value="">
            
            <label for="passwordconf">Conferma password:</label>
            <input type="text" id="passwordconf" name="passwordconf" value="">

            <input type="submit" value="Aggiungi" title="Avvia l\'operazione" />
        </form>
    ';
    return $echoString;
    } 
    
    public static function addUser($email, $nome, $cognome, $datanascita, $password, $confermaPassword){
     
        $echoString ="";
        $connect = startConnect();   
        $sqlQuery = "SELECT email FROM utente WHERE email = '".$email."' ";
        $result = $connect->query($sqlQuery);

        if(
            $result->num_rows == 0 &&
            isset($email) &&
            isset($nome) &&
            isset($cognome) &&
            isset($datanascita) &&
            isset($password) &&
            isset($confermaPassword) &&
            $password==$confermaPassword /*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            $sqlQuery = "INSERT INTO utente (email, nome, cognome, datanascita, password) VALUES ('".$email."', '".$nome."', '".$cognome."', '".$datanascita."', '".$password."') ";
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
    
    public static function formUpdateUser($url, $id){
        $echoString ="";
        $connect = startConnect(); 
        $sqlQuery = "SELECT * FROM utente WHERE email = '".$id."' ";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $echoString ='
            <form action="'.$url.'?id=user&sez=update" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="'.$row["email"].'" readonly>
                
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="'.$row["nome"].'">
                
                <label for="cognome">Cognome:</label>
                <input type="text" id="cognome" name="cognome" value="'.$row["cognome"].'">
                
                <label for="datanascita">Data di nascita:</label>
                <input type="date" id="datanascita" name="datanascita" value="'.$row["datanascita"].'">
                
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" value="'.$row["password"].'">
                
                <label for="passwordconf">Conferma password:</label>
                <input type="text" id="passwordconf" name="passwordconf" value="'.$row["password"].'">

                <input type="submit" value="Aggiungi" title="Avvia l\'operazione" />
            </form>
            ';
        }  
        else{
            $echoString ="Errore: Utente non presente";
        }  
        closeConnect($connect);
        return $echoString;
    } 
    
    public static function updateUser($email, $nome, $cognome, $datanascita, $password, $confermaPassword){
     
        $echoString ="";
        $connect = startConnect();   

        if(
            isset($email) &&
            isset($nome) &&
            isset($cognome) &&
            isset($datanascita) &&
            isset($password) &&
            isset($confermaPassword) &&
            $password==$confermaPassword /*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            $sqlQuery = "UPDATE utente SET nome='".$nome."', cognome='".$cognome."', datanascita='".$datanascita."', password='".$password."' WHERE email='".$email."'";
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