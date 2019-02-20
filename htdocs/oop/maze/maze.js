window.onload = start;

function start() {
    const canvas = document.querySelector("#myCanvas");
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    var ctx = canvas.getContext("2d");

    var imgRaket = new Image();
    imgRaket.src = "./bilder/pacman.png";
    var imgMaze = new Image();
    imgMaze.src = "./bilder/maze.png";

    var player = {
        x: 4,
        y: 4
    }

    function drawPlayer() {
        ctx.drawImage(imgMaze, player.x, player.y, 5, 5);
    }

    function drawMaze() {
        ctx.drawImage(imgMaze, 0, 0);
    }

    function checkCollision(x, y) {
        var imgData = ctx.getImageData(x, y, 5, 5);
        var pixels = imgData.data;

        console.log(x + " " + y);
        console.log(pixels);

        // Gå igenom varje pixel
        for (let i = 0; i < pixels.length; i += 4) {
            if (pixels[i] == 0) {
                console.log(i + " true");
                return false;
            }
        }
        console.log("false");
        return true;
    }

    /* Lyssna på piltantagenterna */
    document.addEventListener("keydown", uppdatePlayer);

    /* Flytta player */
    function uppdatePlayer(e) {
        if (e.key == "ArrowLeft" && checkCollision(player.x - 5, player.y)) {
            player.x -= 5;
        }
        if (e.key == "ArrowRight" && checkCollision(player.x + 5, player.y)) {
            player.x += 5;
        }
        if (e.key == "ArrowUp" && checkCollision(player.x, player.y - 5)) {
            player.y -= 5;
        }
        if (e.key == "ArrowDown" && checkCollision(player.x, player.y + 5)) {
            player.y += 5;
        }
    }

    /* Spelets animationsloop */
    function gameLoop() {
        /* Sudda bort allt */
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        drawMaze();
        drawPlayer();

        requestAnimationFrame(gameLoop);
    }
    gameLoop();
}