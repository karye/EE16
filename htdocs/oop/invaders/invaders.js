window.onload = start;

function start() {
    const canvas = document.querySelector("#myCanvas");
    var ctx = canvas.getContext("2d");

    var antalKlossar;
    var keys = [];
    var klossar = [];
    boll = {
        x: 0,
        y: 0,
        vx: 0,
        vy: 0
    }
    racket = {
        x: 0,
        y: 0
    }

    /* Ge variabler starvärden */
    function reset() {
        /* Bollens startposition */
        boll.x = 400;
        boll.y = 300;

        /* Bollens hastighet */
        boll.vx = Math.ceil(Math.random() * 3 + 1);
        boll.vy = Math.ceil(Math.random() * 3 + 1);

        /* Racketens position */
        racket.x = 400;
        racket.y = 580;

        antalKlossar = 0;
        skapaAllaKlossar();
    }

    /* Racket */
    function ritaRacket(x, y) {
        ctx.beginPath();
        ctx.rect(x, y, 70, 10);
        ctx.fillStyle = "#FFF";
        ctx.fill();
        ctx.closePath();
    }

    /* Boll */
    function ritaBoll(x, y) {
        ctx.beginPath();
        ctx.arc(x, y, 20, 0, Math.PI * 2, false);
        ctx.fillStyle = "yellow";
        ctx.fill();
        ctx.rect(100, 170, 300, 50);
        ctx.closePath();
    }

    /* Kloss */
    function ritaKloss(x, y) {
        ctx.beginPath();
        ctx.rect(x, y, 100, 30);
        ctx.fillStyle = "#FFF";
        ctx.fill();
        ctx.closePath();
    }

    /* Skapa en array för alla klossar */
    function skapaAllaKlossar() {
        /* Skapa rader */
        for (var j = 1; j < 5; j++) {
            klossar[j] = [];
            /* Skapa klossar */
            for (var i = 0; i < 6; i++) {
                klossar[j][i] = {
                    x: 40 + i * 120,
                    y: j * 50,
                    hit: false
                };
                antalKlossar++;
            }
        }
    }

    /* Rita ut klossar som finns i arrayen */
    function uppdateraAllaKlossar() {
        /* Skapa rader */
        for (var j = 1; j < 5; j++) {
            /* Skapa klossar */
            for (var i = 0; i < 6; i++) {
                if (!klossar[j][i].hit) {
                    ritaKloss(40 + i * 120, j * 50);
                }
            }
        }
    }

    /* Ta bort kloss vid träff av boll */
    function traffaKloss() {
        for (var j = 1; j < 5; j++) {
            for (var i = 0; i < 6; i++) {
                if (!klossar[j][i].hit) {
                    if ((boll.x >= klossar[j][i].x) &&
                        (boll.x <= (klossar[j][i].x + 100)) &&
                        (boll.y >= klossar[j][i].y) &&
                        (boll.y <= (klossar[j][i].y + 30))) {
                        klossar[j][i].hit = true;
                        boll.vy = -boll.vy;
                        antalKlossar--;
                    }
                }
            }
        }
    }

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

    /* Flytta racketen */
    function uppdateraRacket() {
        if (keys["ArrowLeft"] && racket.x > 10) {
            racket.x -= 10;
        }
        if (keys["ArrowRight"] && racket.x < 720) {
            racket.x += 10;
        }
    }

    /* Innan spevar börjar */
    reset();

    /* Animationsloopen */
    function gameLoop() {
        /* Sudda bort allt */
        ctx.clearRect(0, 0, 800, 600);

        ritaBoll(boll.x, boll.y);
        boll.x += boll.vx;
        boll.y += boll.vy;

        /* Bollen studsar mot väggarna */
        if (boll.y < 0) {
            boll.vy = -boll.vy;
        }
        if (boll.x < 0 || boll.x > 800) {
            boll.vx = -boll.vx;
        }

        uppdateraAllaKlossar();
        traffaKloss();
        uppdateraRacket();
        ritaRacket(racket.x, racket.y);

        /* Bollen ska studsa på racketen */
        if (((boll.y + 20) >= racket.y) && 
            (boll.x >= racket.x && (boll.x <= (racket.x + 70)))) {
                boll.vy = -boll.vy;
        }

        /* Bollen når bottenkanten, spevar är förlorat */
        if (boll.y >= 600) {
            alert("Gamer Over!");
            reset();
        }

        if (antalKlossar == 0) {
            alert("Du vinner!");
            reset();
        }

        requestAnimationFrame(gameLoop);
    }

    gameLoop();
}