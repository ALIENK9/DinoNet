<?php 

include_once (__DIR__."/../loadFile.php");

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

    public function formUpdateMyUser($url){
        
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
            $echoString .='
                <form action="'.$url.'" method="POST" enctype="multipart/form-data" class="card colored wrap-padding" onsubmit="return validateForm(this)">
                    <p>I campi obbligatori sono contrassegnati con <abbr title="richiesto">*</abbr></p>
                    <p>
                        <label for="email">Email (non modificabile)</label>
                        <input type="email" placeholder="Inserisci la tua email" id="email" name="email" data-validation-mode="email" value="'.$this->getEmail().'" readonly>
                    </p>
                    
                    <p>
                        <label for="nome">Nome: <abbr title="richiesto">*</abbr></label>
                        <input type="text" placeholder="Inserisci il tuo nome" id="nome" name="nome" data-validation-mode="nomi" value="'.$this->getNome().'" required >
                    </p>
                    
                    <p>
                        <label for="cognome">Cognome: <abbr title="richiesto">*</abbr></label>
                        <input type="text" placeholder="Inserisci il tuo cognome" id="cognome" name="cognome" data-validation-mode="nomi" value="'.$this->getCognome().'" required>
                    </p>
                    
                    <p>
                        <label for="datanascita">Data di nascita</label>
                        <input type="date" id="datanascita" name="datanascita" data-validation-mode="datanascita" value="'.$this->getDataNascita().'">
                    </p>
                    
                    <p>
                        <label for="password">Password: <abbr title="richiesto">*</abbr></label>
                        <input type="password" placeholder="Inserisci una password" id="password" name="password" data-validation-mode="password" value="'.$this->getPassword().'" required>
                    </p>
                    
                    <p>
                        <label for="passwordconf">Conferma password: <abbr title="richiesto">*</abbr></label>
                        <input type="password" placeholder="Per conferma inserisci la password" id="passwordconf" name="passwordconf" data-validation-mode="confermapassword" value="'.$this->getPassword().'" required>
                    </p>

                    <p>
                        <label for="imgaccount">Immagine profilo (il file deve avere una dimensione di 250px per 250px e il formato deve essere png, jpg o jpeg):</label>
                        <input type="file" id="imgaccount" name="imgaccount" value="">
                    </p>
    
                    <p>
                        <label for="imgaccountremove">Rimozione immagine (non verrà caricata nessuna immagine e l\'immagine attuale verrà rimossa)</label>
                        <input type="checkbox" id="imgaccountremove" name="imgaccountremove" value="true">
                    </p>
                    
                    <input type="submit" value="MODIFICA" title="Avvia l\'operazione" class="wrap-margin card btn text-colored wide white">
                </form>
            </div>
            
        </div>
        ';

        return $echoString;
    } 
    
    public function updateMyUser($connect, $nome, $cognome, $datanascita, $password, $confermaPassword, $immagine, $removeImage, $basePathImg){
     
        $echoString ="";
          

        if(
            isset($nome) && $nome!="" &&
            isset($cognome) && $cognome!="" &&
            isset($password) && $password!="" &&
            isset($confermaPassword) &&
            strlen($password) >= 4 &&
            $password==$confermaPassword 
        ){
            
            if(!isset($datanascita)){ $datanascita = "";}

            if($removeImage){  
                $sqlQuery = "SELECT immagine FROM utente WHERE email = '".$email."' ";
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
                if($destinazioneFileDB==NULL){
                    $echoString .= "
                        <div class='padding-6 content center'>
                            <div class='card wrap-padding'>
                                <h1>Immagine non confrome alle richieste. L'operazione proseguirà senza immagine.</h1>
                            </div>
                        </div>
                        ";
                }
            }
            

            $sqlQuery = "UPDATE utente SET nome='".$nome."', cognome='".$cognome."', datanascita='".$datanascita."', password='".$password."'";
            if( $destinazioneFileDB != NULL){
                $sqlQuery .= ", immagine='". $destinazioneFileDB."'";
            }
            if($removeImage){
                $sqlQuery .= ", immagine=NULL ";
            }
            $sqlQuery .= "WHERE email='".$this->getEmail()."'";
            if( $connect->query($sqlQuery) ){                
                $this->setNome($nome);
                $this->setCognome($cognome);
                $this->setDataNascita($datanascita);
                $this->setPassword($password);
                $this->setUrlImmagine($destinazioneFileDB);
				$echoString .= "
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
    
    public function registerMyUser($connect, $email, $nome, $cognome, $datanascita, $password, $confermaPassword, $immagine, $basePathImg){ 
           $echoString ="";
           
           $sqlQuery = "SELECT email FROM utente WHERE email = '".$email."' ";
           $result = $connect->query($sqlQuery); 
           if($result->num_rows > 0){ $echoString .= "Email non disponibile <br>";}

           if(!isset($password) || strlen($password) < 4) { $echoString .= "La password deve essere lunga almeno 4 caratteri <br>";}
           if(!isset($password) || !isset($confermaPassword) || $password!=$confermaPassword){ $echoString .= "Le password non coincidono <br>";}
           if(!isset($email) || $email=="" || !isset($nome) || $nome=="" || !isset($cognome) || $cognome=="" || $password == ""){    $echoString .= "I campi email, nome, cognome e password sono obbligatori";}
           if(!preg_match("/^[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i", $email)){$echoString .= "Formato email non valido <br>";}
           if(!preg_match("/^([A-z]+[.,;\-\"'()\s]*)*$/i", $nome)){$echoString .= "Formato nome errato: può contenere solo lettere <br>";}
           if(!preg_match("/^([A-z]+[.,;\-\"'()\s]*)*$/i", $cognome)){$echoString .= "Formato cognome errato: può contenere solo lettere <br>";}
           $anno=0;
           if(isset($datanascita) && !(false === strtotime($datanascita)))
                list($anno, $mese, $giorno) = explode('-', $datanascita); 
           if(!isset($datanascita) || $anno<1900 || $mese==0 || $mese>12 || $giorno==0 || $giorno>31){ $datanascita = "";}

           if($echoString == ""){

                $destinazioneFileDB = NULL;
                if($immagine['error'] == 0){
                    $destinazioneFileDB = loadImage("userimg", $email, $immagine, 250, 250);
                    if($destinazioneFileDB == NULL){
                        $echoString .= "Errore immagine ";
                    }
                } 

                $sqlQuery = "INSERT INTO utente (email, nome, cognome, datanascita, password, immagine) VALUES ('".$email."', '".$nome."', '".$cognome."', '".$datanascita."', '".$password."', ";
                if( $destinazioneFileDB != NULL)
                    $sqlQuery .="'".$destinazioneFileDB."'";
                else{
                    $sqlQuery .= "NULL";
                }
                $sqlQuery .=") ";

                if($connect->query($sqlQuery)){
                    $echoString .= "Utente registrato";
               } 
               else {
                   $echoString .= "Utente non registrato";

                    if( $destinazioneFileDB != NULL){                           
                        delImage($basePathImg.$destinazioneFileDB); 
                    }
               }
           }  
   
           
           return $echoString;
       } 
       
       public function deleteUserForce($connect, $basePathImg){
           $echoString = "";
               
           if(isset($connect)){
                if($this->getUrlImmagine() != NULL) 
                    delImage($basePathImg.$this->getUrlImmagine());                   

                $sqlQuery = "DELETE FROM utente WHERE email = '".$this->getEmail()."' ";
                if( $connect->query($sqlQuery) ){
                    $echoString = "
                        <div class='padding-6 content center'>
                            <div class='card wrap-padding'>
                                <h1>Elemento eliminato!</h1>
								<a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Torna indietro </a>
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
           return $echoString;
       }
}
?>