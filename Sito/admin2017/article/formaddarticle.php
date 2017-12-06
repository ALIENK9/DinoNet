<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
        <label for="titolo">Titolo:</label>
        <input type="text" id="titolo" name="titolo" value="">
        
        <label for="sottotitolo">Sottotitolo:</label>
        <input type="text" id="sottotitolo" name="sottotitolo" value="">
        
        <label for="descrizione">Descrizione:</label>
        <input type="text" id="descrizione" name="descrizione" value="">
        
        <label for="eta">Età di riferimento (in milioni di anni):</label>
        <input type="number" id="eta" name="eta" value="">
        
        <label for="descrizioneimg">Descrizione della immagine:</label>
        <input type="text" id="descrizioneimg" name="descrizioneimg" value="">
        
        <input type="hidden" name="id" value="article">
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