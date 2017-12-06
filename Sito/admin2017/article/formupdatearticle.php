<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    if(isset($_GET['article']) && $_GET['article']!=null){
        $sqlQuery = "SELECT * FROM articolo WHERE id = '".$_GET['article']."' ";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
        <label for="article">Identificativo articolo:</label>
        <input type="number" id="article" name="article" value="<?php echo $row["id"]; ?>" readonly>
        
        <label for="titolo">Titolo:</label>
        <input type="text" id="titolo" name="titolo" value="<?php echo $row["titolo"]; ?>">
        
        <label for="sottotitolo">Sottotitolo:</label>
        <input type="text" id="sottotitolo" name="sottotitolo" value="<?php echo $row["sottotitolo"]; ?>">
        
        <label for="descrizione">Descrizione:</label>
        <input type="text" id="descrizione" name="descrizione" value="<?php echo $row["descrizione"]; ?>">
        
        <label for="eta">Eta in milioni di anni:</label>
        <input type="number" id="eta" name="eta" value="<?php echo $row["eta"]; ?>">
        
        <label for="descrizioneimg">Descrizione immagine:</label>
        <input type="text" id="descrizioneimg" name="descrizioneimg" value="<?php echo $row["descrizioneimg"]; ?>">
        
        <input type="hidden" name="id" value="article">
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