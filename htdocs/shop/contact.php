<?php
session_start();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h1>Contact</h1>
    <ul>
        <li><a href="session.php">HOME</a></li>
        <li><a href="contact.php">CONTACT</a></li>
    </ul>
<?php

echo $_SESSION['username'];
?>
</body>
</html>