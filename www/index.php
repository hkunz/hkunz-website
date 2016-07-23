<?php
	include "constants.php";
	include "php/PageContent.php";
	include "php/PageContentRenderer.php";
	include "php/createImageLightbox.inc.php";

	$requestURI = explode('/', $_SERVER['REQUEST_URI']);
	$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
	$routes = array_diff_assoc($requestURI, $scriptName);
	$category = $routes[1];
	$topic = $routes[2];
	$subtopic = $routes[3];
	$file = $BASE_URL . "/content/" . $category;

	switch ($category) {
		case "portfolio":
		case "about":
		case "error":
			$file = $file . "/content-" . $topic . ".php";
			$imgpath = $IMAGE_PATH . "/" . $category . "/" . $topic . "/";
			$p = new PageContentRenderer($file, $imgpath);
			break;
		case "webnotes":
		case "blog":
			if ($subtopic == NULL) {
				$file = $file . "/content-index.php";
			} else {
				$file = $file . "/" . $topic . "/content-" . $subtopic . ".php";
				$imgpath = $IMAGE_PATH . "/" . $category . "/" . $topic . "/";
			}
			$p = new PageContentRenderer($file, $imgpath);
			break;
		default:
			break;
	}

	if ($category != NULL && count($routes) > 0) {
		if ($p == NULL || !$p->renderable()) {
			$p = new PageContentRenderer($BASE_URL . "/content/error/content-404.php");
		}
	}

	if ($p != NULL && $p->renderable()) {
		$p->render();
		return;
	}

	$page = new PageContent("hkunz.com");
	$page->setBackButtonVisible(false);
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
	$page->render();
?>
