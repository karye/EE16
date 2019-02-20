window.onload = start;

function start() {
    const canvas = document.querySelector("#myCanvas");
    var ctx = canvas.getContext("2d");
    var keys = [];

    /* Mall för skott */
    class Skott {
        constructor() {
            this.x = 0;
            this.y = 0;
            this.hastighet = 10;
            this.hit = false;
            this.shot = false;
        }
        rita() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, 5, 0, Math.PI * 2, false);
            ctx.fillStyle = "yellow";
            ctx.fill();
            ctx.closePath();
        }
        uppdatera() {
            if (this.shot) {
                this.y -= this.hastighet;
                if (this.y < 0) {
                    this.shot = false;
                }
                this.rita();
            }
            if (this.hit) {
                this.shot = false;
                this.hit = false;
            }
        }
    }
    var skott = new Skott();

    class Racket {
        constructor() {
            this.x = 0;
            this.y = 0;
        }
        rita() {
            ctx.beginPath();
            ctx.rect(this.x, this.y, 70, 10);
            ctx.fillStyle = "#FFF";
            ctx.fill();
            ctx.closePath();
        }
        uppdatera() {
            if (keys["ArrowLeft"] && this.x > 10) {
                this.x -= 5;
            }
            if (keys["ArrowRight"] && this.x < 720) {
                this.x += 5;
            }
            if (keys[" "] && !skott.shot) {
                skott.x = this.x + 35;
                skott.y = this.y;
                skott.shot = true;
            }
            this.rita();
        }
    }
    var racket = new Racket();

    class Klossar {
        constructor() {
            this.x = 0;
            this.y = 0;
            this.antal = 0;
            this.lager = [];
        }
        rita(x, y) {
            ctx.beginPath();
            ctx.rect(x, y, 100, 30);
            ctx.fillStyle = "#FFF";
            ctx.fill();
            ctx.closePath();
        }
        /* Skapa en array för alla klossar */
        skapaAlla() {
            /* Skapa rader */
            for (var j = 1; j < 5; j++) {
                this.lager[j] = [];
                /* Skapa klossar */
                for (var i = 0; i < 6; i++) {
                    this.lager[j][i] = {
                        x: 40 + i * 120,
                        y: j * 50,
                        hit: false
                    };
                    this.antal++;
                }
            }
        }
        /* Rita ut klossar som finns i arrayen */
        uppdatera() {
            for (var j = 1; j < 5; j++) {
                for (var i = 0; i < 6; i++) {
                    if (!this.lager[j][i].hit) {
                        this.rita(40 + i * 120, j * 50);
                    }
                }
            }
        }
        kollision(skott) {
            for (var j = 1; j < 5; j++) {
                for (var i = 0; i < 6; i++) {
                    if (!this.lager[j][i].hit) {
                        if ((skott.x >= this.lager[j][i].x && 
                            skott.x <= this.lager[j][i].x + 100) && 
                            (skott.y >= this.lager[j][i].y && 
                            skott.y <= this.lager[j][i].y + 30)) {
                                this.lager[j][i].hit = true;
                                skott.hit = true;
                                this.antal--;
                        }
                    }
                }
            }
        }
    }
    var klossar = new Klossar();

    /* Lyssna på piltantagenterna */
    document.addEventListener("keydown", tryckPil);
    document.addEventListener("keyup", slappPil);

    /* Lagra vilken tangentpil som tryckts */
    function tryckPil(e) {
        keys[e.key] = true;
    }

    function slappPil(e) {
        keys[e.key] = false;
    }

    /* Innan spelet börjar */
    /* Ge variabler starvärden */
    function reset() {

        /* Racketens position */
        racket.x = 400;
        racket.y = 580;

        /* Nollställ och rita upp alla klossar */
        klossar.antal = 0;
        klossar.skapaAlla();
    }

    /* Nollställ inför första spelet */
    reset();

    /* Animationsloopen */
    function gameLoop() {
        /* Sudda bort allt */
        ctx.clearRect(0, 0, 800, 600);

        racket.uppdatera();
        skott.uppdatera();

        klossar.uppdatera();
        klossar.kollision(skott);

        if (klossar.antal == 0) {
            alert("Du vinner!");
            reset();
        }

        requestAnimationFrame(gameLoop);
    }

    gameLoop();
}