<?php
/*
10. Write a PHP script to sort the following associative array : 
array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40") in 
a) ascending order sort by value
b) ascending order sort by Key
c) descending order sorting by Value
d) descending order sorting by Key
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
    $friends = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40");

    asort($friends);
    foreach ($friends as $key => $value) {
        echo "$key is $value, ";
    }
    ksort($friends);
    echo "<br>";
    foreach ($friends as $key => $value) {
        echo "$key is $value, ";
    }
    arsort($friends);
    echo "<br>";
    foreach ($friends as $key => $value) {
        echo "$key is $value, ";
    }
    krsort($friends);
    echo "<br>";
    foreach ($friends as $key => $value) {
        echo "$key is $value, ";
    }
    ?>
</body>
</html>