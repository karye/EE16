<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skriva inlägg</title>
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
/* Ta emot text från formuläret och
spara ned i en textfil. */

$texten = $_POST["inlagg"];

$handtag = fopen("inlaggen.txt", 'a');
fwrite($handtag, $texten . "\n");

echo "<p>Inlägget har sparats!</p>";

fclose($handtag);
?>
</body>
</html>
