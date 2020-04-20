<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mina enkla blogg</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
<div class="kontainer">
    <header>
        <h1>Bloggen</h1>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="blogg.php">Hemsida</a></li>
                <li class="nav-item active"><a class="nav-link" href="skriva.php">Skriva inlägg</a></li>
                <li class="nav-item"><a class="nav-link" href="lasa.php">Läsa inlägg</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="spara.php" method="post">
            <textarea class="form-control" name="inlagg" id="inlagg" cols="30" rows="10"></textarea>
            <button class="btn btn-primary">Spara inlägg</button>
        </form>
    </main>
    <footer>
        2019
    </footer>
    </div>
</body>

</html>