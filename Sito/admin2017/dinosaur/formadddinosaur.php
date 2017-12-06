<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
        ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="">
        
        <label for="peso">Peso in Kg:</label>
        <input type="number" id="peso" name="peso" value="">

        <label for="altezza">Altezza in cm:</label>
        <input type="number" id="altezza" name="altezza" value="">
        
        <label for="lunghezza">Lunghezza in cm:</label>
        <input type="number" id="lunghezza" name="lunghezza" value="">
        
        <label for="periodomin">Periodo minimo in milioni di anni:</label>
        <input type="number" id="periodomin" name="periodomin" value="">
        
        <label for="periodomax">Periodo massimo in milioni di anni:</label>
        <input type="number" id="periodomax" name="periodomax" value="">
        
        <label for="habitat">Habitat:</label>
        <input type="text" id="habitat" name="habitat" value="">
        
        <label for="tipologiaalimentazione1">Carnivoro:</label>
        <input type="radio" id="tipologiaalimentazione1" name="tipologiaalimentazione" value="carnivoro" checked>
        
        <label for="tipologiaalimentazione2">Onnivoro:</label>
        <input type="radio" id="tipologiaalimentazione2" name="tipologiaalimentazione" value="onnivoro">
        
        <label for="tipologiaalimentazione3">Erbivoro:</label>
        <input type="radio" id="tipologiaalimentazione3" name="tipologiaalimentazione" value="erbivoro">
        
        <label for="alimentazione">Alimentazione:</label>
        <input type="text" id="alimentazione" name="alimentazione" value="">
        
        <label for="descrizioneautore">Descrizione Autore:</label>
        <input type="text" id="descrizioneautore" name="descrizioneautore" value="">
        
        <label for="descrizione">Descrizione:</label>
        <input type="text" id="descrizione" name="descrizione" value="">
        
        <label for="curiosita">Curiosità:</label>
        <input type="text" id="curiosita" name="curiosita" value="">
        
        <input type="hidden" name="id" value="dino">
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