/* När webbsidan laddats klart kör start() */
window.onload = start;

/* Globala variabler */
var slumptal;
const elementInput = document.querySelector('input');
console.log(elementInput);
const elementP = document.querySelector('p');
console.log(elementP);

/* Start-delen
1. Skapar ett slumtal mellan 1-100
*/
function start() {
    slumptal = Math.ceil(Math.random() * 100);
    console.log(slumptal);
}

/* Klick-delen:
1. Läs av gissningen
2. Kolla om gissning = slumptal: "Yippee, du har vunnit!"
3. Kolla om gissning < slumptal: "För lågt! Försök igen!"
3. Kolla om gissning > slumptal: "För högt!  Försök igen!"
 */
function klick() {
    var gissning = elementInput.value;
    console.log(gissning);
    
    if (gissning == slumptal) {
        console.log("Yippee, du har vunnit!");
        elementP.textContent = "Yippee, du har vunnit!";
    }

    if (gissning < slumptal) {
        console.log("För lågt! Försök igen!");
        elementP.textContent = "För lågt! Försök igen!";
    }

    if (gissning > slumptal) {
        console.log("För högt! Försök igen!");
        elementP.textContent = "För högt! Försök igen!";
    }
}