<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Läsa inlägg</title>
    <link rel="stylesheet" href="./css/flatly.epic.css">
</head>
<body>
    <h1>Mina enkla blogg</h1>
    <nav>
        <ul>
            <li><a href="index.php">Hemsida</a></li>
            <li><a href="skriva.php">Skriv inlägg</a></li>
            <li><a href="lasa.php">Läs inlägg</a></li>
        </ul>
    </nav>
<?php
/* Öppna textfilen och
läsa innehållet och skriv ut det. */

$allaRader = file("inlaggen.txt");
echo "<p>";
foreach ($allaRader as $rad) {
    echo $rad . "<br>";
}
echo "</p>";
?>
</body>
</html>
