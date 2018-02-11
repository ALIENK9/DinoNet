<?php 

include_once (__DIR__."/../loadFile.php");
include_once (__DIR__ . "/../message.php");
include_once (__DIR__."/../validate.php");

class User {
    
    private $email;
    private $nome;
    private $cognome;
    private $datanascita;
    private $password;
    private $tipologia;
    private $urlImmagine;
    
    private $prova;
    //costruttore
    public function __construct($connect, $username)
    {        
        $this->setEmail($username);
        if($connect != null){
            $sqlQuery="SELECT * FROM utente WHERE email='".$username."'";
            $result=$connect->query($sqlQuery);
            if($result->num_rows > 0){
                if($row = $result->fetch_assoc()) {
                    $this->nome = $row['nome'];
                    $this->cognome = $row['cognome'];
                    $this->datanascita = $row['datanascita'];
                    $this->password = $row['password'];
                    $this->tipologia = $row['tipologia'];
                    $this->urlImmagine = $row['immagine'];
                }
            }
        }
        
    }   
    //metodi
    public function getEmail() {
        return $this->email;
    }       
    public function getNome() {
        return $this->nome;
    }       
    public function getCognome() {
        return $this->cognome;
    }       
    public function getDataNascita() {
        return $this->datanascita;
    }       
    public function getPassword() {
        return $this->password;
    }       
    public function getTipologia() {
        return $this->tipologia;
    }         
    public function getUrlImmagine() {
        return $this->urlImmagine;
    }    
    
    
    public function setEmail($value) {
        $this->email = $value;
    }       
    public function setNome($value) {
        $this->nome = $value;
    }       
    public function setCognome($value) {
        $this->cognome = $value;
    }       
    public function setDataNascita($value) {
        $this->datanascita = $value;
    }       
    public function setPassword($value) {
        $this->password = $value;
    }       
    public function setTipologia($value) {
        $this->tipologia = $value;
    }       
    public function setUrlImmagine($value) {
        $this->urlImmagine = $value;
    }  

    public static function login($connect, $user, $pass, $tipologia){
        $status = false;
        if($connect != null){
            $sqlQuery="SELECT * FROM utente WHERE email='".$user."' AND password='".$pass."' AND tipologia >='".$tipologia."'";
            $result=$connect->query($sqlQuery);
            if($result->num_rows > 0){
                $status = true;
            }
        }
        return $status;
    }

    public function formUpdateMyUser($url, $nome = "", $cognome = "", $datanascita = "", $password = "", $passwordconf = "", $error=""){
        
        if(!isset($nome)){ $nome = ""; }
        if(!isset($cognome)){ $cognome = ""; }
        if(!isset($datanascita)){ $datanascita = ""; }
        if(!isset($password)){ $password = ""; }
        if(!isset($passwordconf)){ $passwordconf = ""; }
        if(!isset($error)){ $error = ""; }

        if( $error == ""){
            $nome =$this->getNome();
            $cognome = $this->getCognome();
            $datanascita = $this->getDataNascita();
            $password = $this->getPassword();
            $passwordconf = $this->getPassword();            
        }

        $echoString ='
		
		<div class="parallax padding-6 form-image">
		
		    <header id="header-form" class="content card white wrap-padding">			
				<div id="title-card" class="card">
                    <h1> Modifica il tuo account </h1>
                </div>
            </header>
                
            <div id="content-form" class="content"> <!-id="edit"-->';            
            include_once (__DIR__."/../breadcrumb.php");
            $echoString .= breadcrumbAdmin();
            if($error != ""){
                $echoString .= messageErrorForm($error);
            }
            $echoString .='
                <form action="'.$url.'" method="POST" enctype="multipart/form-data" class="card colored wrap-padding" onsubmit="return validateForm(this)">
                    <p>I campi obbligatori sono contrassegnati con <abbr title="richiesto">*</abbr></p>
                    <fieldset>
                        <legend>Dati personali</legend>
                        <p>
                            <label for="nome">Nome (non sono consentiti numeri): <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il tuo nome" id="nome" name="nome" data-validation-mode="nomi" value="'. $nome.'" required >
                        </p>
                        
                        <p>
                            <label for="cognome">Cognome (non sono consentiti numeri): <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il tuo cognome" id="cognome" name="cognome" data-validation-mode="nomi" value="'.$cognome.'" required>
                        </p>
                        
                        <p>
                            <label for="datanascita">Data di nascita (formato: gg/mm/aaaa):</label>
                            <input type="date" id="datanascita" name="datanascita" data-validation-mode="datanascita" value="'.$datanascita.'">
                        </p>  
                    </fieldset>    
                    
                    <fieldset>
                        <legend>Dati di accesso</legend>
                        <p>
                            <label for="email">Email (non modificabile)</label>
                            <input type="email" placeholder="Inserisci la tua email" id="email" name="email" data-validation-mode="email" value="'.$this->getEmail().'" readonly>
                        </p>
                        
                        <p>
                            <label for="password">Password: <abbr title="richiesto">*</abbr></label>
                            <input type="password" placeholder="Inserisci una password" id="password" name="password" data-validation-mode="password" value="'.$password.'" required>
                        </p>
                        
                        <p>
                            <label for="passwordconf">Conferma password: <abbr title="richiesto">*</abbr></label>
                            <input type="password" placeholder="Per conferma inserisci la password" id="passwordconf" name="passwordconf" data-validation-mode="confermapassword" value="'.$passwordconf.'" required>
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
                                        
                    <input type="submit" value="MODIFICA" title="Avvia l\'operazione" class="wrap-margin card btn text-colored wide white">
                </form>
            </div>
        </div>
        <script type="text/javascript">disableInputImmagine();</script>
        ';

        return $echoString;
    } 
    
