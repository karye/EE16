<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Läsa inlägg</title>
    <link rel="stylesheet" href="./css/flatly.epic.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include "header.inc"?>
    <main>
<?php
/* Öppna textfilen och läsa innehållet och skriv ut det. */

$allaRader = file("inlaggen.txt");

foreach ($allaRader as $rad) {
    echo $rad . "<br>";
}
?>
    </main>
    <footer>
        Karim Ryde 2018
    </footer>
    </div>
</body>

</html>