<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dagens horoskop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $url = "https://astro.elle.se";

    /* Ladda ned webbsiddan med file_get_contents */
    $sidan = file_get_contents($url);

    /* Leta rätt på början av horoskopet med strpos*/
    $start = strpos($sidan, "Väduren");

    /* Leta rätt på slutet av horoskopet med strpos */
    $slut = strpos($sidan, "post-pagelink");

    /* Plocka ut horoskop-koden med substr */
    $length = $slut - $start;
    $horoskop = substr($sidan, $start, $length);

    /* Skriv horoskopet */
    echo $horoskop;

    ?>
</body>
</html>