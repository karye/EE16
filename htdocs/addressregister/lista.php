<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista addresserna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        $allaRader = file("register.txt");
        echo "<table>";
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
    </div>
</body>
</html>