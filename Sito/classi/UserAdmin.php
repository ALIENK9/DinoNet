<?php 

include_once (__DIR__."/User.php");
include_once (__DIR__ . "/../message.php");
include_once (__DIR__."/../validate.php");

class UserAdmin extends User {
    
    public static function printListUser($connect, $filter, $basePathImg, $pathUpdate, $pathDelete){
            
        
        $sqlQuery = "SELECT count(email) as ntot FROM utente";
		$result = $connect->query($sqlQuery);
        $row = $result->fetch_assoc();
        

        return UserAdmin::printListUserLimit($connect, $filter,0,$row["ntot"], $basePathImg, $pathUpdate, $pathDelete);        
    }

    public static function printListUserLimit($connect, $filter, $startNumView, $numView, $basePathImg, $pathUpdate, $pathDelete){
            
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
                        <div class="daily card">
                            <div class="padding-large colored card">
                                <h1>'.$row["email"].'</h1>
                            </div>
                            ';
                            if(isset($row["immagine"])){
                                $echoString .='  
								<div class="daily-wrapper wrap-padding colored">
									<img class="profile-pic" src="'.$basePathImg.$row["immagine"].'" alt="Profilo di '.$row["nome"].' '.$row["cognome"].'">
								</div>';
                            }
                            $echoString .='
                            <div class="center padding-2">
                                <p>
                                    <strong>Nome: </strong>'.$row["nome"].'<br>
                                    <strong>Cognome: </strong>'.$row["cognome"].'
                                </p>
                            </div>
                            <div class="center padding-2">
                                <a href="'.$pathUpdate.'user='.$row["email"].'" class="btn"> Modifica</a>
                                <a href="'.$pathDelete.'user='.$row["email"].'" class="btn" onclick="return confirm(\'Sei sicuro di voler eliminare l\\\'utente?\')"> Elimina</a>
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
    
    public function deleteUser($connect, $id, $basePathImg){
        $echoString = "";
           
        if($this->getEmail()!=$id){
            if(isset($connect)){
                if(isset($id)){
                    
                    $sqlQuery = "SELECT immagine FROM utente WHERE email = '".$id."' ";
                    $result = $connect->query($sqlQuery);
                    if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {   
                        if($row["immagine"] != NULL)     
                            delImage($basePathImg.$row["immagine"]);                   

                        $sqlQuery = "DELETE FROM utente WHERE email = '".$id."' ";
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
        }
        else{
            $echoString = message(messageUserDeleteMySelfAdmin()); 
        }       
        return $echoString;
    }

    public static function formAddUser($url, $email="", $nome="", $cognome="", $datanascita="", $tipologia="", $error=""){
        if(!isset($email)){ $email = ""; }
        if(!isset($nome)){ $nome = ""; }
        if(!isset($cognome)){ $cognome = ""; }
        if(!isset($datanascita)){ $datanascita = ""; }
        if(!isset($tipologia)){ $tipologia = ""; }
        if(!isset($error)){ $error = ""; }

        $echoString ='
		
		<div class="parallax padding-6 form-image">
            <header id="header-form" class="content card white wrap-padding">			
                <div id="title-card" class="card">
                    <h1> Aggiungi un utente </h1>
                </div>
            </header>
            
            <div id="content-form" class="content">';            
            include_once (__DIR__."/../breadcrumb.php");
            $echoString .= breadcrumbAdmin();
            if($error != ""){
                $echoString .= messageErrorForm($error);
            }
            $echoString .='
                <form action="'.$url.'?id=user&sez=add" method="POST" enctype="multipart/form-data" class="card colored wrap-padding" onsubmit="return validateForm(this)">
                    <p>I campi obbligatori sono contrassegnati con <abbr title="richiesto">*</abbr></p>
                    
                    <fieldset>
                        <legend>Dati personali</legend>
                        <p>
                            <label for="nome">Nome (non sono consentiti numeri): <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il nome dell\'utente" id="nome" name="nome" data-validation-mode="nomi" value="'.$nome.'" required>
                        </p>
                        
                        <p>
                            <label for="cognome">Cognome (non sono consentiti numeri): <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il cognome dell\'utente" id="cognome" name="cognome" data-validation-mode="nomi" value="'.$cognome.'" required>
                        </p>
                        
                        <p>
                            <label for="datanascita">Data di nascita (formato: gg/mm/aaaa):</label>
                            <input type="date" id="datanascita" name="datanascita" data-validation-mode="datanascita" value="'.$datanascita.'">
                        </p>
                    </fieldset>  
                    
                    <fieldset>
                        <legend>Dati dell\'account</legend>
                                          
                        <p> 
                            <label for="tipologia">Tipologia di account: <abbr title="richiesto">*</abbr></label>
                            <select id="tipologia" name="tipologia">                        
                                <option value="0" '; if($tipologia==0){$echoString .='selected';} $echoString .='>Standard</option>
                                <option value="1" '; if($tipologia==1){$echoString .='selected';} $echoString .='>Administrator</option>
                            </select>
                        </p>
    
                        <p>
                            <label for="email">Email: <abbr title="richiesto">*</abbr></label>
                            <input type="email" placeholder="Inserisci l\'indirizzo email dell\'utente" id="email" name="email" data-validation-mode="email" value="'.$email.'" required>
                        </p>
                               
                        <p>
                            <label for="password">Password: <abbr title="richiesto">*</abbr></label>
                            <input type="password" placeholder="Inserisci la password da assegnare all\'utente" id="password" name="password" data-validation-mode="password" value="" required>
                        </p>
                        
                        <p>
                            <label for="passwordconf">Conferma password: <abbr title="richiesto">*</abbr></label>
                            <input type="password" placeholder="Per conferma inserisci la password da assegnare all\'utente" id="passwordconf" name="passwordconf" data-validation-mode="confermapassword" value="" required>
                        </p>
                        
                        <p>
                            <label for="imgaccount">'.messageUserFormLabelImage().'</label>
                            <input type="file" id="imgaccount" name="imgaccount" data-validation-mode="image" value="">
                        </p>
                        
                    </fieldset>
                    
                    <input type="submit" value="AGGIUNGI" title="Avvia l\'operazione" class="card btn wide text-colored white">
                </form>
            </div>
		</div>
    ';
    return $echoString;
    } 
    
    public static function addUser($connect, $email, $nome, $cognome, $datanascita, $password, $confermaPassword, $tipologia, $immagine, $basePathImg){
     
        $returnArray[0] = 0;   
        $returnArray[1] = array();

        //Inizio Controlli campi
        $error = checkRequireArray(array($email,$nome,$cognome,$password,$confermaPassword));
        if($error[0] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorRequire());
        }
        
        if(checkEmailAvailable($connect, $email) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorEmailAvailable());
        }

        if(checkEmail($email) == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorEmail());
        }

        $error = checkPassword($password,$confermaPassword);
        if($error[1] == 1 || $error[2] == 1 ){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPasswordShort());
        }
        if($error[3] == 1 ){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPasswordConfirm());
        }

