window.onload = start;

function start() {
    const canvas = document.querySelector("#myCanvas");
    var ctx = canvas.getContext("2d");

    /* Animationsloopen */
    var bollX, bollY, dx, dy, racketX, racketY, points, lives;
    racketX = 10;
    racketY = 100;
    points = 0;
    lives = 3;

    function reset() {
        bollX = 50;
        bollY = Math.ceil(Math.random() * 100);
        dx = 2;
        dy = 2;
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

    /* Racket */
    function racket(x, y) {
        ctx.beginPath();
        ctx.rect(x, y, 10, 70);
        ctx.fillStyle = "#FF0000";
        ctx.fill();
        ctx.closePath();
    }

    /* Uskrift */
    function highscore(points, lives) {
        ctx.font = "16px Arial";
        ctx.fillStyle = "#FFF";
        ctx.fillText("Points: " + points, 500, 50);
        ctx.fillText("Lives: " + lives, 600, 50);
    }

    /* Lyssna på piltantagenterna */
    document.addEventListener("keyup", flyttaRacket);
    document.addEventListener("keydown", flyttaRacket);

    function flyttaRacket(e) {
        if (e.key == "ArrowUp") {
            if (racketY > 10) {
                racketY -= 25;
            }
        }
        if (e.key == "ArrowDown") {
            if (racketY < 520) {
                racketY += 25;
            }
        }
    }

    /* Nollställ spelet */
    reset();

    function loop() {
        /* Sudda bort allt */
        ctx.clearRect(0, 0, 800, 600);

        /* Rita ut bollen */
        boll(bollX, bollY);

        /* Bollens förflyttning */
        bollX += dx;
        bollY -= dy;

        /* Bollen skall studsa */
        if (bollY <= 0) {
            dy = -dy;
        }
        if (bollX >= 800) {
            dx = -dx;
        }
        if (bollY >= 600) {
            dy = -dy;
        }

        /* Rita ut racketen */
        racket(racketX, racketY);

        /* Bollen ska studsa */
        if (bollX <= 40) {
            if ((bollY >= (racketY - 20)) && (bollY <= (racketY + 90))) {
                dx = -dx;
                points += 10;
            } else {
                if (lives == 0) {
                    alert("Gamer Over!");
                } else {
                    lives--;
                    reset();
                }
            }
        }
        highscore(points, lives);
        requestAnimationFrame(loop);
    }

    loop();
}