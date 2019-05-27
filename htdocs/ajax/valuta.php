<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Valutaomvandlare</title>
    <link rel="stylesheet" href="valuta.css">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Valutaomvandlare</h1>
        </header>
        <form>
            <label for="belopp">Belopp i Dollar</label>
            <input id="belopp" type="text">
            <label for="valuta">Valuta</label>
            <select id="valuta">
                <option>Välj valuta</option>
                <option value="NOK">Norska kronor</option>
                <option value="DKK">Danska kronor</option>
                <option value="SEK">Svenska kronor</option>
                <option value="EUR">Euro</option>
                <option value="GBP">Britiska pund</option>
                <option value="JPY">Japansk yen</option>
                <option value="TRY">Turkisk lira</option>
                <option value="CHF">Schweizisk franc</option>
                <option value="AUD">Australiensisk dollar</option>
            </select>
            <label for="resultat">Resultat</label>
            <input id="resultat" type="text">
        </form>
        <footer>
            <p>Valuta i realtid från https://openexchangerates.org</p>
        </footer>
    </div>
    <script src="./valuta.js"></script>
</body>
</html>