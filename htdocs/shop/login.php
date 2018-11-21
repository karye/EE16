<?php
session_start();
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inloggning</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer login">
        <header>
            <h1>Shopsmart</h1>
            <nav>
            <?php
if (!isset($_SESSION['anamn'])) {
    echo "<a href=\"./login.php\">Logga in</a>";
} else {
    echo "<a href=\"./logout.php\">Logga ut</a>";
}
?>
                <a href="./ny_vara.php">Ny vara</a>
                <a href="./lista_vara.php">Handla</a>
            </nav>
            <h2>Inloggning</h2>
        </header>
        <main>
            <?php
/* Kontrollera att POST-variablerna finns, dvs första gången. */
if (isset($_POST['anamn']) && isset($_POST['losen'])) {
    /* Ta emot data */
    $anamn = filter_input(INPUT_POST, 'anamn', FILTER_SANITIZE_STRING);
    $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);

    /* Läs in admin.txt */
    $allaRader = file($_SERVER['DOCUMENT_ROOT'] . '/../config/admin.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    /* Loopa igenom rad-för-rad */
    foreach ($allaRader as $rad) {
        
        /* Plocka isär raden i dess beståndsdelar */
        $delar = explode('¤', $rad);
        
        /* Om raden inte innehåller två delar, hoppa över den */
        if (sizeof($delar) != 2) {
            continue;
        }

        /* Plocka ut användarnamnet och hashet */
        $anamnFil = $delar[0];
        $hashFil = $delar[1];

        /* Hitta användarnamnet och sen jämför hashen */
        if ($anamn == $anamnFil) {
            if (password_verify($losen, $hashFil)) {
                /* Success! */
                $_SESSION['anamn'] = $anamn;
                header('Location: ny_vara.php');
                exit;
            } else {
                echo "<p>Fel lösenord</p>";
            }
        } else {
            echo "<p>Fel användarnamn</p>";
        }
    }
}
?>
            <form action="#" method="post">
                <label>Användarnamn</label><input type="text" name="anamn"><br>
                <label>Lösenord</label><input type="password" name="losen"><br>
                <button>Logga in</button>
            </form>
        </main>
        <footer>
            En enkel webbshop 2018
        </footer>
    </div>
</body>
</html>