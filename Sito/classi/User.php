<?php 

class User {
    
    private $email;
    private $nome;
    private $cognome;
    private $datanascita;
    private $password;
    private $tipologia;
    
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

    public static function registrationUser($connect, $email, $nome, $cognome, $datanascita, $password, $confermaPassword, $immagine){
        
           $echoString ="";
             
           $sqlQuery = "SELECT email FROM utente WHERE email = '".$email."' ";
           $result = $connect->query($sqlQuery);
   
           if(
               $result->num_rows == 0 &&
               isset($email) && $email!="" &&
               isset($nome) && $nome!="" &&
               isset($cognome) && $cognome!="" &&
               isset($password) && $password!="" &&
               isset($confermaPassword) &&
               strlen($password) >= 4 &&
               $password==$confermaPassword 
           ){	
               
                if(!isset($datanascita)){ $datanascita = "";}
                
               $destinazioneFileDB = NULL;
               if($immagine['error'] == 0){
                   $destinazioneFileDB = loadImage("userimg", $email, $immagine);
               }
   
               $sqlQuery = "INSERT INTO utente (email, nome, cognome, datanascita, password, tipologia, immagine) VALUES ('".$email."', '".$nome."', '".$cognome."', '".$datanascita."', '".$password."', '0', ";
               if( $destinazioneFileDB != NULL)
                   $sqlQuery .="'".$destinazioneFileDB."'";
               else{
                   $sqlQuery .= "NULL";
               }
               $sqlQuery .=") ";
               if($connect->query($sqlQuery)){
                   $echoString .= "Elemento Aggiunto";
               } 
               else {
                   $echoString = "Elemento NON Aggiunto";
                   if( $destinazioneFileDB != NULL){                           
                       delImage(__DIR__."/../".$destinazioneFileDB); 
                   }
               }
           }
           else{
               $echoString = "Errore campi";
           }    
   
           
           return $echoString;
       } 

    public function formUpdateMyUser($url){
        
        $echoString ='
		
		<header id="header-home" class="parallax padding-6">
			<div class="content">						
				<div id="title-card" class="card">
                    <h1 class="text-colored"> Modifica il tuo account </h1>
                </div>
                
		        <div id="edit">
                    <div class="card colored wrap-padding">
                        <form action="'.$url.'" method="POST">
                            <p><label for="email">Email:</label></p>
                            <input type="email" id="email" name="email" required value="'.$this->getEmail().'" readonly>
                            
                            <p><label for="nome">Nome:</label></p>
                            <input type="text" id="nome" name="nome" required value="'.$this->getNome().'">
                            
                            <p><label for="cognome">Cognome:</label></p>
                            <input type="text" id="cognome" name="cognome" required value="'.$this->getCognome().'">
                            
                            <p><label for="datanascita">Data di nascita:</label></p>
                            <input type="date" id="datanascita" name="datanascita" value="'.$this->getDataNascita().'">
                            
                            <p><label for="password">Password:</label></p>
                            <input type="password" id="password" name="password" required value="'.$this->getPassword().'">
                            
                            <p><label for="passwordconf">Conferma password:</label></p>
                            <input type="password" id="passwordconf" name="passwordconf" required value="'.$this->getPassword().'">
                            
                            <input type="submit" value="MODIFICA" title="Avvia l\'operazione" / class="card btn wide white">
                        </form>
                    </div>
                </div>
			</div>
		</header>
        ';

        return $echoString;
    } 
    
    public function updateMyUser($connect, $nome, $cognome, $datanascita, $password, $confermaPassword){
     
        $echoString ="";
          

        if(
            isset($nome) && $email!="" &&
            isset($cognome) && $email!="" &&
            isset($password) && $email!="" &&
            isset($confermaPassword) &&
            strlen($password) >= 4 &&
            $password==$confermaPassword 
        ){
            
            if(!isset($datanascita)){ $datanascita = "";}

            $sqlQuery = "UPDATE utente SET nome='".$nome."', cognome='".$cognome."', datanascita='".$datanascita."', password='".$password."' WHERE email='".$this->getEmail()."'";
            if( $connect->query($sqlQuery) ){                
                $this->setNome($nome);
                $this->setCognome($cognome);
                $this->setDataNascita($datanascita);
                $this->setPassword($password);
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
    
}
?>