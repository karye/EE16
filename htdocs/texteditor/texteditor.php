<?php
/*
1. Man ska kunna skriva en lång text i ett formulär med knapp "Spara".
2. När man klickat på "Spara" lagras texten i en textfil.
3. När man tar upp sidan igen visas senast sparade texten.
4. Skydda webbappen mot hot.
5. Infoga felhantering.

* PHP version 7
* @category   Texteditor
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>En texteditor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="texteditor.css">
    <link rel="stylesheet" href="modal.css">
</head>
<body>
    <?php
$texten = "";

/* Kolla att data finns */
if (isset($_POST['texten'])) {
    /* Validera data mot skräp och hot */
    $texten = filter_input(INPUT_POST, 'texten', FILTER_SANITIZE_STRING);
    
    /* Spara texten i en texfil */
    $handtag = fopen('texten.txt', 'w') or die('<p>Kunde inte spara textfilen.</p>');
    fwrite($handtag, $texten);
    fclose($handtag);
    
    /* Öppna ett modal-fönstret för att bekräfta sparandet */
    echo "<script defer src=\"modal.js\"></script>";

} else {
    /* Hämta texten från filen */
    $texten = file_get_contents('texten.txt');
}
?>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-body">
                <p>Texten är sparad!</p>
            </div>
        </div>
    </div>
    <div class="kontainer">
        <h1>Texteditor</h1>
        <form action="#" method="post">
            <label for="texten">Din text</label>
            <textarea name="texten" id="texten" cols="50" rows="10"><?php echo $texten; ?></textarea><br>
            <button id="myBtn">Spara</button>
        </form>
    </div>
</body>
</html>