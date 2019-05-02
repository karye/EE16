<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dela upp url</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h2>Dela upp url</h2>
        <p>Mata in en url och få ut domän och land.</p>
        <form class="kol2" action="#" method="post">
            <label>Ange url</label>
            <input type="text" name="url">
            <button>Sök</button>
        </form>
        <?php
/* Kontrollera att data finns innan vi läser av data */
if (isset($_POST["url"])) {
    $delar = explode('://', $_POST["url"]);

    if (sizeof($delar) > 1) {
        $protokoll = $delar[0];
        $doman = $delar[1]; 
    } else {
        $protokoll = "ej funnet";
        $doman = $delar[0];
    }
    
    $delar = explode('.', $doman);
    $land = end($delar);
    echo "<p>För {$_POST["url"]}. Protokollet är <strong>$protokoll</strong> och landskod är <strong>$land</strong>.</p>";
}
?>
    </div>
</body>
</html>