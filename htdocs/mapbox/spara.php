<?php 

if (isset($_POST["coordinates"]) && isset($_POST["beskrivning"])) {
    $coordinates = filter_input(INPUT_POST, 'coordinates', FILTER_SANITIZE_STRING);
    $beskrivning = filter_input(INPUT_POST, 'beskrivning', FILTER_SANITIZE_STRING);
    echo "Sparad";

    $cor = explode("\n", $coordinates);
    $bes = explode("\n", $beskrivning);

    foreach ($variable as $key => $value) {
        # code...
    }


    $handtag = fopen('platser.txt', 'a');
    fwrite($handtag, $coordinates . "¤" . $beskrivning . PHP_EOL);
    fclose($handtag);
}else{
    echo "Inte sparad";
}