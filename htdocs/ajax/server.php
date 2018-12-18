<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if (isset($_POST["namn"]) && isset($_POST["meddelande"])) {

        /* Spara data i en lokal variabel */
        /* Filtrera bort HTML- och js-kod, som kan vara skadlig */
        $namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
        $meddelande = filter_input(INPUT_POST, "meddelande", FILTER_SANITIZE_STRING);
    
        echo "$namn:$meddelande";
    
    }
    ?>
</body>
</html>