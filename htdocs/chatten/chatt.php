<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chatten</title>
    <link rel="stylesheet" href="chatt.css">
</head>
<body>
    <?php
    $namn = "";
    if (isset($_POST["namn"]) && isset($_POST["meddelande"])) {

        /* Hämtade och sanerade data */
        $namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
        $meddelande = filter_input(INPUT_POST, "meddelande", FILTER_SANITIZE_STRING);

        /* Skriv ned meddelandet i en textfil, format: tid namn: meddelande */
        $tid = date("h:i");
        $handtag = fopen("chatt.txt", "a");
        fwrite($handtag, "$tid $namn: $meddelande" . PHP_EOL);
        fclose($handtag);

    } else {
        echo "<p>Det funkade inte</p>";
    }
    ?>
    <div class="kontainer">
        <h1><?php
        echo $_SERVER['SERVER_NAME'] . " " . $_SERVER['SERVER_ADDR'];
        ?></h1>
        <form action="#" method="post">
            <label>Namn</label>
            <input type="text" name="namn" id="namn" placeholder="Ditt namn..." value="<?php echo $namn; ?>">
            <textarea id="chatt" cols="30" rows="25" readonly></textarea>
            <input type="text" name="meddelande" id="meddelande" placeholder="Ditt meddelande...">
            <button>Skicka</button>
        </form>
    </div>
    <script src="chatt.js"></script>
</body>
</html>