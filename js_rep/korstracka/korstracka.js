/* 
 * Räknar ut en körsträckan för en bil.
 * Mata in hastighet och tid.
 * Få avstånd som svar.
 */

/* Kör koden när webbsidan laddats klart */
window.onload = start;

function start() {

    /* Välj ut alla elementen att jobba med: target */
    const elementHastighet = document.querySelector('.hastighet');
    const elementTid = document.querySelector('.tid');
    const elementRaknaUt = document.querySelector('.raknaUt');
    const elementSvar = document.querySelector('.svar');
    console.log(elementHastighet);
    console.log(elementTid);
    console.log(elementRaknaUt);
    console.log(elementSvar);    

    /* Lyssna på knappen */
    elementRaknaUt.addEventListener('click', raknaUt)

    /* Räkna ut avståndet */
    function raknaUt() {
        
        /* Läs av hastigheten och tiden */
        var hastighet = elementHastighet.value;
        var tid = elementTid.value;

        /* Räkna ut avståndet = hastigheten * tid */
        var avstand = hastighet * tid / 60;

        /* Skriv ut resultatet tex 'Körsträckan blir 57 km.' */
        elementSvar.textContent = 'Körsträckan blir ' + avstand + ' km.';
    }
}