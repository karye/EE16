<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mina enkla blogg</title>
    <link rel="stylesheet" href="./css/flatly.epic.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include "header.inc"?>
    <main>
        <form action="spara.php" method="post">
            <label for="inlagg">Inlägg</label>
            <textarea class="form-control" name="inlagg" id="inlagg" cols="30" rows="10"></textarea>
            <button class="btn btn-primary">Spara inlägg</button>
        </form>
    </main>
    <footer>
        Karim Ryde 2018
    </footer>
    </div>
</body>

</html>