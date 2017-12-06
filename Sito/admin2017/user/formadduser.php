<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
?>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="">
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="">
        
        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome" value="">
        
        <label for="datanascita">Data di nascita:</label>
        <input type="date" id="datanascita" name="datanascita" value="">
        
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" value="">
        
        <label for="passwordconf">Conferma password:</label>
        <input type="text" id="passwordconf" name="passwordconf" value="">
        
        <input type="hidden" name="id" value="user">
        <input type="hidden" name="sez"  value="add">

        <input type="submit" value="Aggiungi" title="Avvia l'operazione" />
    </form>
<?php
}
else{
    
    header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
    exit();
}
?>