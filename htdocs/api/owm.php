<?php
/*
* PHP version 7
* @category   Övning på api/json
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Väderdata från någon stad</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $api = "22ee1d58f7adae08ee71fa7c0bd24481";
        $json = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=Tokyo&APPID=$api&units=metric");

        print_r($json);

        /* Avkoda json */
        $jsonData = json_decode($json);

        /* Plocka ut koordinaterna */
        $coord = $jsonData->coord;
        $lat = $coord->lat;
        $lon = $coord->lon;

        /* Plocka ut temperaturen just nu */
        $temp = $jsonData->main->temp;

        /* Plocka ut väderikonen */
        $ikon = $jsonData->weather[0]->icon . ".png";
        print_r($ikon);

        echo "<p>Tokyo ligger på latitude $lat och longitude $lon.</p>";
        echo "<p>Temperaturen just nu är $temp&deg; C.</p>";
        echo "<img src=\"https://openweathermap.org/img/w/$ikon\" alt=\"väderbild\">";

    ?>
</body>
</html>