/* 
1. Skapa js-grunden
2. Skapa canvas
3. Skapa funktionen gameloop, och att den snurrar
4. Skapa funktionen reset (tom)
5. Skapa variabler: array map, character, array keys
6. Skapa labyrinten
7. Rita ut labyrinten (array)
8. Rita ut en karaktär
9. Rita ut en karaktär (bild)
10. Förflytta karaktären med pil-tangenter
11. Förflyttning bara inom labyrintens gångar
*/

window.onload = start;

function start() {
    const canvas = document.querySelector("#myCanvas");
    var ctx = canvas.getContext("2d");

    var map = [];
    var spelare = {
        x: 0,
        y: 0
    };
    var monster = {
        x: 0,
        y: 0
    };
    var imgSpelare = new Image();
    imgSpelare.src = "./bilder/pacman.png";
    var imgMonster = new Image();
    imgMonster.src = "./bilder/monster.png";

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
        [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1],
        [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
    ];

    function reset() {
        spelare.x = 1;
        spelare.y = 1;

        monster.x = 4;
        monster.y = 10;
    }

    /* Kloss */
    function ritaKloss(x, y) {
        ctx.beginPath();
        ctx.rect(x, y, 40, 40);
        ctx.fillStyle = "#000";
        ctx.fill();
        ctx.closePath();
    }

    /* Ritar ut labyrinten från map */
    function ritaLabyrint() {
        /* Höjdled = y */
        for (var j = 0; j < 13; j++) {
            /* Sidled = x */
            for (var i = 0; i < 13; i++) {
                if (map[j][i] == 1) {
                    ritaKloss(i * 40, j * 40);
                }
            }
        }
    }

    /* Spelaren */
    function ritaSpelare(x, y) {
        ctx.beginPath();
        ctx.drawImage(imgSpelare, x * 40 + 5, y * 40 + 5, 30, 30);
        ctx.closePath();
    }

    /* Monster */
    function ritaMonster(x, y) {
        ctx.beginPath();
        ctx.drawImage(imgMonster, x * 40 + 5, y * 40 + 5, 30, 30);
        ctx.closePath();
    }

    /* Flytta monster slumpmässigt */
    function uppdateraMonster() {
        monster.x += Math.ceil(Math.random() * 3 - 2);
        monster.y += Math.ceil(Math.random() * 3 - 2);

        if (monster.x < 0) {
            monster.x = 11;
        }
        if (monster.x > 11) {
            monster.x = 0;
        }
        if (monster.y < 0) {
            monster.y = 11;
        }
        if (monster.y > 11) {
            monster.y = 0;
        }

    }
    setInterval(uppdateraMonster, 300);

    /* Lyssna på piltantagenterna */
    document.addEventListener("keydown", uppdateraSpelaren);

    /* Flytta spelaren */
    function uppdateraSpelaren(e) {
        var gamlaX = spelare.x;
        var gamlaY = spelare.y;

        if (e.key == "ArrowLeft") {
            spelare.x -= 1;
        }
        if (e.key == "ArrowRight") {
            spelare.x += 1;
        }
        if (e.key == "ArrowUp") {
            spelare.y -= 1;
        }
        if (e.key == "ArrowDown") {
            spelare.y += 1;
        }

        /* Gick spelaren in i väggen? Backa tillbaka */
        if (map[spelare.y][spelare.x] == 1) {
            spelare.x = gamlaX;
            spelare.y = gamlaY;
        }
    }

    reset();

    /* Spelets animationsloop */
    function gameLoop() {
        /* Sudda bort allt */
        ctx.clearRect(0, 0, 800, 600);

        ritaLabyrint();
        ritaSpelare(spelare.x, spelare.y);

        ritaMonster(monster.x, monster.y);

        requestAnimationFrame(gameLoop);
    }
    gameLoop();
}