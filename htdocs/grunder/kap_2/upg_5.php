<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 4</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="kontainer">
        <h1>Temperaturomvandlaren</h1>
        <form class="kol2" action="upg_5b.php" method="post">
            <label>Temperatur</label><input type="text" name="temp">
            <input type="radio" name="omvandla" value="f2c"> Omvandla från F° till C&deg;
            <input type="radio" name="omvandla" value="c2f"> Omvandla C° till F°
            <button>Omvandla</button>
        </form>
    </div>
</body>

</html>