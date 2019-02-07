window.onload = start;

function start() {
    const canvas = document.querySelector("#myCanvas");
    var ctx = canvas.getContext("2d");

    ctx.beginPath();
    ctx.rect(100, 100, 100, 70);
    ctx.fillStyle = "#FFF";
    ctx.fill();
    ctx.closePath();

}