<?php 
include_once ( "../connect.php");
include_once ( "User.php");

class UserAdmin extends User {

    private $userToUpdate;
    
    public function printListUser($filter){
        $echoString="";
        if(isset($connect)){
            $sqlFilter = "";
            if(isset($filter) && $filter!=null){
                $words = explode(" ",$filter);
                $sqlFilter="WHERE ";
                foreach($words as $value){
                    $sqlFilter .= "nome LIKE '%".$value."%' OR cognome LIKE '%".$value."%' OR email LIKE '%".$value."%' ";
                }
            }
            
            $sqlFilter .= "ORDER BY email, nome, cognome";
            $sqlQuery = "SELECT email, nome, cognome FROM utente ".$sqlFilter;
            $result = $connect->query($sqlQuery);
    
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $echoString +='
                    <div class="third wrap-padding">
                        <div id="" class="card wrap-margin">
                            <div class="padding-medium green-sea">
                                <h1>$row["email"]</h1>
                            </div>
                            <!--<img src="img/immagineprofilo.jpg" alt="immagine profilo utente">-->
                            <div class="padding-medium">
                                <p>
                                    Nome:$row["nome"]<br>
                                    Cognome:$row["cognome"]
                                </p>
                            </div>
                            <div class="center padding-2">
                                <a href="$_SERVER["PHP_SELF"]?id=$_GET["id"]&sez=formupdate&user=$row["email"]" class="btn green-sea"><p> Modifica</p></a>
                                <a href="$_SERVER["PHP_SELF"]?id=$_GET["id"]&sez=delete&user=$row["email"]" class="btn green-sea"><p> Elimina </p></a>
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
        return $echoString;
    }

    
    public function deleteUser($id){
        $echoString = "";
        if($this->getEmail()!=$id)
        if(isset($connect)){
            if(isset($id) && $id!=null){
                $sqlQuery = "DELETE FROM utente WHERE email = '".$id."' ";
                if( $connect->query($sqlQuery) ){
                    $echoString = "Elemento eliminato";
                } 
                else {
                    $echoString = "Elemento NON eliminato";
                }
            }
        }
        else{
            $echoString = "Non ti puoi eliminare";
        }
        return $echoString;
    }
        
}
?>