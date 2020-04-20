/* Kör när sidan laddat klart */
window.onload = start;

function start() {

    /* Elementen vi jobbar med */
    const eTal = document.querySelector('#tal');
    const eGissa = document.querySelector('#gissa');
    const eResultat = document.querySelector('#resultat');
    const eGissningar = document.querySelector('#gissningar');
    const eHogsta = document.querySelector('#hogsta');
    const eValjTal = document.querySelector('#max');
    const eStartaOm = document.querySelector('#startaOm');

    var gissningar = 5;
    var slumptal;

    /* Lyssna på knappen */
    eGissa.addEventListener("click", gissa);
    eValjTal.addEventListener("click", valjTal);
    eStartaOm.addEventListener("click", startaOm);

    startaOm();

    function startaOm() {
        eTal.value = "";
        eResultat.value = "";
        eHogsta.value = "";
        eGissningar.value = "";
        eHogsta.disabled = false;
        eTal.disabled = false;
        gissningar = 5;
        eGissningar.value = gissningar;
    }

    /* Skapa ett slumptal */
    function valjTal() {
        var hogsta = Number(eHogsta.value);
        slumptal = Math.ceil(Math.random() * hogsta);
        console.log(slumptal);
        eHogsta.disabled = true;
    }

    function gissa() {
        /* Läs av rutan */
        var tal = Number(eTal.value);
        console.log(tal);

        if (isNaN(tal)) {
            eResultat.value = "Skriv en siffra!";
        } else {
            if (tal > slumptal) {
                eResultat.value = "Talet är för högt!";
                gissningar--;
                eGissningar.value = gissningar;
            }
            if (tal < slumptal) {
                eResultat.value = "Talet är för lågt!";
                gissningar--;
                eGissningar.value = gissningar;
            }
            if (tal == slumptal) {
                eResultat.value = "Rätt gissat!";
            }
            if (gissningar == 0) {
                eTal.disabled = true;
                eGissa.disabled = true;
                eResultat.value = "Du förlorade!";
            }
        }
    }
}