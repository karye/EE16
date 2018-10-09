<?php
/* Kolla att man har klickat på knappen 'submit' */
if (isset($_POST['submit'])) {
    $filen =  $_FILES['filen'];
    /* print_r($filen); */

    /* Plocka ut filnamnet */
    $fileName = $filen['name'];
    echo "<p>Filens namn är $fileName</p>";

    /* Plocka ut filtypen */
    $fileType = $filen['type'];
    echo "<p>Filens filtyp är $fileType</p>";

    /* Plocka ut filtypen */
    $fileTempName = $filen['tmp_name'];
    echo "<p>Filens temporära namn är $fileTempName</p>";

    /* Plocka ut filstorleken */
    $fileSize = $filen['size'];
    echo "<p>Filens storlek i byte är $fileSize</p>";

    /* Plocka ut felmeddelande */
    $fileError = $filen['error'];
    echo "<p>Filens felmeddelande är $fileError</p>";

    /* Plocka ut filändelse */
    $fileExt = explode('image/', $fileType);
    echo "<p>Filens filändelse är $fileExt[1]</p>";

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
        echo "<p>Tillåten filtyp</p>";

        /* Nästa steg - blev något fel? */
        if ($fileError == 0) {
            /* Skapa nytt unikt filnamn för att inte skriva filer med samma namn */
            $fileNewName = uniqid('', true) . '.' . $fileExt[1];

            /* Hela sökvägen till den nya filen */
            $fileDestination = "./bilder/$fileNewName";
            echo "<p>$fileDestination</p>";

            /* Flytta filen rätt */
            move_uploaded_file($fileTempName, $fileDestination);
            echo "<p>Uppladdning lyckades!</p>";

            /* Hoppa tillbaka till formuläret */
            header("Location:filuppladdning.php?uploadsuccess");
        } else {
            echo "<p>Något gick fel: $errors[$fileError]</p>";
        }
        
    } else {
        echo "<p>Icke tillåten filtyp!</p>";
    }
    
}