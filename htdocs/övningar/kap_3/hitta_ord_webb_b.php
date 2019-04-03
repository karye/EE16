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

    /* Fritextsökning */
    $nyaSidan = str_replace($sordet, $nordet, $gamlaSidan);

    file_put_contents("test.html", $nyaSidan);
    ?>
</body>

</html>