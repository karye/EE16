<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Addressregister</title>
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

        /* Öppna en textfil */
        $handtag = fopen("register.txt", "a");
        /* Skriv ned data i textfilen */
        fwrite($handtag, "$fnamn $enamn $epost" . PHP_EOL);
        /* Stäng textfilen */
        fclose($handtag);

    }    
?>
    <div class="kontainer">
        <h3>Registrera address</h3>
        <form action="#" method="post">
            <label>Förnamn</label>
            <input name="fnamn" type="text">
            <label>Efternamn</label>
            <input name="enamn" type="text">
            <label>Epost</label>
            <input name="epost" type="email">
            <button>Registrera</button>
        </form>
    </div>
</body>
</html>