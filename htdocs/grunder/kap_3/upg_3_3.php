<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inloggning</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
/* Kolla att get-variabeln finns */
if (isset($_GET['fel'])) {
    $fel = $_GET['fel'];
    if ($fel == 1) {
        echo "<p>Tal 1 skall vara mindre än tal 2. Vg försök igen!</p>";
    }
}

?>
    <form action="upg_3_3b.php" method="post">
        <label for="">Tal 1</label>
        <input type="text" name="tal1"><br>
        <label for="">Tal 2</label>
        <input type="password" name="tal2"><br>
        <button>Skriv ut</button>
    </form>
</body>
</html>