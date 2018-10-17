<?php
/*
* Läsa in alla varor och skapa en lista 
* på alla varor.
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
    <title>Alla varor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Alla varor</h1>
            <div id="korg">
                <span id="antalVaror">0</span>
                <span id="korgen">0</span> kr
            </div>
        </header>
        <main>
            <?php
/* Öppna textfilen och läsa in hela innehållet. */
$allaRader = file("beskrivning.txt");

/* Loopa igenom rad-för-rad */
foreach ($allaRader as $rad) {
    
    /* Plocka isär raden i dess beståndsdelar */
    $delar = explode('¤', $rad);
    
    $beskrivning = $delar[0];
    $pris = $delar[1];
    $bild = $delar[2];
    
    /* Skriv info och HTML */
    echo "<div class=\"vara\">\n";
    echo "<img src=\"./varor/$bild\" alt=\"$beskrivning\">\n";
    echo "<p>$beskrivning</p>\n";
    echo "<p>Styckpris: <span id=\"pris\">$pris</span> kr</p>\n";
    echo "<p>Summa: <span id=\"summa\">$pris</span> kr</p>\n";
    
    echo "<table>\n";
    echo "<tr>\n";
    echo "<td id=\"antal\" rowspan=\"2\">1</td>\n";
    echo "<td id=\"plus\">+</td>\n";
    echo "<td id=\"kop\" rowspan=\"2\">KÖP</td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td id=\"minus\">-</td>\n";
    echo "</tr>\n";
    echo "</table>\n";
    
    echo "</div>\n";
}
?>
        </main>
        <footer>
            Karim Ryde 2018
        </footer>
    </div>
    <script src="skript2.js"></script>
</body>
</html>