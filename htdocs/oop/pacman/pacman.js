/* 
1. Skapa js-grunden
2. Skapa canvas
3. Skapa funktionen gameloop, och att den snurrar
4. Skapa funktionen reset (tom)
5. Skapa variabler: array map, character, array keys
6. Skapa labyrinten
7. Rita ut labyrinten (array)
8. Rita ut en spelare
9. Rita ut en spelare (bild)
10. Förflytta spelaren med pil-tangenter
11. Förflyttning bara inom labyrintens gångar
*/

window.onload = start;

function start() {
    const canvas = document.querySelector("#myCanvas");
    var ctx = canvas.getContext("2d");

    var points = 0;
    var spelare = {
        x: 0,
        y: 0
    };

    var imgSpelare = new Image();
    imgSpelare.src = "./bilder/pacman.png";

    var map = [
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

    class Mynt {
        constructor() {
            this.x = 0;
            this.y = 0;
            this.imgMynt = new Image();
            this.imgMynt.src = "./bilder/mynt.png";
            this.live = true;
        }
        reset() {
            this.x = Math.ceil(Math.random() * 11);
            this.y = Math.ceil(Math.random() * 11);
        }
        ritaMynt() {
            ctx.beginPath();
            ctx.drawImage(this.imgMynt, this.x * 40 + 5, this.y * 40 + 5, 30, 30);
            ctx.closePath();
        }
        spawnaMynt() {
            if (this.live) {
                if (map[this.y][this.x] == 1) {
                    this.x = Math.ceil(Math.random() * 11);
                    this.y = Math.ceil(Math.random() * 11);
                } else {
                    this.ritaMynt();
                }
            }
        }
        getPoints() {
            if (this.live && this.x == spelare.x && this.y == spelare.y) {
                points += 10;
                this.live = false;
                console.log("points = " + points);
            }
        }
    }

    var mynt1 = new Mynt();
    var mynt2 = new Mynt();

    class Monster {
        constructor() {
            this.x = 0;
            this.y = 0;
            this.imgMonster = new Image();
            this.imgMonster.src = "./bilder/monster.png";
        }
        reset() {
            var that = this;
            setInterval(function() {
                that.uppdateraMonster();
            }, 300);
        }
        ritaMonster() {
            ctx.beginPath();
            ctx.drawImage(this.imgMonster, this.x * 40 + 5, this.y * 40 + 5, 30, 30);
            ctx.closePath();
        }
        uppdateraMonster() {
            var gamlaX = this.x;
            var gamlaY = this.y;

            this.x += Math.ceil(Math.random() * 3 - 2);
            this.y += Math.ceil(Math.random() * 3 - 2);

            /* Gick spelaren in i väggen? Backa tillbaka */
            if (map[this.y][this.x] == 1) {
                this.x = gamlaX;
                this.y = gamlaY;
            }
        }
        collision(spelare) {
            if (spelare.x == this.x && spelare.y == this.y) {
                alert("Game Over!");
                reset();
            }
        }
    }

    var monster1 = new Monster();
    var monster2 = new Monster();

    /* Startvärden på spelet */
    function reset() {
        spelare.x = 1;
        spelare.y = 1;

        monster1.x = 4;
        monster1.y = 10;
        monster1.reset();
        monster2.x = 8;
        monster2.y = 11;
        monster2.reset();

        monster1.x = 4;
        monster1.y = 10;

        mynt1.reset();
        mynt2.reset();
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
    function ritaSpelare() {
        ctx.beginPath();
        ctx.drawImage(imgSpelare, spelare.x * 40 + 5, spelare.y * 40 + 5, 30, 30);
        ctx.closePath();
    }

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

    /* Innan första spelet ange startvärden */
    reset();

    /* Spelets animationsloop */
    function gameLoop() {
        /* Sudda bort allt */
        ctx.clearRect(0, 0, 800, 600);

        ritaLabyrint();
        ritaSpelare();

        monster1.ritaMonster();
        monster2.ritaMonster();
        monster1.collision(spelare);
        monster2.collision(spelare);

        mynt1.spawnaMynt();
        mynt2.spawnaMynt();
        mynt1.getPoints();
        mynt2.getPoints();

        requestAnimationFrame(gameLoop);
    }
    gameLoop();
}