<?php
include_once "../../../admin/konfig_db.php";

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
    
    echo "<table class=\"table table-striped\">";
    echo "<tr>
    <th>Förnamn</th>
    <th>Efternamn</th>
    <th colspan=\"3\">Epost</th>
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
        echo "<td><a class=\"btn btn-outline-danger\" href=\"radera-verifiera-db.php?id={$rad['id']}\">Radera</a>
        </td>";
        
        /* Skapa knapp för att redigera raden */
        echo "<td><a class=\"btn btn-outline-warning\" href=\"redigera-db.php?id={$rad['id']}\">Redigera</a></td>";
        
        echo "</tr>";
    }
    echo "</table>";
    
    $conn->close();
    ?>
        </main>
    </div>
</body>
</html>