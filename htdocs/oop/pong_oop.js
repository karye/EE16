window.onload = start;

function start() {
    const canvas = document.querySelector("#myCanvas");
    var ctx = canvas.getContext("2d");

    var keyState = {};

    class Boll {
        constructor() {
            this.position = {
                x: 0,
                y: 0
            };
            this.velocity = {
                x: 0,
                y: 0
            };
        }
        reset() {
            this.position.x = Math.ceil(Math.random() * 100 + 100);
            this.position.y = Math.ceil(Math.random() * 100 + 100);
            this.velocity.x = Math.ceil(Math.random() * 10)
            this.velocity.y = Math.ceil(Math.random() * 10 - 5);
        }
        updatePosition() {
            this.position.x += this.velocity.x;
            this.position.y += this.velocity.y;

            if (this.position.y <= 0) {
                this.velocity.y = -this.velocity.y;
            }
            if (this.position.x >= canvas.width) {
                this.velocity.x = -this.velocity.x;
            }
            if (this.position.y >= canvas.height) {
                this.velocity.y = -this.velocity.y;
            }

            ctx.beginPath();
            ctx.arc(this.position.x, this.position.y, 20, 0, Math.PI * 2, false);
            ctx.fillStyle = "yellow";
            ctx.fill();
            ctx.rect(this.position.x, this.position.y, 300, 50);
            ctx.closePath();
        }
    }

    class Player {
        constructor(name) {
            this.name = name;
            this.points = 0;
            this.lives = 3;
            this.position = {
                x: 10,
                y: 0
            };
        }
        reset() {
            this.points = 0;
            this.lives = 3;
            this.position.y = canvas.height / 2 - 40;
        }
        updatePosition() {
            if (keyState[38]) {
                if (this.position.y > 10) {
                    this.position.y -= 10;
                }
            }
            if (keyState[40]) {
                if (this.position.y < 520) {
                    this.position.y += 10;
                }
            }
            ctx.beginPath();
            ctx.rect(this.position.x, this.position.y, 10, 70);
            ctx.fillStyle = "#FF0000";
            ctx.fill();
            ctx.closePath();
        }
        updateScore(x, y) {
            ctx.font = "16px Arial";
            ctx.fillStyle = "#FFF";
            ctx.fillText("Player: " + this.name, x, y);
            ctx.fillText("Points: " + this.points, x + 120, y);
            ctx.fillText("Lives: " + this.lives, x + 200, y);
        }
        collisionDetection(boll) {
            if (boll.position.x <= 40) {
                if ((boll.position.y >= (this.position.y - 20)) && 
                    (boll.position.y <= (this.position.y + 90))) {
                    boll.velocity.x = -boll.velocity.x;
                    this.points += 10;
                } else {
                    this.lives--;
                    if (this.lives == 0) {
                        alert("Gamer Over!");
                        this.reset();
                    } else {
                        boll.reset();
                    }
                }
            }
        }
    }

    var boll = new Boll();
    boll.reset();
    var player1 = new Player("Vincent");
    player1.reset();

    window.addEventListener('keydown',function(e) {
        keyState[e.keyCode] = true; 
    }, true);
    window.addEventListener('keyup',function(e) {
        keyState[e.keyCode] = false;
    }, true);

    /* Animationsloopen */
    function gameLoop() {
        /* Sudda bort allt */
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        boll.updatePosition();
        player1.updatePosition();
        player1.collisionDetection(boll);
        player1.updateScore(500, 20);

        requestAnimationFrame(gameLoop);
    }

    gameLoop();
}