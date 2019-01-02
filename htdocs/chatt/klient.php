<?php
/*
* PHP version 7
* @category   Lånekalkylator
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chatt</title>
    <link rel="stylesheet" href="chatt.css">
</head>
<body>
    <?php
if (isset($_POST["namn"]) && isset($_POST["meddelande"])) {
    
    /* Spara data i en lokal variabel */
    /* Filtrera bort HTML- och js-kod, som kan vara skadlig */
    $namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
    $meddelande = filter_input(INPUT_POST, "meddelande", FILTER_SANITIZE_STRING);
    
    /* Skriv senaste meddelandet */
    if (!empty($namn) && !empty($meddelande)) {
        $handtag = fopen("chatt.txt", "a+");
        $rad = date("H:i") . " $namn: $meddelande" . PHP_EOL;
        fwrite($handtag, $rad);
        fclose($handtag);
    }
} else {
    echo "<p>Ett fel uppstod!</p>";
}
?>
    <form class="kontainer" action="#" method="POST">
        <label>Namn</label>
        <input id="namn" type="text" name="namn" placeholder="Ditt namn..." <?php 
if (!empty($namn)) {
    echo "value=\"$namn\"";
}
?>>
        <textarea id="chatt" readonly><?php
echo file_get_contents("chatt.txt");
?></textarea>
        <input id="meddelande" type="text" name="meddelande" placeholder="Ditt meddelande..">
        <button>Skicka</button>
    </form>
    <script src="klient.js"></script>
</body>
</html>