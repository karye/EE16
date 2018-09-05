<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 4</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $celsius = $_POST["celsius"];
        $farenheit = (9/5) * $celsius + 32;
        echo "$celsius grader Celisius motsvarar $farenheit grader Farenheit.";
    ?>
</body>
</html>