    public function updateMyUser($connect, $nome, $cognome, $datanascita, $password, $confermaPassword, $immagine, $removeImage, $basePathImg){
     
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
        //Fine Controlli campi

        if($returnArray[0] == 1)    //Ritorna se sono presenti errori nei campi
            return $returnArray;

        if($removeImage){  
            $sqlQuery = "SELECT immagine FROM utente WHERE email = '".$this->getEmail()."' ";
            $result = $connect->query($sqlQuery);
            if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {         
                if($row["immagine"]!="" && $row["immagine"]!=NULL){     
                    delImage($basePathImg.$row["immagine"]);
                }
            }
        }

        $destinazioneFileDB = $this->getUrlImmagine();
        if(!$removeImage && $immagine['error'] == 0){
            $destinazioneFileDB = loadImage("userimg", $this->getEmail(), $immagine, 250, 250);
        }
            

        $sqlQuery = "UPDATE utente SET nome='".$nome."', cognome='".$cognome."', datanascita='".$datanascita."', password='".$password."'";
        if( $destinazioneFileDB != NULL){
            $sqlQuery .= ", immagine='". $destinazioneFileDB."'";
        }
        if($removeImage || $destinazioneFileDB == NULL){
            $sqlQuery .= ", immagine=NULL ";
        }
        $sqlQuery .= "WHERE email='".$this->getEmail()."'";
        if( $connect->query($sqlQuery) ){                
            $this->setNome($nome);
            $this->setCognome($cognome);
            $this->setDataNascita($datanascita);
            $this->setPassword($password);
            $this->setUrlImmagine($destinazioneFileDB);
            $returnArray[2] = messageUserUpdateConfirm();
        } 
        else {            
            $returnArray[0] = 1;
            $returnArray[3] = messageUserErrorUpdate();
        }
                
        return $returnArray;
    } 
    
    public static function registerMyUser($connect, $email, $nome, $cognome, $datanascita, $password, $confermaPassword, $immagine, $basePathImg){
           
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
            array_push($returnArray[1], messageErrorImage($error[4]));
        }
        //Fine Controlli campi


        if($returnArray[0] == 1)    //Ritorna se sono presenti errori nei campi
            return $returnArray;


        $destinazioneFileDB = NULL;
        if($immagine['error'] == 0){
            $destinazioneFileDB = loadImage("userimg", $email, $immagine, 250, 250);
        } 

        $sqlQuery = "INSERT INTO utente (email, nome, cognome, datanascita, password, immagine) VALUES ('".$email."', '".$nome."', '".$cognome."', '".$datanascita."', '".$password."', ";
        if( $destinazioneFileDB != NULL)
            $sqlQuery .="'".$destinazioneFileDB."'";
        else{
            $sqlQuery .= "NULL";
        }
        $sqlQuery .=") ";

        if($connect->query($sqlQuery)){
            $returnArray[2] = messageUserAddConfirm();
        } 
        else {
            $returnArray[0] = 1;
            $returnArray[3] = messageErrorUserAdd();

            if( $destinazioneFileDB != NULL){                           
                delImage($basePathImg.$destinazioneFileDB); 
            }
        }
            
   
        return $returnArray;
    } 
       
       public function deleteUserForce($connect, $basePathImg){
           $echoString = "";
               
           if(isset($connect)){
                if($this->getUrlImmagine() != NULL) 
                    delImage($basePathImg.$this->getUrlImmagine());                   

                $sqlQuery = "DELETE FROM utente WHERE email = '".$this->getEmail()."' ";
                if( $connect->query($sqlQuery) ){
                    $echoString = messageBack(messageDeleteConfirm()); 
                } 
                else {
                    $echoString = messageTryAgain(messageErrorDelete()); 
                }
           }           
           return $echoString;
       }
}
?>