<?php 
	$homepath = substr( $_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
    $percorsoHome = "";
	if (strpos($_SERVER['SCRIPT_NAME'], 'TecWeb') !== false) {
        $homepath .= "/TecWeb";
        $percorsoHome = "/TecWeb";
	}
    //$homepath = $_SERVER["DOCUMENT_ROOT"];
	include_once ($homepath . "/connect.php");
	include_once ($homepath . "/classi/User.php");
	include_once ($homepath . "/loadFile.php");

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
            $sqlQuery = "SELECT email, nome, cognome, immagine FROM utente ".$sqlFilter." LIMIT ".$startNumView.", ".$numView;
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $echoString .='
                    <div class="third wrap-padding">
                        <div id="" class="daily-dino card">
                            <div class="padding-large colored">
                                <h1>'.$row["email"].'</h1>
                            </div>
                            ';
                            if(isset($row["immagine"])){
                                global $percorsoHome;
                                $echoString .=' <img src="'.$percorsoHome.$row["immagine"].'" alt="immagine profilo utente">';
                            }
                            $echoString .='
                            <div class="center padding-2">
                                <p>
                                    <strong>Nome: </strong>'.$row["nome"].'<br>
                                    <strong>Cognome: </strong>'.$row["cognome"].'
                                </p>
                            </div>
                            <div class="center padding-2">
                                <a href="'.$_SERVER["PHP_SELF"].'?id=user&sez=formupdate&user='.$row["email"].'" class="btn colored"><p> Modifica</p></a>
                                <a href="'.$_SERVER["PHP_SELF"].'?id=user&sez=delete&user='.$row["email"].'" class="btn colored"><p> Elimina </p></a>
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
        
        closeConnect($connect);
        return $echoString;        
    }
    
    public function deleteUser($id){
        $echoString = "";
        $connect = startConnect();    
        if($this->getEmail()!=$id){
            if(isset($connect)){
                if(isset($id)){
                    
                    $sqlQuery = "SELECT immagine FROM utente WHERE email = '".$id."' ";
                    $result = $connect->query($sqlQuery);
                    if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {                    
                        global $homepath;
                        delImage($homepath.$row["immagine"]);                   

                        $sqlQuery = "DELETE FROM utente WHERE email = '".$id."' ";
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
                $sqlQuery = "SELECT immagine FROM utente WHERE email = '".$id."' ";
                $result = $connect->query($sqlQuery);
                if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {                    
                    global $homepath;
                    delImage($homepath.$row["immagine"]);                   

                    $sqlQuery = "DELETE FROM utente WHERE email = '".$id."' ";
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
        
        closeConnect($connect);
        return $echoString;
    }

    public static function formAddUser($url){
        $echoString ='
		
		<header id="header-home" class="full-screen parallax" enctype="multipart/form-data">
			<div class="padding-12 content">						
				<div class="card white wrap-padding">
					<h1>Aggiungi un nuovo utente</h1>
				</div>
				<div class="card colored wrap-padding">
					<form action="'.$url.'?id=user&sez=add" method="POST">
						<p><label for="email">Email:</label></p>
						<input type="email" id="email" name="email" value="">
						
						<p><label for="nome">Nome:</label></p>
						<input type="text" id="nome" name="nome" value="">
						
						<p><label for="cognome">Cognome:</label></p>
						<input type="text" id="cognome" name="cognome" value="">
						
						<p><label for="datanascita">Data di nascita:</label></p>
						<input type="date" id="datanascita" name="datanascita" value="">
						
						<p><label for="password">Password:</label></p>
						<input type="text" id="password" name="password" value="">
						
						<p><label for="passwordconf">Conferma password:</label></p>
                        <input type="text" id="passwordconf" name="passwordconf" value="">
                        
                        <p><label for="imgaccount">Nessuna immagine profilo:</label></p>
                        <input type="file" id="imgaccount" name="imgaccount" value="">

						<br>
						
						<input type="submit" value="AGGIUNGI" title="Avvia l\'operazione" / class="card btn wide text-colored white">
					</form>
				</div>
			</div>
		</header>
    ';
    return $echoString;
    } 
    
    public static function addUser($email, $nome, $cognome, $datanascita, $password, $confermaPassword, $immagine){
     
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
            
            $destinazioneFileDB = NULL;
            if($immagine['error'] == 0){
                $destinazioneFileDB = loadImage("userimg", $email, $immagine);
            }

            $sqlQuery = "INSERT INTO utente (email, nome, cognome, datanascita, password, immagine) VALUES ('".$email."', '".$nome."', '".$cognome."', '".$datanascita."', '".$password."', ";
            if( $destinazioneFileDB != NULL)
                $sqlQuery .="'".$destinazioneFileDB."'";
            else{
                $sqlQuery .= "NULL";
            }
            $sqlQuery .=") ";
            if( $connect->query($sqlQuery) ){
                $echoString .= "Elemento Aggiunto";
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
			<header id="header-home" class="full-screen parallax">
				<div class="padding-12 content">						
					<div class="card white wrap-padding">
						<h1>Modifica i dati utente</h1>
					</div>
					<div class="card colored wrap-padding">
						<form action="'.$url.'?id=user&sez=update" method="POST" enctype="multipart/form-data">
							<p><label for="email">Email:</label></p>
							<input type="email" id="email" name="email" value="'.$row["email"].'" readonly>
							
							<p><label for="nome">Nome:</label></p>
							<input type="text" id="nome" name="nome" value="'.$row["nome"].'">
							
							<p><label for="cognome">Cognome:</label></p>
							<input type="text" id="cognome" name="cognome" value="'.$row["cognome"].'">
							
							<p><label for="datanascita">Data di nascita:</label></p>
							<input type="date" id="datanascita" name="datanascita" value="'.$row["datanascita"].'">
							
							<p><label for="password">Password:</label></p>
							<input type="text" id="password" name="password" value="'.$row["password"].'">
							
							<p><label for="passwordconf">Conferma password:</label></p>
                            <input type="text" id="passwordconf" name="passwordconf" value="'.$row["password"].'">
                            
                            <p><label for="imgaccount">Immagine profilo:</label>></p>
                            <input type="file" id="imgaccount" name="imgaccount" value="">
            
                            <p><label for="imgaccountremove">Rimuovi immagine:</label>></p>
                            <input type="checkbox" id="imgaccountremove" name="imgaccountremove" value="true">
								
							<br>
								
							<input type="submit" value="MODIFICA" title="Avvia l\'operazione" / class="card btn wide text-colored white">
						</form>
					</div>
				</div>
			</header>
            ';
        }  
        else{
            $echoString ="Errore: Utente non presente";
        }  
        closeConnect($connect);
        return $echoString;
    } 
    
    public static function updateUser($email, $nome, $cognome, $datanascita, $password, $confermaPassword, $immagine, $removeImage){
     
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
            if($removeImage){  
                $sqlQuery = "SELECT immagine FROM utente WHERE email = '".$email."' ";
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
                $destinazioneFileDB = loadImage("userimg", $email, $immagine);
            }

            $sqlQuery = "UPDATE utente SET nome='".$nome."', cognome='".$cognome."', datanascita='".$datanascita."', password='".$password."'";
            if( $destinazioneFileDB != NULL){
                $sqlQuery .= ", immagine='". $destinazioneFileDB."'";
            }
            if($removeImage){
                $sqlQuery .= ", immagine=NULL ";
            }
            $sqlQuery .= "WHERE email='".$email."'";
            
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