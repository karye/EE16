<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hitta ord</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    /* Ta emot data */
    $texten = $_POST["texten"];
    $sord = $_POST["sord"];
    $nord = $_POST["nord"];

    /* Dela upp texten i en array */
    /* $haystack = str_word_count($texten, 1, 'åäö'); */
    $haystack = explode(' ', $texten);

    $nyText = "";

    /* Sök igenom texten efter ordet */
    foreach ($haystack as $word) {
        if ($word == $sord) {
            $nyText = $nyText . ' ' .$nord;
        } else {
            $nyText = $nyText . ' ' . $word;
        }
    }

    /* Skriv ut resultat */
    echo "<p>Den nya texten blir <em>$nyText</em>.</p>";
    ?>
</body>
</html>