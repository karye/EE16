<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Väderdata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="#" method="post">
        <label>Search artist name</label><input type="text" name="search">
        <button>Sök</button>
    </form>
    <?php
        if (isset($_POST["search"])) {
            $search = filter_input(INPUT_POST, "search", FILTER_SANITIZE_STRING);

            /* cst = corect search term */
            $cst = str_replace(' ', '+', $search);
            $cst2 = $cst . "&entity=song&limit=5";
            $json = file_get_contents("https://itunes.apple.com/search?term=$cst2");

            $jsonData = json_decode($json);
            $antal = $jsonData->resultCount;

            echo "<table><tr><th>Top 5 songs by $search</th></tr>";
            for ($i=0; $i < $antal; $i++) { 
                $track = $jsonData->results[$i]->trackName;
                echo "<tr><td>$track</td></tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>