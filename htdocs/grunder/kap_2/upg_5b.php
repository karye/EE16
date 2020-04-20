<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 4</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="kontainer">
        <h1>Svaret</h1>
        <?php
    /* Ta emot data från formuläret */
    $temp = $_POST["temp"];
    $omvandla = $_POST["omvandla"];
    
    /* Beroende på vilken knapp vi tryckt så räknas det om */
    if ($omvandla == 'f2c') {
        $celsius = ($temp - 32) * 5 / 9;
        
        /* Skriv ut resultatet */
        echo "<p>Temperaturen är $celsius i Celsius.</p>";
    } else {
        $farenheit = 9 / 5 * $temp + 32;
        
        /* Skriv ut resultatet */
        echo "<p>Temperaturen är $farenheit i Farenheit.</p>";
    }
    
    ?>
    </div>
</body>

</html>