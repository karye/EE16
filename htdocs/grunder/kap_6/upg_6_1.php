<?php
/*
* Gör ett formulär där användaren ska fylla i namn, adress, postnr och postort.
* Kontrollera att alla fälten är ifyllda, och innehåller minst 3 tecken.
* Kontrollera att postnumret innehåller 5 tecken och att de tecknen endast är siffror.
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
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.0/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
    /* Kontrollera att data finns */
    if (isset($_POST["namn"]) && isset($_POST["adress"]) 
    && isset($_POST["postnr"]) && isset($_POST["postort"])) {
        
        /* Ta emot data */
        $namn = $_POST["namn"];
        $adress = $_POST["adress"];
        $postnr = $_POST["postnr"];
        $postort = $_POST["postort"];
        
        /* Kontrollera att alla fälten är ifyllda */
        if (strlen($namn) == 0) {
            echo "<p>Varning tomt: Vg fyll i namnet.</p>";
        }
        if (strlen($adress) == 0) {
            echo "<p>Varning tomt: Vg fyll i adressen.</p>";
        }
        if (strlen($postnr) == 0) {
            echo "<p>Varning tomt: Vg fyll i postnr.</p>";
        }
        if (strlen($postort) == 0) {
            echo "<p>Varning tomt: Vg fyll i postort.</p>";
        }
        
        /* Kontrollera att alla fälten innehåller minst 3 tecken */
        if (strlen($namn) < 3) {
            echo "<p>Varning för kort: namnet måste vara minst tre tecken långt.</p>";
        }
        if (strlen($adress) < 3) {
            echo "<p>Varning för kort: adressen måste vara minst tre tecken långt.</p>";
        }
        if (strlen($postnr) < 3) {
            echo "<p>Varning för kort: postnr måste vara minst tre tecken långt.</p>";
        }
        if (strlen($postort) < 3) {
            echo "<p>Varning för kort: postort måste vara minst tre tecken långt.</p>";
        }
        
        /* Kontrollera att postnumret innehåller 5 tecken och att de tecknen endast är siffror */
        if (strlen($postnr) != 5) {
            echo "<p>Varning: Postnr måste vara 5 tecken lånt.</p>";
        }
        if (!ctype_digit($postnr)) {
            echo "<p>Varning: Postnr får bara innehålla siffror.</p>";
        }
        
    }
    /* Formuläret för att mata in namn, adress, postnr och postort */
    ?>
        <form action="#" method="post">
            <label>Namn</label><input type="text" name="namn"><br>
            <label>Gatuadress</label><input type="text" name="adress"><br>
            <label>Postnr</label><input type="text" name="postnr"><br>
            <label>Postort</label><input type="text" name="postort"><br>
            <button>Skicka in</button>
        </form>
    </div>
</body>
</html>