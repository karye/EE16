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

    /* SQL-fråga för att hämta alla dat om användaren */
    $sql = "SELECT * FROM personer WHERE id = '$id'";
    $result = $conn->query($sql);

    /* Gick det bra? Kunde SQL-satsen köras? */
    if (!$result) {
        die("Det blev fel med SQL-satsen.");
    } else {
        $rad = $result->fetch_assoc();
        /* $rad är en array med key: fnamn, enamn, epost */
    }
}
?>
    <div class="kontainer">
        <h3>Redigera person</h3>
        <nav>
            <a href="logga_in_db.php">Logga in</a>
            <a href="registrera_db.php">Registrera</a>
            <a href="lista_db.php">Lista</a>
        </nav>
        <form action="redigera_spara_db.php" method="post">
            <label>Förnamn</label>
            <input name="fnamn" type="text" value="<?php echo $rad['fnamn'] ?>">
            <label>Efternamn</label>
            <input name="enamn" type="text" value="<?php echo $rad['enamn'] ?>">
            <label>Epost</label>
            <input name="epost" type="email" value="<?php echo $rad['epost'] ?>">
            <input name="id" type="hidden" value="<?php echo $rad['id'] ?>">
            <br><button>Uppdatera</button>
        </form>
    </div>
</body>
</html>