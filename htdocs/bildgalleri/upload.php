<?php
/*
 * PHP version 7
 * @category   Galleri
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 *
 * http://www.w3bees.com/2013/03/directory-upload-using-html-5-and-php.html
 */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bildgalleri</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h2>Bildgalleri</h2>
        <p>Katalog med bilder.</p>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="files[]" id="files" multiple="" directory="" webkitdirectory="" mozdirectory="">
            <input class="button" type="submit" value="Ladda upp" />
        </form>
        <?php
$count = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    /* https://devdocs.io/php/reserved.variables.files */
    print_r($_FILES["files"]["name"]);
    print_r($_FILES["files"]["tmp_name"]);

    /* Unikt bildnamn: https://devdocs.io/php/function.uniqid */

    /* Skapa dagens album som underkatalog med formatet 160519 */

    /* Ladda upp bilder: https://devdocs.io/php/function.move-uploaded-file  */

    /* Visa alla bilder som miniatyrer */
}
?>
    </div>
</body>
</html>