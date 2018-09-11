<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
$tal1 = $_POST["tal1"];
$tal2 = $_POST["tal2"];
$produkt = $tal1 * $tal2;
echo "Produkten av tal1 och tal2 är " . $produkt . "<br>";
echo "Produkten av " . $tal1 . " och " . $tal2 . " är " . $produkt . "<br>";
echo "Produkten av $tal1 och $tal2 är $produkt<br>";
echo "I USA betala man med \$dollar."
?>
</body>

</html>