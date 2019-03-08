var canvas = document.querySelector('canvas');
var c = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;


var mouse = {
	x: undefined,
	y: undefined
}

var maxRadius = 50;
var minRadius = 2;

var colorArray = [
	'#ff6600',
	'#d6a7ad',
	'#fc00d2',
	'#00ffe9',
	'#00ff15'
]


window.addEventListener('mousemove', function(event) {
	mouse.x = event.x;
	mouse.y = event.y;
	console.log(mouse);
})


function Circle (x, y, radius, dx, dy) {                                                     
	this.x = x;
	this.y = y;
	this.radius = radius;
	this.dx = dx;
	this.dy = dy;
	this.color = colorArray[Math.floor(Math.random() * colorArray.length)];

this.draw = function() {
	c.beginPath();
	c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
	c.strokeStyle = 'green';
	c.fillStyle = this.color; //egész szám a Math.floor-ral
	c.stroke(); 
	c.fill();
	}

this.update = function() {	
	this.draw();
	if (this.x + this.radius > canvas.width|| this.x - this.radius < 0) {
	this.dx = -this.dx;
	} 


	if (this.y + this.radius > canvas.height || this.y - this.radius < 0) {
	this.dy = -this.dy;
	} 

	this.x += this.dx;
	this.y += this.dy;

	if (mouse.x - this.x < 50 && mouse.x - this.x > -50 && mouse.y - this.y < 50 && mouse.y - this.y > -50) {
		if(this.radius < maxRadius) {
		this.radius += 1;
		}
	} else if (this.radius > minRadius){
	this.radius -= 1;
	}
}
}

var circleArray = [];

for (var i =0; i <1000; i++) {
	var x = Math.random() * (canvas.width - radius * 2) + radius;
	var y = Math.random() * (canvas.height - radius * 2);
	var radius = Math.random() * 3 + 1;
	var dx = (Math.random() - 0,5) /4;
	var dy = (Math.random() - 0,5) /4;
	circleArray.push(new Circle(x, y, radius, dx, dy)) + radius;
}

function animatingCircle () {

	requestAnimationFrame(animatingCircle);
	c.clearRect(0, 0, innerWidth, innerHeight);

for (var i = 0; i < circleArray.length; i++){
	circleArray[i].update();
}
	

}

animatingCircle();

