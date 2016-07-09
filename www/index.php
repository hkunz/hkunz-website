<?php
  ob_start(); //Buffer larger content areas like the main page content
?>

<style type="text/css">
#canvas {
	border:#666 0px solid;
	opacity:1.0;
}
</style>

<script type="application/javascript">

var fps = 24;
var prevTime = Date.now();

var requestAnimationFrame =
	window.requestAnimationFrame ||
	window.mozRequestAnimationFrame ||
	window.webkitRequestAnimationFrame ||
	window.msRequestAnimationFrame ||
	window.oRequestAnimationFrame;

var Circle = function (x, y, r, color, vx, vy) {
	this.x = x;
	this.y = y;
	this.r = r;
	this.color = color;
	this.vx = vx;
	this.vy = vy;
}

var logo;
var canvas;
var ctx;
var frame = 0;
var circles = [];

window.onload = function() {
	logo = new Image();
	logo.src = "images/Logo.png";
	canvas = document.getElementById('canvas');
	ctx = canvas.getContext('2d');

	for (var i = 0; i < 25; ++i) {
		var r = Math.random() > 0.9 ? random(50, 80) : random(30, 40);
		var c = new Circle(random(r, canvas.width - r), random(r, canvas.height - r), r, random(0xFF0000, 0xFF6666), random(-5, 5), random(-5, 5));
		circles.push(c);
	}
	draw();
}

function random(min, max) {
	return Math.floor((Math.random() * (max - min)) + min);
}

function draw() {
	requestAnimationFrame(draw);
	var now = Date.now();
	var elapsed = now - prevTime;
	var interval = 1000 / fps;
	if (elapsed < interval) {
		return;
	}
	onEnterFrame();
	prevTime = now - (elapsed % interval);
}

function onEnterFrame() {
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	if (logo.naturalWidth > 0 && logo.naturalHeight > 0) {
		//ctx.drawImage(logo, (canvas.width - logo.naturalWidth) * 0.5, (canvas.height - logo.naturalHeight) * 0.5);
	}
	for (var i = 0; i < circles.length; ++i) {
		var c = circles[i];
		var r = c.r;
		drawCircle(c);
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

<div onload="init();">
	<p>Welcome to <span class="hkunz">hkunz</span><span class="hkunz" style="color:#000;">.com</span></p>
	<p>Please use the menu on the left to navigate this site</p>
</div>

<canvas id="canvas" width="460" height="310">
</canvas>

<div>
	<p><b>Thank you</b> for visiting. More about me <a href="about/hkunz/"><b>here</b></a>.</p>
</div>

<?php
	$pageTitle = "hkunz.com";
	$pageSubTitle = "hkunz.com";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();

	include("php/master.inc.php");
	//FirePHP is distributed subject to the New BSD License on an "AS IS" basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. USE AT YOUR OWN RISK. IN NO EVENT WILL ANY COPYRIGHT HOLDER OR ANY OTHER PARTY BE LIABLE TO YOU FOR DAMAGES. By using FirePHP you agree to all terms of the New BSD License. Software License Agreement (New BSD License) Copyright (c) 2006-2010, Christoph Dorn All rights reserved. Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met: * Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer. * Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution. * Neither the name of Christoph Dorn nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission. THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
?>
