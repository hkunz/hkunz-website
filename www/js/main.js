include('jquery.js'); //not necessary

const PX = "px";

var winWidth = $(window).width(); // returns width of browser viewport
var docWidth = $(document).width(); // returns width of HTML document
var width = 800;
var navHeight = 25;
var padding = 0;
var headerHeight = 160;
var headerWidth = width;
var bodyWidth = width;


document.getElementById("nav").style.height = navHeight + PX;
//document.getElementById("outer").style.width = (width + padding*2) + PX;
//document.getElementById("inner").style.marginTop = padding + PX;

function include(scriptFile) {
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = scriptFile;
	document.getElementsByTagName("head")[0].appendChild(script);
}
