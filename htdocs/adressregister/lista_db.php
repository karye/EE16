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
        <h3>Lista alla personer</h3>
        <nav>
            <a href="logga_in_db.php">Logga in</a>
            <a href="registrera_db.php">Registrera</a>
            <a href="lista_db.php">Lista</a>
        </nav>
        <?php

        /* Logga in på databasen, och skapa en anslutning */
        $conn = new mysqli($hostname, $user, $password, $databas);

        /* Fungerade anslutningen? */
        if ($conn->connect_error) {
            die("Kunde inte ansluta till databasen: " . $conn->connect_error);
        } else {
            /* echo "<p>Anslutningen lyckades!</p>"; */
        }

        /* Skapa SQL-frågan */
        $sql = "SELECT * FROM personer";
        $result = $conn->query($sql);

        /* Gick det bra? Kunde SQL-satsen köras? */
        if (!$result) {
            die("Något blev fel med SQL-satsen.");
        } else {
            /* echo "<p>Personernas data kunde hämtas!</p>"; */
        }

        echo "<table>";
        echo "<tr>
                <th>Förnamn</th>
                <th>Efternamn</th> 
                <th>Epost</th>
              </tr>";
        
        /* Skriv resultatet rad för rad */
        while ($rad = $result->fetch_assoc()) {
            echo "<tr>";

            /* Skriv ut förnamnet inom en cell */
            echo "<td>{$rad['fnamn']}</td>";
            /* Skriv ut efternamnet inom en cell */
            echo "<td>{$rad['enamn']}</td>";
            /* Skriv ut epost inom en cell */
            echo "<td>{$rad['epost']}</td>";

            /* Skapa knapp för att radera raden */
            echo "<td><a href=\"radera_verifiera_db.php?id={$rad['id']}\">Radera</a>
            </td>";

            /* Skapa knapp för att redigera raden */
            echo "<td><a href=\"redigera_db.php\">Redigera</a></td>";

            echo "</tr>";
        }
        echo "</table>";

        $conn->close();
        ?>
    </div>
</body>
</html>