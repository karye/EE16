window.onload = start;

function start() {
    const canvas = document.querySelector("#myCanvas");
    var ctx = canvas.getContext("2d");

    var bollX, bollY, vx, vy, racketX, racketY;
    var keys = [];

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
    }

    /* Racket */
    function racket(x, y) {
        ctx.beginPath();
        ctx.rect(x, y, 70, 10);
        ctx.fillStyle = "#FFF";
        ctx.fill();
        ctx.closePath();
    }

    /* Boll */
    function boll(x, y) {
        ctx.beginPath();
        ctx.arc(x, y, 20, 0, Math.PI * 2, false);
        ctx.fillStyle = "yellow";
        ctx.fill();
        ctx.rect(100, 170, 300, 50);
        ctx.closePath();
    }

    /* Lyssna på piltantagenterna */
    document.addEventListener("keydown", tryckPil);
    document.addEventListener("keyup", slappPil);
    function tryckPil(e) {
        keys[e.key] = true;
    }
    function slappPil(e) {
        keys[e.key] = false;
    }

    function uppdateraRacket() {
        if (keys["ArrowLeft"] && racketX > 10) {
            racketX -= 10;
        }
        if (keys["ArrowRight"] && racketX < 720) {
            racketX += 10;
        }
    }

    /* Ange startvärden */
    reset();

    /* Animationsloopen */
    function gameLoop() {
        /* Sudda bort allt */
        ctx.clearRect(0, 0, 800, 600);

        boll(bollX, bollY);
        bollX += vx;
        bollY += vy;

        /* Bollen studsar mot väggarna */
        if (bollY < 0 || bollY > 600) {
            vy = -vy;
        }
        if (bollX < 0 || bollX > 800) {
            vx = -vx;
        }

        racket(racketX, racketY);
        uppdateraRacket();

        /* Bollen ska studsa på racketen */
        /* Kolla om bollen är nere på bottenkanten */
        if (bollY >= 560) {
            /* Kolla om bollen är nära racketen */
            if ((bollX >= (racketX - 20)) && (bollX <= (racketX + 90))) {
                vy = -vy;
            }
        }
        if (bollY >= 600) {
            alert("Gamer Over!");
            reset();
        }

        requestAnimationFrame(gameLoop);
    }

    gameLoop();
}