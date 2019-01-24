<?php
/* 
2. Write a PHP script to split the following string.
Sample string : '082307'
Expected Output : 08:23:07
*/
?>
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
    $text = "082307";
    $a = substr($text, 0, 2) . ":" . substr($text, 2, 2) . ":" . substr($text, 4, 2);
    echo $a;
    ?>
</body>
</html>