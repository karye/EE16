<?php 

if (isset($_POST["koordinater"]) && isset($_POST["beskrivningar"])) {
    $koordinater = filter_input(INPUT_POST, 'koordinater', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    $beskrivningar = filter_input(INPUT_POST, 'beskrivningar', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);


    $handtag = fopen('platser.txt', 'a');
    foreach ($koordinater as $key => $koordinat) {
        fwrite($handtag, "$koordinat:beskrivningar[$key]" . PHP_EOL);
    }

    
    fclose($handtag);
    echo "Sparad";
}else{
    echo "Inte sparad";
}