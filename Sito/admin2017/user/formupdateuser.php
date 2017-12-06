<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    if(isset($_GET['user']) && $_GET['user']!=null){
        $sqlQuery = "SELECT * FROM utente WHERE email = '".$_GET['user']."' ";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row["email"]; ?>" readonly>
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $row["nome"]; ?>">
        
        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome" value="<?php echo $row["cognome"]; ?>">
        
        <label for="datanascita">Data di nascita:</label>
        <input type="date" id="datanascita" name="datanascita" value="<?php echo $row["datanascita"]; ?>">
        
        <label for="password">Nuova password:</label>
        <input type="text" id="password" name="password" value="<?php echo $row["password"]; ?>">
        
        <label for="passwordconf">Conferma nuova password:</label>
        <input type="text" id="passwordconf" name="passwordconf" value="<?php echo $row["password"]; ?>">
        
        <input type="hidden" name="id" value="user">
        <input type="hidden" name="sez"  value="update">

        <input type="submit" value="Modifica" title="Avvia la modifica" />
    </form>
    <?php
        }
    }
    else{
        echo "errore email";
    }
}
else{
    
    header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
    exit();
}
?>