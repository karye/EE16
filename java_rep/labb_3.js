/* 
* Skapa ett spamskydd
* Två slumptal presenteras
* Användaren ränar ut summan
*/
/* Kör koden när webbsidan laddtas klart */
window.onload = init;

/* Skapar globala variabler */
var tal1, tal2;

function init() {

    /* Slumpa fram två tal */
    tal1 = Math.ceil(Math.random() * 5);
    tal2 = Math.ceil(Math.random() * 10);

    /* Skriv ut frågan */
    /* 1. Ta tag i elementet som vi vill jobba med */
    const eleFragan = document.querySelector('#fragan');
    /* 2. Skriv ut */
    /* eleFragan.textContent = "Vad är 2+3?"; */
    eleFragan.textContent = "Vad är " + tal1 + " + " + tal2 + "?";

    /* Aktivera knappen, dvs lyssna på knappen */
    /* 1. Ta tag i knappen */
    const eleKnappen = document.querySelector("#knappen");
    /* 2. Lyssna på knappen */
    eleKnappen.addEventListener("click", spamSkydd);
}

function spamSkydd() {
    /* Testa att det funka att klicka på knappen */
    console.log("spamSkydd anropat!");
    
    /* Läs in det som användaren skriver i textrutan summa */
    /* 1. Ta tag i textrutan */
    const eleSumman = document.querySelector("#summan");
    /* 2. Läs av innehållet */
    var summa = eleSumman.value;
    console.log(summa);
    
    /* Jämför summa med svaret */
    if (summa == (tal1 + tal2)) {
        console.log("Rätt!");
        
    } else {
        console.log("Fel!");
        
    }
}