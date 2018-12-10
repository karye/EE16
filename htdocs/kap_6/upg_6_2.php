<?php
/*
* Gör ett formulär där användaren ska fylla i namn, adress, postnr, postort och epostadress.
* Kontrollera att alla fälten är ifyllda, och innehåller minst 3 tecken.
* Kontrollera att postnumret innehåller 5 tecken och att de tecknen endast är siffror.
* Kontrollera sedan att epostadressen innehåller ett @, och minst en punkt.
* Kontrollera också att epostadressen är minst sex tecken lång.
* 
* PHP version 7
* @category   Formulär
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulärcheck</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Chalarangelo/mini.css@v3.0.0/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
/* Kontrollera att data finns */
if (isset($_POST["namn"]) && isset($_POST["adress"]) 
&& isset($_POST["postnr"]) && isset($_POST["postort"])) {
    
    /* Ta emot data */
    $namn = $_POST["namn"];
    $adress = $_POST["adress"];
    $postnr = $_POST["postnr"];
    $postort = $_POST["postort"];
    $fel = 0;

    /* Rensar bort mellanslag */
    $postnr = str_replace($postnr, ' ', '');
    
    /* Kontrollera att alla fälten är ifyllda */
    if (strlen($namn) == 0) {
        echo "<p>Varning tomt: Vg fyll i namnet.</p>";
        $fel++;
    }
    if (strlen($adress) == 0) {
        echo "<p>Varning tomt: Vg fyll i adressen.</p>";
        $fel++;
    }
    if (strlen($postnr) == 0) {
        echo "<p>Varning tomt: Vg fyll i postnr.</p>";
        $fel++;
    }
    if (strlen($postort) == 0) {
        echo "<p>Varning tomt: Vg fyll i postort.</p>";
        $fel++;
    }
    
    /* Kontrollera att alla fälten innehåller minst 3 tecken */
    if (strlen($namn) < 3) {
        echo "<p>Varning för kort: namnet måste vara minst tre tecken långt.</p>";
        $fel++;
    }
    if (strlen($adress) < 3) {
        echo "<p>Varning för kort: adressen måste vara minst tre tecken långt.</p>";
        $fel++;
    }
    if (strlen($postnr) < 3) {
        echo "<p>Varning för kort: postnr måste vara minst tre tecken långt.</p>";
        $fel++;
    }
    if (strlen($postort) < 3) {
        echo "<p>Varning för kort: postort måste vara minst tre tecken långt.</p>";
        $fel++;
    }
    
    /* Kontrollera att postnumret innehåller 5 tecken och att de tecknen endast är siffror */
    if (strlen($postnr) != 5) {
        echo "<p>Varning: Postnr måste vara 5 tecken lånt.</p>";
        $fel++;
    }
    if (!ctype_digit($postnr)) {
        echo "<p>Varning: Postnr får bara innehålla siffror.</p>";
        $fel++;
    }
    
    if ($fel == 0) {
?>
    <form action="#" method="post">
        <label>Namn</label><input type="text" name="namn"><br>
        <label>Gatuadress</label><input type="text" name="adress"><br>
        <label>Postnr</label><input type="text" name="postnr"><br>
        <label>Postort</label><input type="text" name="postort"><br>
        <button>Skicka in</button>
    </form>
<?php
    } else {
?>
    <form action="#" method="post">
        <label>Namn</label><input type="text" name="namn" value="<?php echo $namn ?>"><br>
        <label>Gatuadress</label><input type="text" name="adress" value="<?php echo $address ?>"><br>
        <label>Postnr</label><input type="text" name="postnr" value="<?php echo $postnr ?>"><br>
        <label>Postort</label><input type="text" name="postort" value="<?php echo $postort ?>"><br>
        <button>Skicka in</button>
    </form>
<?php
    }
}
?>

</body>
</html>