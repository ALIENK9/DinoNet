<?php 

include_once (__DIR__."/User.php");

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
									<img class="profile-pic" src="'.$basePathImg.$row["immagine"].'" alt="immagine profilo utente">
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
                $echoString = " 
                <div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Nessun risultato</h1>
					</div>
                </div>
                ";
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
                            $echoString = "
								<div class='padding-6 content center'>
									<div class='card wrap-padding'>
										<h1>Elemento eliminato!</h1>
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
                    else{
                        $echoString = "
							<div class='padding-6 content center'>
								<div class='card wrap-padding'>
									<h1>Elemento NON eliminabile</h1>
								</div>
							</div>						
						";
                    }
                }
            }
        }
        else{
            $echoString = "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Non ti puoi eliminare</h1>
					</div>
				</div>
			";
        }       
        return $echoString;
    }

    public static function formAddUser($url){
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
            $echoString .='
                <?php include_once(\'../breadcrumb.php\') ?>
                <form action="'.$url.'?id=user&sez=add" method="POST" enctype="multipart/form-data" class="card colored wrap-padding" onsubmit="return validateForm(this)">
                    <p>I campi obbligatori sono contrassegnati con <abbr title="richiesto">*</abbr></p>
                    <p> 
                        <label for="tipologia">Tipologia utente: <abbr title="richiesto">*</abbr></label>
                        <select id="tipologia" name="tipologia">                        
                            <option value="0" selected>Standard</option>
                            <option value="1">Administrator</option>
                        </select>
                    </p>

                    <p>
                        <label for="email">Email: <abbr title="richiesto">*</abbr></label>
                        <input type="email" placeholder="Inserisci l\'indirizzo email dell\'utente" id="email" name="email" data-validation-mode="email" value="" required>
                    </p>
                    
                    <p>
                        <label for="nome">Nome: <abbr title="richiesto">*</abbr></label>
                        <input type="text" placeholder="Inserisci il nome dell\'utente" id="nome" name="nome" data-validation-mode="nomi" value="" required>
                    </p>
                    
                    <p>
                        <label for="cognome">Cognome: <abbr title="richiesto">*</abbr></label>
                        <input type="text" placeholder="Inserisci il cognome dell\'utente" id="cognome" name="cognome" data-validation-mode="nomi" value="" required>
                    </p>
                    
                    <p>
                        <label for="datanascita">Data di nascita (formato: gg/mm/aaaa)</label>
                        <input type="date" id="datanascita" name="datanascita" data-validation-mode="datanascita" value="">
                    </p>
                    
                    <p>
                        <label for="password">Password: <abbr title="richiesto">*</abbr></label>
                        <input type="text" placeholder="Inserisci la password da assegnare all\'utente" id="password" name="password" data-validation-mode="password" value="" required>
                    </p>
                    
                    <p>
                        <label for="passwordconf">Conferma password: <abbr title="richiesto">*</abbr></label>
                        <input type="text" placeholder="Per conferma inserisci la password da assegnare all\'utente" id="passwordconf" name="passwordconf" data-validation-mode="confermapassword" value="" required>
                    </p>
                    
                    <p>
                        <label for="imgaccount">Immagine profilo (il file deve avere una dimensione di 250px per 250px e il formato deve essere png, jpg o jpeg):</label>
                        <input type="file" id="imgaccount" name="imgaccount" data-validation-mode="image" value="">
                    </p>
                    
                    <input type="submit" value="AGGIUNGI" title="Avvia l\'operazione" class="card btn wide text-colored white">
                </form>
            </div>
		</div>
    ';
    return $echoString;
    } 
    
    public static function addUser($connect, $email, $nome, $cognome, $datanascita, $password, $confermaPassword, $tipologia, $immagine, $basePathImg){
     
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
            if(!isset($tipologia) || $tipologia>1){ $tipologia = 0;}

            $destinazioneFileDB = NULL;
            if($immagine['error'] == 0){
                $destinazioneFileDB = loadImage("userimg", $email, $immagine, 250, 250);
                if($destinazioneFileDB==NULL){
                    $echoString .= "
                        <div class='padding-6 content center'>
                            <div class='card wrap-padding'>
                                <h1>Immagine non confrome alle richieste. L'operazione proseguirà senza immagine, ma potrai modificarla dal tuo profilo.</h1>
                            </div>
                        </div>
                        ";
                }
            }

            $sqlQuery = "INSERT INTO utente (email, nome, cognome, datanascita, password, tipologia, immagine) VALUES ('".$email."', '".$nome."', '".$cognome."', '".$datanascita."', '".$password."', '".$tipologia."', ";
            if( $destinazioneFileDB != NULL)
                $sqlQuery .="'".$destinazioneFileDB."'";
            else{
                $sqlQuery .= "NULL";
            }
            $sqlQuery .=") ";
            if($connect->query($sqlQuery)){
                $echoString .= "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Elemento aggiunto</h1>
						<a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Aggiungine un altro </a>
					</div>
				</div>
				";
            } 
            else {
                $echoString = "
					<div class='padding-6 content'>
						<div class='card wrap-padding'>
							<h1>Elemento NON aggiunto</h1>
							<a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Riprova </a>
						</div>
					</div>
				";
                if( $destinazioneFileDB != NULL){                           
                    delImage($basePathImg.$destinazioneFileDB); 
                }
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
    
    public static function formUpdateUser($connect, $url, $id){
        $echoString ="";
        
        $sqlQuery = "SELECT * FROM utente WHERE email = '".$id."' ";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
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
                $echoString .='
                    <form action="'.$url.'?id=user&sez=update" method="POST" enctype="multipart/form-data" class="card colored wrap-padding" onsubmit="return validateForm(this)">
                        <p>I campi obbligatori sono contrassegnati con <abbr title="richiesto">*</abbr></p>
                        <p>
                            <label for="tipologia">Tipologia utente: <abbr title="richiesto">*</abbr></label>
                            <select id="tipologia" name="tipologia">                        
                                <option value="0" '; if($row["tipologia"]==0){$echoString .='selected';} $echoString .='>Standard</option>
                                <option value="1" '; if($row["tipologia"]==1){$echoString .='selected';} $echoString .='>Administrator</option>
                            </select>
                        </p>

                        <p>
                            <label for="email">Email (non modificabile)</label>
                            <input type="email" placeholder="Inserisci l\'indirizzo email dell\'utente" id="email" name="email" value="'.$row["email"].'" readonly>
                        </p>
                        
                        <p>
                            <label for="nome">Nome: <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il nome dell\'utente" id="nome" name="nome" data-validation-mode="nomi" value="'.$row["nome"].'" required>
                        </p>
                        
                        <p>
                            <label for="cognome">Cognome: <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci il cognome dell\'utente" id="cognome" name="cognome" data-validation-mode="nomi" value="'.$row["cognome"].'" required>
                        </p>
                        
                        <p>
                            <label for="datanascita">Data di nascita</label>
                            <input type="date" id="datanascita" name="datanascita" data-validation-mode="datanascita" value="'.$row["datanascita"].'">
                        </p>
                        
                        <p>
                            <label for="password">Password: <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Inserisci la password da assegnare all\'utente" id="password" name="password" data-validation-mode="password" value="'.$row["password"].'" required>
                        </p>

                        <p>
                            <label for="passwordconf">Conferma password: <abbr title="richiesto">*</abbr></label>
                            <input type="text" placeholder="Per conferma inserisci la password da assegnare all\'utente" id="passwordconf" name="passwordconf" data-validation-mode="confermapassword" value="'.$row["password"].'" required>
                        </p>

                        <p>
                            <label for="imgaccount">Immagine profilo (il file deve avere una dimensione di 250px per 250px e il formato deve essere png, jpg o jpeg):</label>
                            <input type="file" id="imgaccount" name="imgaccount" data-validation-mode="image" value="">
                        </p>

                        <p>
                            <label for="imgaccountremove">Rimozione immagine (non verrà caricata nessuna immagine e l\'immagine attuale verrà rimossa)</label>
                            <input type="checkbox" id="imgaccountremove" name="imgaccountremove" value="true">
                        </p>

                        <input type="submit" value="MODIFICA" title="Avvia l\'operazione" class="card btn wide text-colored white">
                    </form>
                </div>
            </div>
        ';
        }  
        else{
			$echoString = "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Utente non presente</h1>
						<a href=\"".$_SERVER["HTTP_REFERER"]."\" class='btn card wrap-margin'> Indietro </a>
					</div>
				</div>							
			";
        }  
        
        return $echoString;
    } 
    
    public static function updateUser($connect, $email, $nome, $cognome, $datanascita, $password, $confermaPassword, $tipologia, $immagine, $removeImage, $basePathImg){
     
        $echoString ="";
          

        if(
            isset($email) && $email!="" &&
            isset($nome) && $nome!="" &&
            isset($cognome) && $cognome!="" &&
            isset($password) && $password!="" &&
            isset($confermaPassword) &&
            strlen($password) >= 4 &&
            $password==$confermaPassword 
        ){
                        
            if(!isset($datanascita)){ $datanascita = "";}
            if(!isset($tipologia) || $tipologia>1){ $tipologia = 0;}

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

            $sqlQuery = "UPDATE utente SET nome='".$nome."', cognome='".$cognome."', datanascita='".$datanascita."', password='".$password."' , tipologia='".$tipologia."'";
            if( $destinazioneFileDB != NULL){
                $sqlQuery .= ", immagine='". $destinazioneFileDB."'";
            }
            if($removeImage){
                $sqlQuery .= ", immagine=NULL ";
            }
            $sqlQuery .= "WHERE email='".$email."'";
            
            if( $connect->query($sqlQuery) ){
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
}
?>