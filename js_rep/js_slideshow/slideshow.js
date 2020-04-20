/* Kör koden när webbsidan laddats klart */
window.onload = start;

function start() {
    /* Variabler vi behöver */
    var bilder = [
        './foton/chris-lawton-475897-unsplash.jpg',
        './foton/colin-watts-1138048-unsplash.jpg',
        './foton/ezra-comeau-jeffrey-336626-unsplash.jpg',
        './foton/ghost-presenter-1076897-unsplash.jpg',
        './foton/jack-millard-1138486-unsplash.jpg',
        './foton/jeremy-bishop-1138388-unsplash.jpg',
        './foton/kaleb-dortono-87610-unsplash.jpg',
        './foton/oscar-helgstrand-1138481-unsplash.jpg',
        './foton/philipp-raifer-1136704-unsplash.jpg',
        './foton/stephen-kraakmo-1138352-unsplash.jpg'
    ];

    /* Lista på alla elementet vi behöver */
    const elementYta = document.querySelector('.yta');
    const elementFram = document.querySelector('.fa-arrow-circle-left');
    const elementBak = document.querySelector('.fa-arrow-circle-right');

    /* Lyssna på click bakåt eller framåt */
    elementFram.addEventListener('click', bildFram);
    elementBak.addEventListener('click', bildBak);

    /* Gå till nästa bild */
    function bildFram() {

    }

    /* Gå tillbaka till föregående bild */
    function bildBak() {

    }
}