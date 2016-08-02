"use strict";
var animations = animations || {};

animations.BouncingBalls = function() {
	this.fps = 24,
	this.prevTime = Date.now(),
	this.logo = null;
	this.canvas = null;
	this.ctx = null;
	this.frame = 0;
	this.circles = [];

	this.requestAnimationFrame =
		window.requestAnimationFrame ||
		window.mozRequestAnimationFrame ||
		window.webkitRequestAnimationFrame ||
		window.msRequestAnimationFrame ||
		window.oRequestAnimationFrame;
}

animations.Circle = function (x, y, r, color, vx, vy) {
	this.x = x;
	this.y = y;
	this.r = r;
	this.color = color;
	this.vx = vx;
	this.vy = vy;
};

animations.BouncingBalls.prototype.init = function(canvasId) {
	var self = this;
	var random = this.random;
	var createCircle = this.createCircle;
	var circles = this.circles;
	var draw = this.draw;

	window.onload =  function () {
		var canvas = self.canvas = document.getElementById(canvasId);
		var ctx = self.ctx = canvas.getContext('2d');
		var logo = self.logo = new Image();
		logo.src = "images/Logo.png";

		for (var i = 0; i < 25; ++i) {
			var r = Math.random() > 0.9 ? random(50, 80) : random(30, 40);
			var c = new animations.Circle(random(r, canvas.width - r), random(r, canvas.height - r), r, random(0xFF0000, 0xFF6666), random(-5, 5), random(-5, 5));
			circles.push(c);
		}
		draw.apply(self);
	}
};

animations.BouncingBalls.prototype.random = function (min, max) {
	return Math.floor((Math.random() * (max - min)) + min);
};

animations.BouncingBalls.prototype.draw = function () {
	var self = this;
	window.requestAnimationFrame(self.draw.bind(self));
	var now = Date.now();
	var elapsed = now - this.prevTime;
	var interval = 1000 / this.fps;
	if (elapsed < interval) {
		return;
	}
	this.onEnterFrame();
	this.prevTime = now - (elapsed % interval);
};

animations.BouncingBalls.prototype.onEnterFrame = function() {
	this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
	if (this.logo.naturalWidth > 0 && this.logo.naturalHeight > 0) {
		//this.ctx.drawImage(this.logo, (this.canvas.width - this.logo.naturalWidth) * 0.5, (this.canvas.height - this.logo.naturalHeight) * 0.5);
	}
	for (var i = 0; i < this.circles.length; ++i) {
		var c = this.circles[i];
		var r = c.r;
		this.drawCircle(c);
		var fx = c.x + c.vx;
		if (fx + r > this.canvas.width || fx < r) {
			c.vx = -c.vx;
		}
		c.x += c.vx;
		var fy = c.y + c.vy;
		if (fy + r > this.canvas.height || fy < r) {
			c.vy = -c.vy;
		}
		c.y += c.vy;
	}
};

animations.BouncingBalls.prototype.drawCircle = function (c) {
	var r = (c.color >> 16) & 255;
	var g = (c.color >> 8) & 255;
	var b = c.color & 255;
	var ctx = this.ctx;
	ctx.fillStyle = 'rgba(' + r + ',' + b + ',' + g + ', 0.2)';
	ctx.lineWidth = 3;
	ctx.beginPath();
	ctx.arc(c.x, c.y, c.r, 0, Math.PI * 2, true);
	ctx.closePath();
	ctx.fill();
};
