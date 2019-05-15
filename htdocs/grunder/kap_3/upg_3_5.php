<?php
/*
* Gör ett skript som är en lånekalkylator. M.h.a. radioknappar ska användaren kunna välja mellan 1, 3 och 5 års lånetid. I en ruta ska användaren skriva i lånebeloppet och i nästa räntan i hela procent. Programmet ska sedan räkna ut den totala lånekostnaden (Räknas ut genom ränta på ränta-principen, årsvis). Så för ett treårigt lån på 5000 med räntan 4% skulle alltså lånekostnaden bli 5000*1,04*1,04*1,04 - 5000. Observera att lånet är "amorteringsfritt".
* Använder CSS ramverket https://minicss.org.
* PHP version 7
* @category   Lånekalkylator
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lånekalkylator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.0/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
/* Kontrollerar att data finns */
if (isset($_POST["lbelopp"]) &&
    isset($_POST["lranta"]) &&
    isset($_POST["ltid"])) {
    
    /* Ta emot data */
    $lbelopp = $_POST["lbelopp"];
    $lranta = $_POST["lranta"];
    $ltid = $_POST["ltid"];
    
    /* Räkna ut totala lånekostnad */
    $lkostnad = $lbelopp * (1 + $lranta / 100) ** $ltid - $lbelopp;
    echo "<p>Den totala lånekostnaden blir $lkostnad.</p>";
}
?>
    <form class="pure-form" action="upg_3_5.php" method="post">
        <fieldset>
            <legend>Lånekalkylator</legend>
            <label>Lånebelopp</label>
            <input type="number" name="lbelopp" value="0"><br>
            <label>Ränta</label>
            <input type="number" name="lranta" value="0"><br>
            <label>Lånetid</label>
            <input type="radio" name="ltid" value="1">1 år
            <input type="radio" name="ltid" value="3">3 år
            <input type="radio" name="ltid" value="5">5 år<br>
            <button>Räkna ut lånekostnaden</button>
        </fieldset>
    </form>
</body>

</html>