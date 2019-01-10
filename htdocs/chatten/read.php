<?php
/* Läser in alla rader */
/* echo file_get_contents("chatt.txt"); */

/* Läsa in alla rader i en array */
$allaRader = file("chatt.txt");
$antalRader = count($allaRader);
$maxRader = 10;

if ($antalRader < $maxRader) {
    $maxRader = $antalRader;
}

/* Skriv de sista raderna */
for ($i = $antalRader - $maxRader; $i < $antalRader; $i++) { 
    echo $allaRader[$i];
}