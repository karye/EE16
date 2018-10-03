<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista alla filer i en katalog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
/* Ange sökväg till katalogen */
$sokvag = './bilder';

/* Skanna katalogen */
$filer = scandir($sokvag);

echo "<div class=\"kontainer\">\n";
echo "<h1>Bildgalleri</h1>\n";

foreach ($filer as $fil) {
    if ($fil != '.' && $fil != '..') {
        echo "<div class=\"ros\">\n";
        echo "<img class=\"ram vanster\" src=\"./bilder/$fil\" alt=\"Bild från unsplash.com\">\n";
        echo "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>\n";
        echo "<hr>\n";
        echo "</div>\n";
    }
}
echo "</div>\n";
?>
</body>
</html>