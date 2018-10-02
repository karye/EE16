<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tre slumpvalda ordspråk</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$allaOrdsprak[] = "Att skiljas är att dö en smula";
$allaOrdsprak[] = "Borta bra, men hemma bäst";
$allaOrdsprak[] = "Det är mänskligt att fela";
$allaOrdsprak[] = "Ett gott skratt förlänger livet";
$allaOrdsprak[] = "Ingenting är nytt under solen";
$allaOrdsprak[] = "Ju fler kockar desto sämre soppa";
$allaOrdsprak[] = "Kasta inte pärlor åt svinen";
$allaOrdsprak[] = "Lärdom är mer värt än guld";
$allaOrdsprak[] = "Små grytor har också öron";
$allaOrdsprak[] = "Var ska sleven vara om inte i gröten";

/* Skriv ut en array med allt innehåll */
// print_r( $allaOrdsprak );

/* Antalet positioner i en array */
echo "<h3>Antalet positioner i en array</h3>";
$antalOrdsprak = count($allaOrdsprak);
echo "<p>Jag har $antalOrdsprak positioner i min array.";

/* Skriv ut alla ordspråk i arrayen */
echo "<h3>Skriv ut alla ordspråk i arrayen</h3>";
foreach ($allaOrdsprak as $ordsprak) {
    echo "<p>$ordsprak</p>";
}

/* Skriv ut 3 ordspråk tex 0, 1, 2 */
echo "<h3>Skriv ut 3 ordspråk tex 0, 1, 2</h3>";
for ($i = 0; $i < 3; $i++) { 
    echo "<p>$allaOrdsprak[$i]</p>";
}

/* Skriv alla ordspråk med en for-loop */
echo "<h3>Skriv alla ordspråk med en for-loop</h3>";
for ($i = 0; $i < $antalOrdsprak; $i++) { 
    echo "<p>$allaOrdsprak[$i]</p>";
}

/* Slumpa fram 3 OLIKa ordspråk */
echo "<h3>Slumpa fram 3 OLIKA ordspråk</h3>";
/* Skapa en tom array som ska innehålla alla slumptal */
$allaSlumptal = [];
for ($i = 0; $i < 3; $i++) {
    
    /* Slumpa tre olika slumptal */
    do {
        /* Slumpa fram ett tal */
        $slumptal = rand(0, 9);
    } while (in_array($slumptal, $allaSlumptal));

    /* Spara slumptalet */
    $allaSlumptal[] = $slumptal;
    
    /* Skriv ut ordspråket */
    echo "<p>$allaOrdsprak[$slumptal]</p>";
}
?>
</body>
</html>