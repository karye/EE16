<?php
/*
* PHP version 7
* @category   Webbapp som levererar json med alla svenska städer
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

/* Läs in textfilen i en array */
$rader = file("./movies.tsv");
$stader = [];

/* Rensar rent från osynliga tecken */
foreach ($rader as $rad) {
    $stader[] = trim($rad);
}

//print_r($stader);

/* Svara på anrop och leverera json */
echo json_encode($stader);