<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Datum på svenska</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
function datum() {
    
    /* Alla dagar i veckan på svenska */
    $dagar[1] = "Måndag";
    $dagar[2] = "Tisdag";
    $dagar[3] = "Onsdag";
    $dagar[4] = "Torsdag";
    $dagar[5] = "Fredag";
    $dagar[6] = "Lördag";
    $dagar[7] = "Söndag";
    
    /* Dagens nr */
    $dagNr = date('N');
    
    /* Alla månader på svenska */
    $manad[1] = "Januari";
    $manad[2] = "Februari";
    $manad[3] = "Mars";
    $manad[4] = "April";
    $manad[5] = "Maj";
    $manad[6] = "Juni";
    $manad[7] = "Juli";
    $manad[8] = "Augusti";
    $manad[9] = "September";
    $manad[10] = "Oktober";
    $manad[11] = "November";
    $manad[12] = "December";
    
    $manadNr = date('n');
    $datumNr = date('d');
    $ar = date('Y');
    
    return "$dagar[$dagNr] $datumNr $manad[$manadNr] $ar";
}

echo datum();

    ?>
    </body>
    </html>