/* Kör koden när webbsidan laddtas klart */
window.onload = init;

function init() {
    /* Anslut till knappen */
    var knappen = document.querySelector("#knapp");

    /* Lyssna på knappen */
    knappen.addEventListener('click', skrivHälsning);

    console.log("Slut!");
}

function skrivHälsning() {
    /* Läs in text */
    var namn = document.querySelector("#namn").value;
    
    /* Skriv ut text */
    document.querySelector("#svar").textContent = 'Hej ' + namn + ' vad kul att du är här!';
}