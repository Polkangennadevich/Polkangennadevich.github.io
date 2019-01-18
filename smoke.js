

(function () {
    var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
    window.requestAnimationFrame = requestAnimationFrame;


var canvassmoke = document.getElementById("smoke"),
    ctx = canvassmoke.getContext("2d");

canvassmoke.height = document.body.offsetHeight;
canvassmoke.width = 300;

var parts = [],
    minSpawnTime = 40,
    lastTime = new Date().getTime(),
    maxLifeTime = Math.min(5000, (canvassmoke.height/(1.5*60)*1000)),
    emitterX = canvassmoke.width / 2,
    emitterY = canvassmoke.height - 100,
    smokeImage = new Image();

function spawn() {
    if (new Date().getTime() > lastTime + minSpawnTime) {
        lastTime = new Date().getTime();
        parts.push(new smoke(emitterX, emitterY));
    }
}

function rendersmoke() {
    var len = parts.length;
    ctx.clearRect(0, 0, canvassmoke.width, canvassmoke.height);

    while (len--) {
        if (parts[len].y < 0 || parts[len].lifeTime > maxLifeTime) {
            parts.splice(len, 1);
        } else {
            parts[len].update();

            ctx.save();
            var offsetX = -parts[len].size/2,
                offsetY = -parts[len].size/2;
         
            ctx.translate(parts[len].x-offsetX, parts[len].y-offsetY);
            ctx.rotate(parts[len].angle / 180 * Math.PI);
            ctx.globalAlpha  = parts[len].alpha;
            ctx.drawImage(smokeImage, offsetX,offsetY, parts[len].size, parts[len].size);
            ctx.restore();
        }
    }
    spawn();
    requestAnimationFrame(rendersmoke);
}

function smoke(x, y, index) {
    this.x = x;
    this.y = y;

    this.size = 1;
    this.startSize = 32;
    this.endSize = 40;

    this.angle = Math.random() * 359;

    this.startLife = new Date().getTime();
    this.lifeTime = 0;

    this.velY = -1 - (Math.random()*0.5);
    this.velX = Math.floor(Math.random() * (-6) + 3) / 10;
}

smoke.prototype.update = function () {
    this.lifeTime = new Date().getTime() - this.startLife;
    this.angle += 0.2;
    
    var lifePerc = ((this.lifeTime / maxLifeTime) * 100);

    this.size = this.startSize + ((this.endSize - this.startSize) * lifePerc * .1);

    this.alpha = 1 - (lifePerc * .01);
    this.alpha = Math.max(this.alpha,0);
    
    this.x += this.velX;
    this.y += this.velY;
}

smokeImage.src = "index/smoke.png";
smokeImage.onload = function () {
    rendersmoke();
}


window.onresize = resizeMe;
window.onload = resizeMe;
function resizeMe() {
   canvassmoke.height = document.body.offsetHeight;
}

})(); 
