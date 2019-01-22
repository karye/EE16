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
<?php
/* Kontrollera att data finns innan vi läser av data */
    if (isset($_POST["fnamn"]) && isset($_POST["enamn"]) && isset($_POST["epost"])) {
        /* Läs av data */
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

        /* Lagra data i tabellen */
        /* Skapa sql-frågan vi skall köra */
        $sql = "INSERT INTO personer (fnamn, enamn, epost) VALUES ('$fnamn', '$enamn', '$epost');";
        $result = $conn->query($sql);

        /* Gick det bra? Kunde SQL-satsen köras? */
        if (!$result) {
            die("Det blev fel med SQL-satsen.");
        } else {
            echo "<p>Personen är registrerad!</p>";
        }

        /* Stänger ned anslutningen */
        $conn->close();
    }    
?>
    <div class="kontainer">
        <h3>Registrera person</h3>
        <nav>
            <a href="logga_in_db.php">Logga in</a>
            <a href="registrera_db.php">Registrera</a>
            <a href="lista_db.php">Lista</a>
        </nav>
        <form action="#" method="post">
            <label>Förnamn</label>
            <input name="fnamn" type="text">
            <label>Efternamn</label>
            <input name="enamn" type="text">
            <label>Epost</label>
            <input name="epost" type="email">
            <br><button>Registrera</button>
        </form>
    </div>
</body>
</html>