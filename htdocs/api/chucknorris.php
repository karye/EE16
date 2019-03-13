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
    <title>Chuck Norris skämt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $json = file_get_contents("https://api.chucknorris.io/jokes/random");

        /* Avkoda json */
        $jsonData = json_decode($json);

        /* Plocka skämt-delen */
        $joke = $jsonData->value;

        echo "<p>$joke</p>";
    ?>
</body>
</html>