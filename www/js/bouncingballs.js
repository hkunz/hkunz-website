var bouncingballs = {
	fps: 24,
	prevTime: Date.now(),

	requestAnimationFrame:
		window.requestAnimationFrame ||
		window.mozRequestAnimationFrame ||
		window.webkitRequestAnimationFrame ||
		window.msRequestAnimationFrame ||
		window.oRequestAnimationFrame,

	Circle: function (x, y, r, color, vx, vy) {
		this.x = x;
		this.y = y;
		this.r = r;
		this.color = color;
		this.vx = vx;
		this.vy = vy;
	},

	logo:null,
	canvas:null,
	ctx:null,
	frame: 0,
	circles: [],

	init: function() {
		window.onload = bouncingballs.onload;
	},

	onload: function () {
		random = bouncingballs.random;
		bouncingballs.logo = new Image();
		bouncingballs.logo.src = "images/Logo.png";
		bouncingballs.canvas = document.getElementById('canvas');
		bouncingballs.ctx = canvas.getContext('2d');

		for (var i = 0; i < 25; ++i) {
			var r = Math.random() > 0.9 ? random(50, 80) : random(30, 40);
			var c = new bouncingballs.Circle(random(r, canvas.width - r), random(r, canvas.height - r), r, random(0xFF0000, 0xFF6666), random(-5, 5), random(-5, 5));
			bouncingballs.circles.push(c);
		}
		bouncingballs.draw();
	},

	random: function (min, max) {
		return Math.floor((Math.random() * (max - min)) + min);
	},

	draw: function () {
		window.requestAnimationFrame(bouncingballs.draw);
		var now = Date.now();
		var elapsed = now - bouncingballs.prevTime;
		var interval = 1000 / bouncingballs.fps;
		if (elapsed < interval) {
			return;
		}
		bouncingballs.onEnterFrame();
		bouncingballs.prevTime = now - (elapsed % interval);
	},

	onEnterFrame: function() {
		bouncingballs.ctx.clearRect(0, 0, canvas.width, canvas.height);
		if (bouncingballs.logo.naturalWidth > 0 && bouncingballs.logo.naturalHeight > 0) {
			//bouncingballs.ctx.drawImage(bouncingballs.logo, (canvas.width - bouncingballs.logo.naturalWidth) * 0.5, (canvas.height - bouncingballs.logo.naturalHeight) * 0.5);
		}
		for (var i = 0; i < bouncingballs.circles.length; ++i) {
			var c = bouncingballs.circles[i];
			var r = c.r;
			bouncingballs.drawCircle(c);
			var fx = c.x + c.vx;
			if (fx + r > canvas.width || fx < r) {
				c.vx = -c.vx;
			}
			c.x += c.vx;
			var fy = c.y + c.vy;
			if (fy + r > canvas.height || fy < r) {
				c.vy = -c.vy;
			}
			c.y += c.vy;
		}
	},

	drawCircle: function (c) {
		var r = (c.color >> 16) & 255;
	    var g = (c.color >> 8) & 255;
	    var b = c.color & 255;
	    var ctx = bouncingballs.ctx;
		ctx.fillStyle = 'rgba(' + r + ',' + b + ',' + g + ', 0.2)';
		ctx.lineWidth = 3;
		ctx.beginPath();
		ctx.arc(c.x, c.y, c.r, 0, Math.PI * 2, true);
		ctx.closePath();
		ctx.fill();
	},
};