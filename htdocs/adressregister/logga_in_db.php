<?php
include_once("../../admin/konfig_db.php");

session_start();
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adressregister</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h3>Inloggning</h3>
        <nav>
            <a href="logga_in_db.php">Logga in</a>
            <a href="registrera_db.php">Registrera</a>
            <a href="lista_db.php">Lista</a>
        </nav>
        <?php
/* Kontrollera att POST-variablerna finns, dvs första gången. */
if (isset($_POST['anamn']) && isset($_POST['losen'])) {
    /* Ta emot data */
    $anamn = filter_input(INPUT_POST, 'anamn', FILTER_SANITIZE_STRING);
    $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);
    
    /* Hämta användarens lösenord från databasen */

    /* Kontrollerar om lösenord är ok */
    if (password_verify($losen, $hashFil)) {
        /* Success! */
        $_SESSION['anamn'] = $anamn;
        header('Location: lista_db.php');
        exit;
    }
}
    ?>
        <form action="#" method="post">
            <label>Användarnamn</label><input type="text" name="anamn"><br>
            <label>Lösenord</label><input type="password" name="losen"><br>
            <button>Logga in</button>
        </form>
    </div>
</body>
</html>