        if(checkName($nome) == 1 || checkName($cognome) == 1 ){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorNameSurname());
        }

        $error = checkData($datanascita);
        if($error[2] == 1 || $error[3] == 1){ 
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorData());
        }
        if($error[1] == 1){
            $datanascita = "";
        }

        $error = checkImageProfile($immagine);
        if($error[2] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorImage($error[4]));
        }

        if(!isset($tipologia)){ 
            $tipologia = 0;
        }
        //Fine Controlli campi
            
        if($returnArray[0] == 1)    //Ritorna se sono presenti errori nei campi
            return $returnArray;

            

        $destinazioneFileDB = NULL;
        if($immagine['error'] == 0){
            $destinazioneFileDB = loadImage("userimg", $email, $immagine, 250, 250);
        }

        $sqlQuery = "INSERT INTO utente (email, nome, cognome, datanascita, password, tipologia, immagine) VALUES ('".$email."', '".$nome."', '".$cognome."', '".$datanascita."', '".$password."', '".$tipologia."', ";
        if( $destinazioneFileDB != NULL)
            $sqlQuery .="'".$destinazioneFileDB."'";
        else{
            $sqlQuery .= "NULL";
        }
        $sqlQuery .=") ";
        if($connect->query($sqlQuery)){
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
    
    public static function formUpdateUser($connect, $url, $id, $nome = "", $cognome = "", $datanascita = "", $password = "", $passwordconf = "", $tipologia = "", $error=""){
        $echoString ="";

        if(!isset($id)){ $id = ""; }
        if(!isset($nome)){ $nome = ""; }
        if(!isset($cognome)){ $cognome = ""; }
        if(!isset($datanascita)){ $datanascita = ""; }
        if(!isset($password)){ $password = ""; }
        if(!isset($passwordconf)){ $passwordconf = ""; }
        if(!isset($tipologia)){ $tipologia = ""; }
        if(!isset($error)){ $error = ""; }

        if( $error == ""){
            $sqlQuery = "SELECT * FROM utente WHERE email = '".$id."' ";
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nome = $row["nome"];
                $cognome = $row["cognome"];
                $datanascita = $row["datanascita"];
                $password = $row["password"];
                $passwordconf = $row["password"];
                $tipologia = $row["tipologia"];
            }
        }

        $echoString ='
        <div class="parallax padding-6 form-image">
            
            <header id="header-form" class="content card white wrap-padding">			
                <div id="title-card" class="card">
                    <h1> Modifica un utente </h1>
                </div>
            </header>
            
            <div id="content-form" class="content">';            
            include_once (__DIR__."/../breadcrumb.php");
            $echoString .= breadcrumbAdmin();
            if($error != ""){
                $echoString .= messageErrorForm($error);
            }
            $echoString .='
                <form action="'.$url.'?id=user&sez=update" method="POST" enctype="multipart/form-data" class="card colored wrap-padding" onsubmit="return validateForm(this)">
                    <p>I campi obbligatori sono contrassegnati con <abbr title="richiesto">*</abbr></p>
                    
                    <fieldset>
                        <legend>Dati personali</legend>
                        <p>
                            <label for="nome">Nome: <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il nome dell\'utente" id="nome" name="nome" data-validation-mode="nomi" value="'.$nome.'" required>
                        </p>
                        
                        <p>
                            <label for="cognome">Cognome: <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il cognome dell\'utente" id="cognome" name="cognome" data-validation-mode="nomi" value="'.$cognome.'" required>
                        </p>
                        
                        <p>
                            <label for="datanascita">Data di nascita</label>
                            <input type="date" id="datanascita" name="datanascita" data-validation-mode="datanascita" value="'.$datanascita.'">
                        </p>                            
                    </fieldset>
                                            
                    <fieldset>
                        <legend>Dati dell\'account</legend>
                        <p>
                            <label for="tipologia">Tipologia di account: <abbr title="richiesto">*</abbr></label>
                            <select id="tipologia" name="tipologia">                        
                                <option value="0" '; if($tipologia==0){$echoString .='selected';} $echoString .='>Standard</option>
                                <option value="1" '; if($tipologia==1){$echoString .='selected';} $echoString .='>Administrator</option>
                            </select>
                        </p>

                        <p>
                            <label for="email">Email (non modificabile)</label>
                            <input type="email" placeholder="Inserisci l\'indirizzo email dell\'utente" id="email" name="email" value="'.$id.'" readonly>
                        </p>
                        <p>
                            <label for="password">Password: <abbr title="richiesto">*</abbr></label>
                            <input type="password" placeholder="Inserisci la password da assegnare all\'utente" id="password" name="password" data-validation-mode="password" value="'.$password.'" required>
                        </p>

                        <p>
                            <label for="passwordconf">Conferma password: <abbr title="richiesto">*</abbr></label>
                            <input type="password" placeholder="Per conferma inserisci la password da assegnare all\'utente" id="passwordconf" name="passwordconf" data-validation-mode="confermapassword" value="'.$passwordconf.'" required>
                        </p>

                        <p>
                            <label for="imgaccount">'.messageUserFormLabelImage().'</label>
                            <input type="file" id="imgaccount" name="imgaccount" data-validation-mode="image" value="">
                        </p>

                        <p>
                            <label for="imgaccountremove">Rimozione immagine (non verrà caricata nessuna immagine e l\'immagine attuale verrà rimossa)</label>
                            <input type="checkbox" id="imgaccountremove" name="imgaccountremove" value="true">
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
    
    public static function updateUser($connect, $email, $nome, $cognome, $datanascita, $password, $confermaPassword, $tipologia, $immagine, $removeImage, $basePathImg){
        
        $returnArray[0] = 0;
        $returnArray[1] = array();
        
        //Inizio Controlli campi
        $error = checkRequireArray(array($nome,$cognome,$password,$confermaPassword));
        if($error[0] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorRequire());
        }

        $error = checkPassword($password,$confermaPassword);
        if($error[1] == 1 || $error[2] == 1 ){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPasswordShort());
        }
        if($error[3] == 1 ){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorPasswordConfirm());
        }

        if(checkName($nome) == 1 || checkName($cognome) == 1 ){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorNameSurname());
        }

        $error = checkData($datanascita);
        if($error[2] == 1 || $error[3] == 1){ 
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorData());
        }
        if($error[1] == 1){
            $datanascita = "";
        }

        $error = checkImageProfile($immagine);
        if($error[2] == 1){
            $returnArray[0] = 1;
            array_push($returnArray[1],messageErrorImage($error[4]));
        }
        
        if(!isset($tipologia)){ 
            $tipologia = 0;
        }
        //Fine Controlli campi

        if($returnArray[0] == 1)    //Ritorna se sono presenti errori nei campi
            return $returnArray;
        
        if($removeImage){  
            $sqlQuery = "SELECT immagine FROM utente WHERE email = '".$email."' ";
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {         
                if($row["immagine"]!="" && $row["immagine"]!=NULL){       
                    delImage($basePathImg.$row["immagine"]);
                }
            }
        }

        $destinazioneFileDB = NULL;
        if(!$removeImage && $immagine['error'] == 0){
            $destinazioneFileDB = loadImage("userimg", $email, $immagine, 250, 250);
        }

        $sqlQuery = "UPDATE utente SET nome='".$nome."', cognome='".$cognome."', datanascita='".$datanascita."', password='".$password."' , tipologia='".$tipologia."'";
        if( $destinazioneFileDB != NULL){
            $sqlQuery .= ", immagine='". $destinazioneFileDB."'";
        }
        if($removeImage){
            $sqlQuery .= ", immagine=NULL ";
        }
        $sqlQuery .= "WHERE email='".$email."'";
        
        if( $connect->query($sqlQuery) ){
            $returnArray[2] = messageUpdateConfirm();
        } 
        else {
            $returnArray[0] = 1;
            $returnArray[3] = messageErrorUpdate();
        }

        return $returnArray;
    } 
}
?>