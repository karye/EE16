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
        echo "<p>Fel användarnamn eller lösenord. Vg försök igen!</p>";
    }
}

?>
    <p>Var vänlig logga in!</p>
    <form action="upg_3_2b.php" method="post">
        <label for="">Användarnamn</label>
        <input type="text" name="anamn"><br>
        <label for="">Lösenord</label>
        <input type="password" name="losen"><br>
        <button>Logga in</button>
    </form>
</body>
</html>