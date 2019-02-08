/* 
1. Skapa js-grunden
2. Skapa canvas
3. Skapa funktionen gameloop, och att den snurrar
4. Skapa funktionen reset, tom
5. Skapa variabler: array map, character, array keys
6. Skapa labyrinten
7. Rita ut labyrinten (array)
*/

window.onload = start;

function start() {
    const canvas = document.querySelector("#myCanvas");
    var ctx = canvas.getContext("2d");

    var map = [];
    var keys = [];
    var character = {
        x: 0,
        y: 0
    };

    map = [
        [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
        [1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
        [1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 1],
        [1, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 1],
        [1, 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 1],
        [1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1],
        [1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1],
        [1, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1],
        [1, 0, 1, 0, 0, 1, 1, 1, 0, 1, 0, 1],
        [1, 0, 1, 1, 0, 1, 0, 0, 0, 1, 0, 1],
        [1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 0, 1],
        [1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1]
    ];

    function reset() {
        

    }

    /* Kloss */
    function ritaKloss(x, y) {
        ctx.beginPath();
        ctx.rect(x, y, 30, 30);
        ctx.fillStyle = "#FFF";
        ctx.fill();
        ctx.closePath();
    }

    function ritaLabyrint() {
        /* Höjden = y */
        for (var j = 0; j < 12; j++) {
            /* Sidled = x */
            for (var i = 0; i < 12; i++) {
                if (map[j][i] == 0) {
                    ritaKloss(i * 30, j * 30);
                }
            }
        }
    }

    reset();

    function gameLoop() {
        /* Sudda bort allt */
        ctx.clearRect(0, 0, 800, 600);

        ritaLabyrint();


        requestAnimationFrame(gameLoop);
    }
    gameLoop();
}