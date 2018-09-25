<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stränghantering</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    
$address = "  Craafords väg 12  ";
$trimAddress = trim($address);
echo "<p>.$address.$trimAddress.</p>";

$namn = "Karim Ryde";
$stortNamn = strtoupper($namn);
echo "<p>$namn $stortNamn</p>";

echo "<p>Längd = " . strlen($namn) . "</p>";

$hello = "Hej på dig!";
echo "<p>Hej: " . substr($hello, 3). "</p>";
echo "<p>på: " . substr($hello, 4, 2). "</p>";
echo "<p>på: " . mb_substr($hello, 4, 2). "</p>";
echo "<p>dig: " . substr($hello, 7, 3). "</p>";
echo "<p>dig!: " . substr($hello, -4). "</p>";

$epost = "hel@google.se";
if (strstr($epost, '@')) {
    echo "<p>Innehåller @</p>";
}

?>
</body>
</html>