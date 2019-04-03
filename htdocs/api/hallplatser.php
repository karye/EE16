<?php
/**
* Hämta data på närmsta hållplatser från trafiklab (SL)
*
* PHP version 7
* @category   json övning
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
* @link
* API-dok     https://www.trafiklab.se/api/sl-narliggande-hallplatser/dokumentation
*/

if (isset($_POST["lat"]) && isset($_POST["lon"])) {
    $lat = filter_input(INPUT_POST, "lat", FILTER_SANITIZE_STRING);
    $lon = filter_input(INPUT_POST, "lon", FILTER_SANITIZE_STRING);
    
    /* Api-nyckeln */
    $api = "5a04359da47042b7837f88a5c61908c9";
    /* Radie inom vilken vi vill hitta hållplatser */
    $radius = 500;
    /* Max antal hållplatser */
    $max = 99;
    /* url:en till api-tjänsten */
    $url = "http://api.sl.se/api2/nearbystops.json?key=$api&originCoordLat=$lat&originCoordLong=$lon&maxresults=$max&radius=$radius";
    
    /* Hämta json-data från api */
    $json = file_get_contents($url);
    /* print_r($json); */
    
    /* Avkodar json-datan */
    $jsonData = json_decode($json);
    
    /* Leta rätt på data vi är intresserade av */
    $stopLocation = $jsonData->LocationList->StopLocation;

    /* Loopa igenom alla hållplatser en-och-en */
    $stops = [];
    foreach ($stopLocation as $stop) {
        $name = $stop->name;
        $lat = $stop->lat;
        $lon = $stop->lon;
        $stops[] = [urlencode($name), $lat, $lon];
    }
    echo json_encode($stops);
} else {
    echo "Något blev fel!";
}
?>
