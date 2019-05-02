<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plocka ut namn ur epost</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h2>Plocka ut namn ur epost</h2>
        <p>Mata in en skolmejladress och få ut namn.</p>
        <form class="kol2" action="#" method="post">
            <label>Ange skolmejl</label>
            <input type="text" name="skolmejl">
            <button>Sök</button>
        </form>
        <?php
/* Kontrollera att data finns innan vi läser av data */
if (isset($_POST["skolmejl"])) {
    $delar = explode('@', $_POST["skolmejl"]);
    $namn = $delar[0];
    $delar = explode('.', $namn);
    $fornamn = $delar[0];
    $efternamn = $delar[1];
    echo "<p>Hej, ditt förnamn är <strong>$fornamn</strong>, och efternamn <strong>$efternamn</strong></p>";
}
?>
    </div>
</body>
</html>