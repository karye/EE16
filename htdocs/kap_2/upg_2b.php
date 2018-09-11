<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
$namn = $_POST["namn"];
$epost = $_POST["epost"];
echo "Hej $namn, vi kommer att kontakta dig snarast per $epost";
?>
</body>

</html>