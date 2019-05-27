<?php
/*
* Läser innehållet i en mapp och skapar ett bildgalleri.
* PHP version 7
* @category   Bildgalleri
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista alla filer i en katalog</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bilder från <a href="https://unsplash.com">unsplash.com</a></h1>
        <?php
    /* Ange sökväg till katalogen */
    $sokvag = "./bilder";
    
    /* Skanna katalogen */
    $filer = scandir($sokvag);
    
    foreach ($filer as $fil) {
        if ($fil != '.' && $fil != '..') {
            echo "<div class=\"bild\">\n";
            echo "<img class=\"ram vanster\" src=\"./bilder/$fil\" alt=\"Bild från unsplash.com\">\n";
            echo "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>\n";
            echo "<hr>\n";
            echo "</div>\n";
        }
    }
    echo "</div>\n";
    ?>
    </div>
</body>
</html>