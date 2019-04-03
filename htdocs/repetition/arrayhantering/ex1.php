<?php
/* 1. Write a script which will display the following string:
$color = array('white', 'green', 'red', 'blue', 'black');
"The memory of that scene for me is like a frame of film forever frozen at that moment: the red carpet, the green lawn, the white house, the leaden sky. The new president and his first lady. - Richard M. Nixon"
and the words 'red', 'green' and 'white' will come from $color. */
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
    $color = array('white', 'green', 'red', 'blue', 'black');
    $color2 = ['white', 'green', 'red', 'blue', 'black'];

    echo "The memory of that scene for me is like a frame of film forever frozen at that moment: the {$color[2]} carpet, the $color[1] lawn, the $color[0] house, the leaden sky. The new president and his first lady. - Richard M. Nixon";
    ?>
</body>
</html>