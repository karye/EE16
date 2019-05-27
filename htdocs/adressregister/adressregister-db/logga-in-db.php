<?php
include_once("../../../admin/konfig_db.php");

session_start();
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adressregister</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T5jhQKMh96HMkXwqVMSjF3CmLcL1nT9//tCqu9By5XSdj7CwR0r+F3LTzUdfkkQf" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Adressregister</h1>
            <nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="logga-in-db.php">Logga in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lista-db.php">Lista</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <?php
    /* Kontrollera att POST-variablerna finns, dvs första gången. */
    if (isset($_POST['anamn']) && isset($_POST['losen'])) {
        /* Ta emot data */
        $anamn = filter_input(INPUT_POST, 'anamn', FILTER_SANITIZE_STRING);
        $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);
        
        /* Hämta användarens hash till lösenord från databasen */
        /* Logga in på databasen, och skapa en anslutning */
        $conn = new mysqli($hostname, $user, $password, $databas);
    
        /* Fungerade anslutningen? */
        if ($conn->connect_error) {
            die("Kunde inte ansluta till databasen: " . $conn->connect_error);
        } else {
            /* echo "<p>Anslutningen lyckades!</p>"; */
        }
    
        /* Skapa sql-frågan vi skall köra */
        $sql = "SELECT * FROM admin WHERE anamn = '$anamn';";
        $result = $conn->query($sql);
    
        /* Gick det bra? Kunde SQL-satsen köras? */
        if (!$result) {
            die("Det blev fel med SQL-satsen.");
        } else {
            $rad = $result->fetch_assoc();
            if (password_verify($losen, $rad['hash'])) {
                $_SESSION['anamn'] = $anamn;
                header('Location: registrera-db.php');
            } else {
                 echo "Felaktigt lösenord";
            }
        }
    
        /* Stänger ned anslutningen */
        $conn->close();
    }
        ?>
            <form class="jumbotron" action="#" method="post">
                <label>Användarnamn</label>
                <input class="form-control" type="text" name="anamn">
                <label>Lösenord</label>
                <input class="form-control" type="password" name="losen">
                <button class="btn btn-primary">Logga in</button>
            </form>
        </main>
    </div>
</body>
</html>