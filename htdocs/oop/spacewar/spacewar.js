window.onload = start;

function start() {
    const canvas = document.querySelector("canvas");
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    var ctx = canvas.getContext("2d");
    ctx.font = "20px Arial";
    ctx.fillStyle = "#FFF";

    var keys = [];
    var raket = {
        x: 0,
        y: 0,
        vx: 0,
        vy: 0,
        a: 0,
        h: 0
    };

    var imgRaket = new Image();
    imgRaket.src = "./bilder/raket.png";
    var imgRymden = new Image();
    imgRymden.src = "./bilder/rymden.png";
    var imgSolen = new Image();
    imgSolen.src = "./bilder/solen.png";

    /* Ge variabler starvärden */
    function reset() {

        /* raketens position */
        raket.x = 100;
        raket.y = 100;
        raket.a = 0;
        raket.h = 0;
        raket.vx = 0;
        raket.vy = 0;
    }

    /* Solen i mitten */
    function ritaSolen() {
        ctx.drawImage(imgSolen, canvas.width / 2 - 25, canvas.height / 2 - 25, 50, 50);
    }

    /* raket */
    function ritaRaket() {
        ctx.save();
        ctx.translate(raket.x, raket.y);
        ctx.rotate(raket.a);
        ctx.drawImage(imgRaket, -25, -25, 50, 50);
        ctx.restore();

        /* Uppdatera positionen med hastigheten */
        raket.x += raket.vx;
        raket.y += raket.vy;
    }
    /* Flytta raketen */
    function uppdateraRaket() {
        if (keys["ArrowLeft"]) {
            raket.a -= 0.1;
        }
        if (keys["ArrowRight"]) {
            raket.a += 0.1;
        }
        if (keys["ArrowUp"]) {
            raket.h += 0.001;
            raket.vx += raket.h * Math.sin(raket.a);
            raket.vy -= raket.h * Math.cos(raket.a);
        }
        if (keys["ArrowDown"]) {

        }

        /* Gå runt kanterna */
        if (raket.x < 0) {
            raket.x = canvas.width;
        }
        if (raket.x > canvas.width) {
            raket.x = 0;
        }
        if (raket.y < 0) {
            raket.y = canvas.height;
        }
        if (raket.y > canvas.height) {
            raket.y = 0;
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

    /* Innan spevar börjar */
    reset();

    /* Animationsloopen */
    function gameLoop() {
        /* Sudda bort allt */
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(imgRymden, 0, 0);

        uppdateraRaket();
        ritaRaket();
        ritaSolen();

        requestAnimationFrame(gameLoop);
    }

    gameLoop();
}