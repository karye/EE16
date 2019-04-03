<?php
/*
6. Write a PHP script which decodes the following JSON string. 
Sample JSON code :
{"Title": "The Cuckoos Calling",
"Author": "Robert Galbraith",
"Detail": {
"Publisher": "Little Brown"
}}
Expected Output :
Title : The Cuckoos Calling
Author : Robert Galbraith
Publisher : Little Brown
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
    $json = '{
                "Title": "The Cuckoos Calling",
                "Author": "Robert Galbraith",
                "Publisher": "Little Brown"
            }';
    $bok = json_decode($json);
    foreach ($bok as $key => $value) {
        echo "$key : $value<br>";
    }
    ?>
</body>
</html>