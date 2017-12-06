<?php
if(isset($_SESSION['login']) && $_SESSION['login']!=null){
    if(isset($_GET['nome']) && $_GET['nome']!=null){
        $sqlQuery = "SELECT * FROM dinosauro WHERE nome = '".$_GET['nome']."' ";
        $result = $connect->query($sqlQuery);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $row["nome"]; ?>" readonly>
        
        <label for="peso">Peso in Kg:</label>
        <input type="number" id="peso" name="peso" value="<?php echo $row["peso"]; ?>">

        <label for="altezza">Altezza in cm:</label>
        <input type="number" id="altezza" name="altezza" value="<?php echo $row["altezza"]; ?>">
        
        <label for="lunghezza">Lunghezza in cm:</label>
        <input type="number" id="lunghezza" name="lunghezza" value="<?php echo $row["lunghezza"]; ?>">
        
        <label for="periodomin">Periodo minimo in milioni di anni:</label>
        <input type="number" id="periodomin" name="periodomin" value="<?php echo $row["periodomin"]; ?>">
        
        <label for="periodomax">Periodo massimo in milioni di anni:</label>
        <input type="number" id="periodomax" name="periodomax" value="<?php echo $row["periodomax"]; ?>">
        
        <label for="habitat">Habitat:</label>
        <input type="text" id="habitat" name="habitat" value="<?php echo $row["habitat"]; ?>">
        
        <label for="tipologiaalimentazione1">Carnivoro:</label>
        <input type="radio" id="tipologiaalimentazione1" name="tipologiaalimentazione" value="carnivoro" <?php if($row["tipologiaalimentazione"]=="carnivoro") echo "checked"; ?>>
        
        <label for="tipologiaalimentazione2">Onnivoro:</label>
        <input type="radio" id="tipologiaalimentazione2" name="tipologiaalimentazione" value="onnivoro" <?php if($row["tipologiaalimentazione"]=="onnivoro") echo "checked"; ?>>
        
        <label for="tipologiaalimentazione3">Erbivoro:</label>
        <input type="radio" id="tipologiaalimentazione3" name="tipologiaalimentazione" value="erbivoro" <?php if($row["tipologiaalimentazione"]=="erbivoro") echo "checked"; ?>>
        
        <label for="alimentazione">Alimentazione:</label>
        <input type="text" id="alimentazione" name="alimentazione" value="<?php echo $row["alimentazione"]; ?>">
        
        <label for="descrizioneautore">Descrizione Autore:</label>
        <input type="text" id="descrizioneautore" name="descrizioneautore" value="<?php echo $row["descrizioneautore"]; ?>">
        
        <label for="descrizione">Descrizione:</label>
        <input type="text" id="descrizione" name="descrizione" value="<?php echo $row["descrizione"]; ?>">
        
        <label for="curiosita">Curiosità:</label>
        <input type="text" id="curiosita" name="curiosita" value="<?php echo $row["curiosita"]; ?>">
        
        <input type="hidden" name="id" value="dino">
        <input type="hidden" name="sez"  value="update">

        <input type="submit" value="Aggiungi" title="Avvia l'operazione" />
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