<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hitta ord</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="hitta_ord_b.php" method="post">
        <label for="ruta">Texten: </label>
        <textarea name="texten" id="ruta" cols="30" rows="10"></textarea><br>
        <label for="">Ordet: </label>
        <input type="text" name="ordet"><br>
        <button>Hitta ord</button>
    </form>
</body>
</html>