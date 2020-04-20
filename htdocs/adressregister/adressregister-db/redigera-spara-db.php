<?php
include_once("../../../admin/konfig_db.php");

session_start();
if (!isset($_SESSION['anamn'])) {
    header('Location: logga-in-db.php');
    exit;
}
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
                        <a class="nav-link" href="logga-in-db.php">Logga in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrera-db.php">Registrera</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="lista-db.php">Lista</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <?php
    /* Kontrollera att data finns innan vi läser av data */
    if (isset($_POST["id"]) && isset($_POST["fnamn"]) && isset($_POST["enamn"]) && isset($_POST["epost"])) {
        /* Läs av data */
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        $fnamn = filter_input(INPUT_POST, "fnamn", FILTER_SANITIZE_STRING);
        $enamn = filter_input(INPUT_POST, "enamn", FILTER_SANITIZE_STRING);
        $epost = filter_input(INPUT_POST, "epost", FILTER_SANITIZE_STRING);
    
        /* Logga in på databasen, och skapa en anslutning */
        $conn = new mysqli($hostname, $user, $password, $databas);
    
        /* Fungerade anslutningen? */
        if ($conn->connect_error) {
            die("Kunde inte ansluta till databasen: " . $conn->connect_error);
        } else {
            /* echo "<p>Anslutningen lyckades!</p>"; */
        }
    
        /* Skapa sql-frågan vi skall köra */
        $sql = "UPDATE personer SET fnamn = '$fnamn', enamn = '$enamn', epost = '$epost' WHERE id = '$id'";
        $result = $conn->query($sql);
    
        /* Gick det bra? Kunde SQL-satsen köras? */
        if (!$result) {
            die("Det blev fel med SQL-satsen.");
        } else {
            echo "<p class=\"alert alert-dismissible alert-success\">Uppdateringen lyckades!</p>";
        }
    }
    ?>
        </main>
    </div>
</body>
</html>