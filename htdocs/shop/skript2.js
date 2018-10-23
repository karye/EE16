/* När webbsidan laddats klart kör start() */
window.onload = start;

function start() {

    /* För att lagra alla köpta varor */
    var data = [];
    const elementAntalVaror = document.querySelector('#antalVaror');
    const elementTotal = document.querySelector('#total');

    /* Lyssna på klick på hela sidan */
    const elementKontainer = document.querySelector('.kontainer');
    elementKontainer.addEventListener('click', klick);

    /* Vad händer när man klickat på sidan? */
    function klick(e) {
        /* console.log('Nu har vi en klick event på ' + e.target.nodeName); */

        /* Har man klickat på en cell (td) */
        if (e.target.nodeName === 'TD') {
            rakna(e.target);
        }
    }

    /* Nu räknar man */
    function rakna(cell) {
        /* console.log('Klick i en cell'); */

        /* Leta rätt på närmast #antal, #pris, #summa ... */
        const foralder = cell.parentNode.parentNode.parentNode.parentNode;
        const elementBeskrivning = foralder.querySelector('#beskrivning');
        const elementAntal = foralder.querySelector('#antal');
        const elementPris = foralder.querySelector('#pris');
        const elementSumma = foralder.querySelector('#summa');
        const elementAntalVaror = document.querySelector('#antalVaror');
        const elementTotal = document.querySelector('#total');
        const elementKorgen = document.querySelector('#korgen');

        /* Hämta innehållet i elementen */
        var beskrivning = elementBeskrivning.textContent;
        var antal = parseInt(elementAntal.textContent);
        var pris = parseInt(elementPris.textContent);
        var summa = parseInt(elementSumma.textContent);
        var total = parseInt(elementTotal.value);
        var antalVaror = parseInt(elementAntalVaror.value);

        /* Klickade man i cellen #plus? */
        if (cell.id === 'plus') {
            /* Räkna upp */
            antal++;

            /* Räkna om summan */
            var summa = pris * antal;

            /* Skriva tillbaka */
            elementAntal.textContent = antal;
            elementSumma.textContent = summa;
        }

        /* Klickade man i cellen #minus? */
        if (cell.id === 'minus') {
            /* Räkna ned om större än 1 */
            if (antal > 1) {
                antal--;
            }

            /* Räkna om summan */
            var summa = pris * antal;

            /* Skriva tillbaka */
            elementAntal.textContent = antal;
            elementSumma.textContent = summa;
        }

        /* Klickade man i cellen #kop? */
        if (cell.id === 'kop') {
            /* Addera antal * summa */
            total = total + summa;

            /* Räkna upp totala antal varor */
            antalVaror = antalVaror + antal;

            /* Skriv tillbaka */
            elementTotal.value = total + ' kr';
            elementAntalVaror.value = antalVaror;

            /* Spara undan varorna i korgen = dolda input i JSON-format */
            data.push({ 'beskrivning': beskrivning, 'antal': antal, 'summa': summa });
            console.log(JSON.stringify(data));

            elementKorgen.value = JSON.stringify(data);
        }
    }
}