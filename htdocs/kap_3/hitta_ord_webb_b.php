<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hitta ord på en webbsida</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    /* Ta emot data */
    $url = $_POST["url"];
    $sordet = $_POST["sordet"];
    $nordet = $_POST["nordet"];

    /* Läs in webbsidan */
    $gamlaSidan = file_get_contents($url);
    $nyaSidan = "";
    $antal = -1;
    $start = 0;
    $slut = 1;

    /* Fritextsökning */
    while ($slut != false) {
        /* Hitta position av ordet i texten */
        $slut = stripos($gamlaSidan, $sordet, $start + 1);

        /* Plocka ut textdelen framför hittade ordet */
        $nyaSidan = $nyaSidan . substr($gamlaSidan, $start, $slut ) . $nordet;
        $start = $slut + strlen($sordet);

        $antal++;
    }

    file_put_contents("test.html", $nyaSidan);

    /* Skriv ut resultat */
    echo "<p>Vi har hittat <strong>$sordet</strong> $antal gånger i webbsidan.</p>";
    ?>
</body>

</html>