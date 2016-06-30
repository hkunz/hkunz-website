window.document.onkeydown = function (e) {
	if (!e) {
		e = event;
	}
	if (e.keyCode == 27) {
		lightbox_close();
	}
}

function lightbox_open(light, fade) {
	window.scrollTo(0,0);
	//alert('bitch ' + light + " " + fade); //WTF is HTMLDivElement !!!!! anstatt string!!!
	//document.getElementById(light).style.display='block';
	//document.getElementById(fade).style.display='block';  
	light.style.display='block';
	fade.style.display='block';
}

function lightbox_close(light, fade) {
	//document.getElementById(light).style.display='none';
	//document.getElementById(fade).style.display='none';
	light.style.display='none';
	fade.style.display='none';
}
