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
                        <a class="nav-link active" href="registrera-db.php">Registrera</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lista-db.php">Lista</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <?php
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
    
                /* Logga in på databasen, och skapa en anslutning */
                $conn = new mysqli($hostname, $user, $password, $databas);
    
                /* Fungerade anslutningen? */
                if ($conn->connect_error) {
                    die("Kunde inte ansluta till databasen: " . $conn->connect_error);
                } else {
                    /* echo "<p>Anslutningen lyckades!</p>"; */
                }
    
                /* SQL-satsen för att radera en rad */
                $sql = "DELETE FROM personer WHERE id = '$id'";
                $result = $conn->query($sql);
    
                /* Gick det bra? Kunde SQL-satsen köras? */
                if (!$result) {
                    die("Det blev fel med SQL-satsen.");
                } else {
                    echo "<p>Personen med id=$id har raderats!</p>";
                }
                
            } else {
                echo "<p>Något blev galet! Id saknas.</p>";
            }
            ?>
        </main>
    </div>
</body>
</html>