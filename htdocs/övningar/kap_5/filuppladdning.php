<?php
/*
* Ladda upp filer (bilder) i en katalog.
*
* PHP version 7
* @category   Filuppladdning
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filuppladdning</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
/* Kolla att man har klickat på knappen 'submit' */
if (isset($_POST['submit'])) {
    $filen =  $_FILES['filen'];

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
            $fileDestination = "./bilder/$fileNewName";

            /* Flytta filen rätt */
            move_uploaded_file($fileTempName, $fileDestination);
            echo "<p>Uppladdning lyckades!</p>";
        } else {
            echo "<p>Något gick fel: $errors[$fileError]</p>";
        }
        
    } else {
        echo "<p>Icke tillåten filtyp!</p>";
    }
}
?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="filen">
        <button type="submit" name="submit">Ladda upp!</button>
    </form>
</body>
</html>