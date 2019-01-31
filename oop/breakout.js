window.onload = start;

function start() {
    const canvas = document.querySelector("#myCanvas");
    var ctx = canvas.getContext("2d");

    /* Rita en flagga */
    /* Bakgrunden */
    ctx.beginPath();
    ctx.rect(100, 100, 300, 200);
    ctx.fillStyle = "#FF0000";
    ctx.fill();
    ctx.closePath();
    /* Korset */
    ctx.beginPath();
    ctx.rect(180, 100, 50, 200);
    ctx.fillStyle = "#FFF";
    ctx.fill();
    ctx.rect(100, 170, 300, 50);
    ctx.fillStyle = "#FFF";
    ctx.fill();
    ctx.closePath();

    /* Ansikte */
    ctx.beginPath();
    ctx.arc(600, 200, 50, 0, Math.PI*2, false);
    ctx.fillStyle = "yellow";
    ctx.fill();
    ctx.rect(100, 170, 300, 50);
    ctx.closePath();
}