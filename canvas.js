//The code implementing ideas from @ChrisCourses js tutorials

var canvas = document.querySelector('canvas');
var c = canvas.getContext('2d');

canvas.width = innerWidth;
canvas.height = innerHeight;


const colors = ['#2185C5', '#7ECEFD', '#FFF6E5', '#FF7F66'];

addEventListener('resize', () => {
    canvas.width = innerWidth;
    canvas.height = innerHeight;

    init();
})

// Objects
function Star(x, y, radius, color) {
    this.x = x;
    this.y = y;
    this.radius = radius;
    this.color = color;
    this.speed = {
	x: randomIntFromRange(-10, 10),
	y: 3,
	}
    this.friction = 0.7; //súrlódás
    this.gravity = 1;

}

Star.prototype.draw = function() {
    c.save();
    c.beginPath();
    c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
    c.shadowColor = 'white';
    c.shadowBlur = 20;
    c.fillStyle = this.color;
    c.fill();
    c.closePath();
    c.restore(); //csak erre a kódrészletre vonatkozik
}

Star.prototype.update = function() {
    this.draw();

    if (this.y + this.radius + this.speed.y > canvas.height) {
    this.speed.y = -this.speed.y * this.friction;
    this.shatter();	
	} else {
	this.speed.y += this.gravity;	
	}

    this.y += this.speed.y;
    this.x += this.speed.x
}

Star.prototype.shatter = function () {
     this.radius -= 3;
     for (let i = 0; i < 8; i++) {
	miniStars.push(new MiniStar(this.x, this.y, 2));		
		}
}

//MINISTAR
function MiniStar(x, y, radius, color) {
    Star.call(this, x, y, radius, color);
    this.speed = {
	x: randomIntFromRange(-5, 5),
	y: randomIntFromRange(-25, 25),
	}
    this.friction = 0.8; //súrlódás
    this.gravity = 0.3;
    this.ttl = 300;
    this.opacity = 1;
}


MiniStar.prototype.draw = function() {
    c.beginPath();
    c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
    c.fillStyle = `rgba(273, 254, 266, ${this.opacity})`;
    c.shadowColor = 'white';
    c.shadowBlur = 20;
    c.fill();
    c.closePath();
}

MiniStar.prototype.update = function() {
    this.draw();

    if (this.y + this.radius + this.speed.y > canvas.height) {
    this.speed.y = -this.speed.y * this.friction;	
	} else {
	this.speed.y += this.gravity;	
	}

    this.y += this.speed.y;
    this.x += this.speed.x;
    this.ttl -= 1;
    this.opacity -= 1 / this.ttl;
}

//creating hills method
 function createMountain(mountainAmount, height, color ) {
	for(let i = 0; i<mountainAmount; i++) {
	const mountainWidth = canvas.height / mountainAmount;
	c.beginPath();
	c.moveTo(i * mountainWidth, canvas.height);
	c.lineTo(i * mountainWidth + mountainWidth * 2, canvas.height);
	c.lineTo(i * mountainWidth + mountainWidth, canvas.height - height);
	c.lineTo(i * mountainWidth, canvas.height);
	c.fillStyle = color;
	c.fill();
	c.closePath();
	}		
}
function randomIntFromRange(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}


// Implementation
const backgroundGrad = c.createLinearGradient(0, 0, 0, canvas.height);
backgroundGrad.addColorStop(0, '#1135ff');
backgroundGrad.addColorStop(1, '#f4f6ff');

let stars;
let miniStars;
//let backgroundStars;
let ticker = 0;
let fallingRate = 80;

function init() {
    stars = [];
    miniStars = [];
//    backgroundStars = [];

    //for (let i = 0; i < 1; i++) {
    //    stars.push(new Star(canvas.width / 2, 30, 30, '#fcfeff'));
    //	}

//    for (let i = 0; i < 100; i++) {
//	const x = Math.random() * canvas.width;
//	const y = Math.random() * canvas.height;
//	const radius = Math.random() * 3;
//	backgroundStars.push(new Star(x, y, radius, 'rgba(255, 255, 255, 0.8)'));
//	}
}

// Animation Loop
function animate() {
    requestAnimationFrame(animate);
    c.fillStyle = backgroundGrad;
    c.fillRect(0, 0, canvas.width, canvas.height);
	
    c.font = '150px Calibri Light';
    c.fillStyle = 'white';
    c.fillText('PepperWrapper', canvas.width/2, canvas.height/2);
    c.textAlign = 'center';

//   backgroundStars.forEach(backgroundStar => {
//	backgroundStar.draw();
//	})

   createMountain(1, 200, '#ffa35e');

    stars.forEach((star, index) => {
	star.update();
	if (star.radius == 0) {
	stars.splice(index, 1);
	}
	});

    miniStars.forEach((miniStar, index) => {
	miniStar.update();
	if (miniStar.ttl == 0) {
	miniStars.splice(index, 1);	
	}	
	});

    ticker++;

    if(ticker % fallingRate == 0) {
	const x = Math.random() * canvas.width;
	stars.push(new Star(x, -100, 12, 'white'));
	fallingRate = randomIntFromRange(120, 200);	
	}
	
}

init();
animate();

