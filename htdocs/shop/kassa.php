<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kassa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
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

    echo "<p>Antal varor: $antalVaror</p>";
    echo "<p>Total : $total</p>";

    $varor = json_decode($korgen);
    echo "<table>";
    echo "<tr>
            <th>Beskrivning</th>
            <th>Antal</th>
            <th>Summa</th>
        </tr>";
    foreach ($varor as $vara) {
        echo "<tr>";
        echo "<td>$vara->beskrivning</td>";
        echo "<td>$vara->antal</td>";
        echo "<td>$vara->summa kr</td>";
        echo "</tr>";
    }
    echo "</table>";
} 
?>
        </main>
        <footer>
            Karim Ryde 2018
        </footer>
    </div>
</body>
</html>