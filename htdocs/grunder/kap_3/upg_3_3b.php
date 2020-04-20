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
$tal1 = $_POST["tal1"];
$tal2 = $_POST["tal2"];

/* Kontrollera användarnamn och lösenord */
if ( $tal1 < 'tal2' ) {
    for ($i = $tal1 + 1; $i < $tal2; $i++) { 
        echo "$i ";
    }
} else {

    /* Hoppa tillbaka till inloggningsrute */
    header('Location: upg_3_3.php?fel=1');
    die();
}
?>
</body>

</html>