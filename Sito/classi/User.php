<?php 
$homepath = substr( $_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
//$homepath = $_SERVER["DOCUMENT_ROOT"];

include_once ($homepath . "/connect.php");

class User {
    
    private $email;
    private $nome;
    private $cognome;
    private $datanascita;
    private $password;
    private $tipologia;
    //protected $connect;
    private $prova;
    //costruttore
    public function __construct($username)
    {        
        $this->setEmail($username);
        $connect = startConnect();
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
        closeConnect($connect);
    }   
    /*public function __destruct()
    {
        closeConnect($this->connect);     
    } */ 
            
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
        //inserire controlli di tipo
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

    public function addCommento($article, $value){

    }
    public function updateCommento($idCommento, $value){

    }

    public static function login($user, $pass, $tipologia){
        $connect = startConnect();
        $status = false;
        if($connect != null){
            $sqlQuery="SELECT * FROM utente WHERE email='".$user."' AND password='".$pass."' AND tipologia='".$tipologia."'";
            $result=$connect->query($sqlQuery);
            if($result->num_rows > 0){
                $status = true;
            }
        }
        $connect->close();
        return $status;
    }
    
    public function formUpdateMyUser($url){
        
        $echoString ='
        <form action="'.$url.'?id=myuser&sez=update" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="'.$this->getEmail().'" readonly>
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="'.$this->getNome().'">
            
            <label for="cognome">Cognome:</label>
            <input type="text" id="cognome" name="cognome" value="'.$this->getCognome().'">
            
            <label for="datanascita">Data di nascita:</label>
            <input type="date" id="datanascita" name="datanascita" value="'.$this->getDataNascita().'">
            
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" value="'.$this->getPassword().'">
            
            <label for="passwordconf">Conferma password:</label>
            <input type="text" id="passwordconf" name="passwordconf" value="'.$this->getPassword().'">

            <input type="submit" value="Aggiungi" title="Avvia l\'operazione" />
        </form>
        ';

        return $echoString;
    } 
    
    public function updateMyUser($nome, $cognome, $datanascita, $password, $confermaPassword){
     
        $echoString ="";
        $connect = startConnect();   

        if(
            isset($nome) &&
            isset($cognome) &&
            isset($datanascita) &&
            isset($password) &&
            isset($confermaPassword) &&
            $password==$confermaPassword /*&&
            bisogna controllare che la data si effettivamente una data
            */
        ){
            $sqlQuery = "UPDATE utente SET nome='".$nome."', cognome='".$cognome."', datanascita='".$datanascita."', password='".$password."' WHERE email='".$this->getEmail()."'";
            if( $connect->query($sqlQuery) ){                
                $this->setNome($nome);
                $this->setCognome($cognome);
                $this->setDataNascita($datanascita);
                $this->setPassword($password);
                echo "Elemento Modificato";
            } 
            else {
                echo "Elemento NON Modificato";
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