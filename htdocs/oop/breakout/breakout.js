window.onload = start;

function start() {
    const canvas = document.querySelector("#myCanvas");
    var ctx = canvas.getContext("2d");

    var bollX, bollY, vx, vy, racketX, racketY, antalKlossar;
    var keys = [];
    var klossar = [];

    /* Ge variabler starvärden */
    function reset() {
        /* Bollens startposition */
        bollX = 400;
        bollY = 300;

        /* Bollens hastighet */
        vx = Math.ceil(Math.random() * 3 + 1);
        vy = Math.ceil(Math.random() * 3 + 1);

        /* Racketens position */
        racketX = 400;
        racketY = 580;

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
                    if ((bollX >= klossar[j][i].x) &&
                        (bollX <= (klossar[j][i].x + 100)) &&
                        (bollY >= klossar[j][i].y) &&
                        (bollY <= (klossar[j][i].y + 30))) {
                        klossar[j][i].hit = true;
                        vy = -vy;
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
        if (keys["ArrowLeft"] && racketX > 10) {
            racketX -= 10;
        }
        if (keys["ArrowRight"] && racketX < 720) {
            racketX += 10;
        }
    }

    /* Innan spevar börjar */
    reset();

    /* Animationsloopen */
    function gameLoop() {
        /* Sudda bort allt */
        ctx.clearRect(0, 0, 800, 600);

        ritaBoll(bollX, bollY);
        bollX += vx;
        bollY += vy;

        /* Bollen studsar mot väggarna */
        if (bollY < 0) {
            vy = -vy;
        }
        if (bollX < 0 || bollX > 800) {
            vx = -vx;
        }

        uppdateraAllaKlossar();
        traffaKloss();
        uppdateraRacket();
        ritaRacket(racketX, racketY);

        /* Bollen ska studsa på racketen */
        if (((bollY + 20) >= racketY) && 
            (bollX >= racketX && (bollX <= (racketX + 70)))) {
                vy = -vy;
        }

        /* Bollen når bottenkanten, spevar är förlorat */
        if (bollY >= 600) {
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