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
                        <div class="daily-dino card">
                            <div class="padding-large colored">
                                <h1>'.$row["email"].'</h1>
                            </div>
                            ';
                            if(isset($row["immagine"])){
                                $echoString .=' <img src="'.$basePathImg.$row["immagine"].'" alt="immagine profilo utente">';
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
                $echoString = "0 risultati";
            }
        }
        
        
        return $echoString;        
    }
    
    public function deleteUser($connect, $id){
        $echoString = "";
           
        if($this->getEmail()!=$id){
            if(isset($connect)){
                if(isset($id)){
                    
                    $sqlQuery = "SELECT immagine FROM utente WHERE email = '".$id."' ";
                    $result = $connect->query($sqlQuery);
                    if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {   
                        if($row["immagine"] != NULL)     
                            delImage(__DIR__."/../".$row["immagine"]);                   

                        $sqlQuery = "DELETE FROM utente WHERE email = '".$id."' ";
                        if( $connect->query($sqlQuery) ){
                            $echoString = "
								<div class='padding-6 content center'>
									<div class='card wrap-padding'>
										<h1>Elemento eliminato!</h1>
										<a href='' class='btn card wrap-margin'> Riprova </a>
									</div>
								</div>							
							";
                        } 
                        else {
                            $echoString = "
								<div class='padding-6 content center'>
									<div class='card wrap-padding'>
										<h1>Elemento NON eliminato</h1>
										<a href='' class='btn card wrap-margin'> Riprova </a>
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
									<a href='' class='btn card wrap-margin'> Riprova </a>
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
						<a href='' class='btn card wrap-margin'> Riprova </a>
					</div>
				</div>
			";
        }       
        return $echoString;
    }

    public static function formAddUser($url){
        $echoString ='
		
		<header id="header-home" class="full-screen parallax">
			<div class="padding-12 content">						
				<div class="card white wrap-padding">
					<h1>Aggiungi un nuovo utente</h1>
				</div>
				<div class="card colored wrap-padding">
					<form action="'.$url.'?id=user&sez=add" method="POST" enctype="multipart/form-data">
                        <p><label for="tipologia">Tipologia utente:</label></p>
                        <select id="tipologia" name="tipologia">                        
                            <option value="0" selected>Standard</option>
                            <option value="1">Administrator</option>
                        </select>

						<p><label for="email">Email:</label></p>
						<input type="email" id="email" name="email" required value="">
						
						<p><label for="nome">Nome:</label></p>
						<input type="text" id="nome" name="nome" required value="">
						
						<p><label for="cognome">Cognome:</label></p>
						<input type="text" id="cognome" name="cognome" required value="">
						
						<p><label for="datanascita">Data di nascita:</label></p>
						<input type="date" id="datanascita" name="datanascita" value="">
						
						<p><label for="password">Password:</label></p>
						<input type="text" id="password" name="password" required value="">
						
						<p><label for="passwordconf">Conferma password:</label></p>
                        <input type="text" id="passwordconf" name="passwordconf" required value="">
                        
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
    
    public static function addUser($connect, $email, $nome, $cognome, $datanascita, $password, $confermaPassword, $tipologia, $immagine){
     
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
            $password==$confermaPassword 
        ){	
            
            if(!isset($datanascita)){ $datanascita = "";}
            if(!isset($tipologia) || $tipologia>1){ $tipologia = 0;}

            $destinazioneFileDB = NULL;
            if($immagine['error'] == 0){
                $destinazioneFileDB = loadImage("userimg", $email, $immagine);
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
						<h1>Elemento aggunto</h1>
						<a href='' class='btn card wrap-margin'> Aggiungine un altro </a>
					</div>
				</div>
				";
            } 
            else {
                $echoString = "
					<div class='padding-6 content'>
						<div class='card wrap-padding'>
							<h1>Elemento NON Aggiunto</h1>
							<a href='' class='btn card wrap-margin'> Riprova </a>
						</div>
					</div>
				";
                if( $destinazioneFileDB != NULL){                           
                    delImage(__DIR__."/../".$destinazioneFileDB); 
                }
            }
        }
        else{
            $echoString = "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Errore campi</h1>
						<a href='' class='btn card wrap-margin'> Riprova </a>
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
			<header id="header-home" class="full-screen parallax">
				<div class="padding-12 content">						
					<div class="card white wrap-padding">
						<h1>Modifica i dati utente</h1>
					</div>
					<div class="card colored wrap-padding">
						<form action="'.$url.'?id=user&sez=update" method="POST" enctype="multipart/form-data">
                            <p><label for="tipologia">Tipologia utente:</label></p>
                            <select id="tipologia" name="tipologia">                        
                                <option value="0" '; if($row["tipologia"]==0){$echoString .='selected';} $echoString .='>Standard</option>
                                <option value="1" '; if($row["tipologia"]==1){$echoString .='selected';} $echoString .='>Administrator</option>
                            </select>

							<p><label for="email">Email:</label></p>
							<input type="email" id="email" name="email" required value="'.$row["email"].'" readonly>
							
							<p><label for="nome">Nome:</label></p>
							<input type="text" id="nome" name="nome" required value="'.$row["nome"].'">
							
							<p><label for="cognome">Cognome:</label></p>
							<input type="text" id="cognome" name="cognome" required value="'.$row["cognome"].'">
							
							<p><label for="datanascita">Data di nascita:</label></p>
							<input type="date" id="datanascita" name="datanascita" value="'.$row["datanascita"].'">
							
							<p><label for="password">Password:</label></p>
							<input type="text" id="password" name="password" required value="'.$row["password"].'">
							
							<p><label for="passwordconf">Conferma password:</label></p>
                            <input type="text" id="passwordconf" name="passwordconf" required value="'.$row["password"].'">
                            
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
			$echoString = "
				<div class='padding-6 content center'>
					<div class='card wrap-padding'>
						<h1>Utente non presente</h1>
						<a href='' class='btn card wrap-margin'> Riprova </a>
					</div>
				</div>							
			";
        }  
        
        return $echoString;
    } 
    
    public static function updateUser($connect, $email, $nome, $cognome, $datanascita, $password, $confermaPassword, $tipologia, $immagine, $removeImage){
     
        $echoString ="";
          

        if(
            isset($email) && $email!="" &&
            isset($nome) && $nome!="" &&
            isset($cognome) && $cognome!="" &&
            isset($password) && $password!="" &&
            isset($confermaPassword) &&
            $password==$confermaPassword 
        ){
                        
            if(!isset($datanascita)){ $datanascita = "";}
            if(!isset($tipologia) || $tipologia>1){ $tipologia = 0;}

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

            $sqlQuery = "UPDATE utente SET nome='".$nome."', cognome='".$cognome."', datanascita='".$datanascita."', password='".$password."' , tipologia='".$tipologia."'";
            if( $destinazioneFileDB != NULL){
                $sqlQuery .= ", immagine='". $destinazioneFileDB."'";
            }
            if($removeImage){
                $sqlQuery .= ", immagine=NULL ";
            }
            $sqlQuery .= "WHERE email='".$email."'";
            
            if( $connect->query($sqlQuery) ){
				$echoString = "
					<div class='padding-6 content center'>
						<div class='card wrap-padding'>
							<h1>Elemento modificato!</h1>
							<a href='' class='btn card wrap-margin'> Modificane un altro </a>
						</div>
					</div>							
				";
            } 
            else {
				$echoString = "
					<div class='padding-6 content center'>
						<div class='card wrap-padding'>
							<h1>Elemento non modificato</h1>
							<a href='' class='btn card wrap-margin'> Riprova </a>
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
						<a href='' class='btn card wrap-margin'> Riprova </a>
					</div>
				</div>							
			";
        }    

        
        return $echoString;
    } 
}
?>