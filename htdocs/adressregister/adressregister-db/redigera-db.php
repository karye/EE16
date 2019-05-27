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
        <main>
            <form class="jumbotron" action="redigera-spara-db.php" method="post">
                <label>Förnamn</label>
                <input class="form-control" name="fnamn" type="text" value="<?php echo $rad['fnamn'] ?>">
                <label>Efternamn</label>
                <input class="form-control" name="enamn" type="text" value="<?php echo $rad['enamn'] ?>">
                <label>Epost</label>
                <input class="form-control" name="epost" type="email" value="<?php echo $rad['epost'] ?>">
                <input name="id" type="hidden" value="<?php echo $rad['id'] ?>">
                <button class="btn btn-warning">Uppdatera</button>
            </form>
        </main>
    </div>
</body>
</html>