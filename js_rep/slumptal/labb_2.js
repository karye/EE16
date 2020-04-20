/* Kör koden när webbsidan laddats klart */
window.onload = init;

function init() {
    /* Lyssna på knappen */
    document.querySelector('#knapp').addEventListener('click', skrivUt);

    console.log(slumpTal);
}

function skrivUt() {
    /* Skapa ett slumptal */
    var slumpTal = Math.ceil(Math.random() * 100);

    /* Skriv ut slumptalet */
    document.querySelector('#svar').textContent = slumpTal;
}