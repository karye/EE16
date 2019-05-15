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

/* Ta emot data */
$anamn = $_POST["anamn"];
$losen = $_POST["losen"];

/* Kontrollera användarnamn och lösenord */
if ( $anamn == 'karim' && $losen == '123' ) {
    echo "<p>$anamn, du är inloggad!</p>";
} else {

    /* Hoppa tillbaka till inloggningsrute */
    header('Location: upg_3_2.php?fel=1');
    die();
}

?>
</body>

</html>