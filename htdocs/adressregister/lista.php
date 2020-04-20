<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista addresserna</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T5jhQKMh96HMkXwqVMSjF3CmLcL1nT9//tCqu9By5XSdj7CwR0r+F3LTzUdfkkQf" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Adressregister</h1>
            <nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="registrera.php">Registrera adresser</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="lista.php">Lista adresser</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <?php
            /* Läs in textfilen */
            $allaRader = file("register.txt");
            
            echo "<table class=\"table table-striped\">";
            echo "<tr>
                    <th>Förnamn</th>
                    <th>Efternamn</th> 
                    <th>Epost</th>
                  </tr>";
            foreach ($allaRader as $rad) {
                echo "<tr>";
    
                /* Dela upp raden i dess delar */
                $delar = explode(" ", $rad);
                /* Skriv ut förnamnet inom en cell */
                echo "<td>$delar[0]</td>";
                /* Skriv ut efternamnet inom en cell */
                echo "<td>$delar[1]</td>";
                /* Skriv ut epost inom en cell */
                echo "<td>$delar[2]</td>";
    
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </main>
    </div>
</body>
</html>