<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dagens horoskop</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="horoskop">
    <div class="kontainer">
        <h1>Horoskopet från <a href="https://astro.elle.se/">astro.elle.se</a></h1>
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
    </div>
</body>
</html>