<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Räkna antal ord i en text</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    /* Ta emot data */
    $texten = $_POST["texten"];

    /* Räkna antal ord */
    $antal = str_word_count($texten);

    /* Skriv svar med resultat */
    echo "<p>Texten innehåller $antal ord.</p>";
    ?>
</body>
</html>