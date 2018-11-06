<?php
/*
* Listar alla varor i kassan.
*
* PHP version 7
* @category   Webbshop
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kassa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer kassa">
        <header>
            <h1>Kassan</h1>
        </header>
        <main>
            <?php

/* Kontrollera att data finns */
if (isset($_POST["antalVaror"]) && 
    isset($_POST["total"]) && 
    isset($_POST["korgen"])) {

    /* Ta emot data */
    $antalVaror = $_POST["antalVaror"];
    $total = $_POST["total"];
    $korgen = $_POST["korgen"];

    $varor = json_decode($korgen);
    echo "<table>";
    echo "<tr>
            <th>Vara</th>
            <th>Antal</th>
            <th>Pris</th>
            <th>Summa</th>
        </tr>";
    foreach ($varor as $vara) {
        echo "<tr>";
        echo "<td>$vara->beskrivning</td>";
        echo "<td>$vara->antal</td>";
        echo "<td>$vara->pris</td>";
        echo "<td>$vara->summa kr</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<div class=\"total\">";
    echo "<p>Antal varor: $antalVaror</p>";
    echo "<p>Totalsumma : $total</p>";
    echo "</div>";
} 
?>
        </main>
        <footer>
            En enkel webbshop
        </footer>
    </div>
</body>
</html>