<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Addressregister</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T5jhQKMh96HMkXwqVMSjF3CmLcL1nT9//tCqu9By5XSdj7CwR0r+F3LTzUdfkkQf" crossorigin="anonymous">
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
    <header>
            <h1>Adressregister</h1>
            <nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="registrera.php">Registrera adresser</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lista.php">Lista adresser</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <form class="jumbotron" action="#" method="post">
                <label>Förnamn</label>
                <input class="form-control" name="fnamn" type="text">
                <label>Efternamn</label>
                <input class="form-control" name="enamn" type="text">
                <label>Epost</label>
                <input class="form-control" name="epost" type="email">
                <button class="btn btn-primary">Registrera</button>
            </form>
        </main>
    </div>
</body>
</html>