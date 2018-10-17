/* När webbsidan laddats klart kör start() */
window.onload = start;

function start() {

    /* Anslut till elementeten vi behöver jobba med */
    const elementTable = document.querySelector('table');
    console.log('Jag har hittat elementet: ', elementTable);
    
    const elementPlus = document.querySelector('#plus');
    console.log(elementPlus);
    
    const elementMinus = document.querySelector('#minus');
    console.log(elementMinus);
    
    const elementKop = document.querySelector('#kop');
    console.log(elementKop);

    const elementAntal = document.querySelector('#antal');
    console.log(elementAntal);

    const elementPris = document.querySelector('#pris');
    console.log(elementPris);

    const elementSumma = document.querySelector('#summa');
    console.log(elementSumma);

    const elementKorgen = document.querySelector('#korgen');
    console.log(elementKorgen);
    
    /* Lyssna på händelser */
    elementPlus.addEventListener('click', plus);
    elementMinus.addEventListener('click', minus);
    elementKop.addEventListener('click', kop);

    /* Räkna upp antal av en vara */
    function plus() {
        /* Läs av antal och summan */   
        var antal = parseInt(elementAntal.textContent);
        var pris = parseInt(elementPris.textContent);

        /* Räkna upp */
        antal++;

        /* Räkna om summan */
        var summa = pris * antal;

        /* Skriva tillbaka */
        elementAntal.textContent = antal;
        elementSumma.textContent = summa;
    }

    /* Räkna ned antal av en vara */
    function minus() {
        /* Läs av antal */   
        var antal = parseInt(elementAntal.textContent);
        var pris = parseInt(elementPris.textContent);
        
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

    function kop() {
        /* Läs av korgen */
        var korgen = parseInt(elementKorgen.textContent);
        var summa = parseInt(elementSumma.textContent);

        /* Addera antal * summa */
        korgen = korgen + summa;

        /* Skriv tillbaka */
        elementKorgen.textContent = korgen;
    }
}