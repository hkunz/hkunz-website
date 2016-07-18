<?php
	$page->setPageTitle("About You");
	$img = $page->getImagePath();
?>

<script type="application/javascript">

var Circle = function (x, y, r, color, vx, vy) {
	this.x = x;
	this.y = y;
	this.r = r;
	this.color = color;
	this.vx = vx;
	this.vy = vy;
}

var canvas;
var ctx;
var frame = 0;
var circles = [];

window.onload = function() {
	logo = new Image();
	logo.src = "images/Logo.png";
	canvas = document.getElementById('canvas');
	ctx = canvas.getContext('2d');

	for (var i = 0; i < 3; ++i) {
		var r = random(100, 200);
		var c = new Circle(random(0, canvas.width), random(0, canvas.height), r, random(0xFF0000, 0xFF3333), 0, 0);
		circles.push(c);
	}
	draw();
}

function draw() {
	onEnterFrame();
}

function random(min, max) {
	return Math.floor((Math.random() * (max - min)) + min);
}

function onEnterFrame() {
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	for (var i = 0; i < circles.length; ++i) {
		var c = circles[i];
		var r = c.r;
		drawCircle(c);
	}
}

function drawCircle(c) {
	var r = (c.color >> 16) & 255;
    var g = (c.color >> 8) & 255;
    var b = c.color & 255;
	ctx.fillStyle = 'rgba(' + r + ',' + b + ',' + g + ', 0.2)';
	ctx.lineWidth = 3;
	ctx.beginPath();
	ctx.arc(c.x, c.y, c.r, 0, Math.PI * 2, true);
	ctx.closePath();
	ctx.fill();
}
</script>

<div>
	<p><b>YOU ARE YOU! :)</b></p>
</div>

<canvas id="canvas" width="460" height="348">
</canvas>