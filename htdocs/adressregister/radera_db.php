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
        <h3>Radera person</h3>
        <nav>
            <a href="logga_in_db.php">Logga in</a>
            <a href="registrera_db.php">Registrera</a>
            <a href="lista_db.php">Lista</a>
        </nav>
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
    </div>
</body>
</html>