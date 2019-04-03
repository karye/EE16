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
/* Kontrollera att POST-variablerna finns, dvs första gången. */
if(isset($_POST["anman"]) && isset($_POST["losen"])) { 
    
    /* Ta emot data */
    $anman = $_POST["anamn"];
    $losen = $_POST["losen"];
    
    /* Kontrollera uppgifter */
    if ($anman == "felix" && $losen == "arvidsson") {
        echo "<p>$anman, du är inloggad</p>";
    } else {
        echo "<p>Fel användarnamn eller lösenord. Var god försök igen.</p>";
    }  
}
?>
    <h4>Var vänlig logga in!</h4>
    <form action="upg_3_2c.php" method="post">
        <label>Användarnamn</label><input type="text" name="anamn"><br>
        <label>Lösenord</label><input type="password" name="losen"><br>
        <button>Logga in</button>
    </form>
</body>

</html>