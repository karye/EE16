<?php
/*
* Ladda upp varor i en katalog,
* samt spara info i textfil.
*
* PHP version 7
* @category   Webbshop
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<?php
session_start();
if (!isset($_SESSION['anamn'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filuppladdning</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer nyVara">
        <header>
            <h1>Shopsmart</h1>
            <nav>
                <?php
if (!isset($_SESSION['anamn'])) {
    echo "<a href=\"./login.php\">Logga in</a>";
} else {
    echo "<a href=\"./logout.php\">Logga ut</a>";
}
?>
                <a href="./ny_vara.php">Ny vara</a>
                <a href="./lista_vara.php">Handla</a>
            </nav>
            <h2>Ny vara</h2>
        </header>
        <main>
            <?php
/* Kolla att man har klickat på knappen 'submit' */
if (isset($_POST['submit'])) {
    
    /* Ta emot data */
    $filen =  $_FILES['filen'];
    $beskrivning = filter_input(INPUT_POST, 'beskrivning', FILTER_SANITIZE_STRING);
    $pris = filter_input(INPUT_POST, 'pris', FILTER_SANITIZE_STRING);
    
    /* Kolla att man inte matar in tomma värden */
    if ($filen && $beskrivning && $pris) {
        /* Ladda upp bilden */
        /* Plocka ut filnamnet */
        $fileName = $filen['name'];
        
        /* Plocka ut filtypen */
        $fileType = $filen['type'];
        
        /* Plocka ut filtypen */
        $fileTempName = $filen['tmp_name'];
        
        /* Plocka ut filstorleken */
        $fileSize = $filen['size'];
        
        /* Plocka ut felmeddelande */
        $fileError = $filen['error'];
        
        /* Plocka ut filändelse */
        $fileExt = explode('image/', $fileType);
        
        /* Tillåtna filtyper att laddat upp */
        $allowedType = ['jpeg', 'png', 'gif', 'pdf'];
        
        /* Felmeddelanden */
        $errors = array(
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
            3 => 'The uploaded file was only partially uploaded.',
            4 => 'No file was uploaded.',
            6 => 'Missing a temporary folder.',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
        );
        
        /* Är filen tillåten att ladda upp? */
        if (in_array($fileExt[1], $allowedType)) {
            
            /* Nästa steg - blev något fel? */
            if ($fileError == 0) {
                /* Skapa nytt unikt filnamn för att inte skriva filer med samma namn */
                $fileNewName = uniqid('', true) . '.' . $fileExt[1];
                
                /* Hela sökvägen till den nya filen */
                $fileDestination = "./varor/$fileNewName";
                
                /* Flytta filen rätt */
                move_uploaded_file($fileTempName, $fileDestination);
                echo "<p>Uppladdning lyckades!</p>";
            } else {
                echo "<p>Något gick fel: $errors[$fileError]</p>";
            }
            
        } else {
            echo "<p>Icke tillåten filtyp!</p>";
        }
        /* Uppladdning slutförd */
        /* Spara texten: beskrivning, pris, bildens nya namn */
        $handtag = fopen('beskrivning.txt', 'a');
        fwrite($handtag, $beskrivning . '¤' . $pris . '¤' . $fileNewName . PHP_EOL);
        fclose($handtag);
    } else {
        echo "<p>Var god fyll i alla fält</p>";
    }
}
?>
            <form action="#" method="post" enctype="multipart/form-data">
                <label>Beskrivning</label><input type="text" name="beskrivning"><br>
                <label>Pris</label><input type="text" name="pris"><br>
                <label>Bild på vara</label>
                <label class="valjFil" for="laddaUpp">
                    <i class="fas fa-file-upload"></i> Välj bild</label>
                <input id="laddaUpp" type="file" name="filen"><br>
                <button type="submit" name="submit">Registrera vara!</button>
            </form>
        </main>
        <footer>
            En enkel webbshop 2018
        </footer>
    </div>
</body>
</html>