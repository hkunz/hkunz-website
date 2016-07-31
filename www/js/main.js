document.addEventListener("DOMContentLoaded", onDOMContentLoaded, false);

function onDOMContentLoaded() {
	initBabylonEngine();
	setTimeout(animateContent, 500);
}

function animateContent() {
	$("#pageContent").css("visibility", "visible");
	var pageTitle = $("#pageTitle");
	wrapCharactersWithSpans(pageTitle);
	TweenMax.staggerFromTo(pageTitle.find("span"), 0.4, {autoAlpha:0, backgroundColor:"#f33"}, {autoAlpha:1, backgroundColor:"#fff"}, 0.05);

	var pageContent = $("#pageContent");

	var block = pageContent.find(".block");
	if (block) {
		TweenMax.fromTo(block, 0.7, {autoAlpha:0, scale:1.03}, {autoAlpha:1, scale:1, ease: Strong.easeIn});
	}

	TweenMax.fromTo(pageContent.find("img"), 1, {autoAlpha:0, scale:0.9}, {autoAlpha:1, scale:1, ease: Strong.easeOut});

	var lines = pageContent.find("li");
	lines.each(function() {
		var singleLine = $(this);
		var line = singleLine.find("a");
		if (line.length <= 0) {
			line = singleLine;
		}
		wrapCharactersWithSpans(line);
		TweenMax.staggerFromTo(line.find("span"), 0.4, {autoAlpha:0, backgroundColor:"#000"}, {autoAlpha:1, backgroundColor:"#fff"}, 0.05);
	});

	var backButton = $(".pagebutton");
	if (backButton) {
		TweenMax.fromTo(backButton, 0.7, {autoAlpha:0, scale:0}, {autoAlpha:1, scale:1, ease: Bounce.easeIn});
	}
}

function wrapCharactersWithSpans(elem) {
	if (elem.html()) {
		elem.html(elem.html().replace(/./g, "<span>$&</span>").replace(/\s/g, " "));
	}
}

function wrapWordsWithSpans(elem) {
	elem.html(elem.html().replace(/\w+/g, "<span>$&</span>"));
}

//*
var background = background || {};
background.canvas = null;
background.engine = null;
background.scene = null;
background.camera = null;

function initBabylonEngine() {
	if (BABYLON.Engine.isSupported()) {
		initBackgroundScene();
		initBackgroundSceneProperties();
	}
}

function initBackgroundScene() {
	var ctarget = new BABYLON.Vector3(0,0,0);
	background.canvas = document.getElementById("bgcanvas");
	background.engine = new BABYLON.Engine(background.canvas, true);
	background.scene = new BABYLON.Scene(background.engine);
	background.camera = new BABYLON.FreeCamera("camera", ctarget, background.scene);
	background.camera.setTarget(ctarget);
	background.camera.attachControl(background.canvas); //FreeCamera
	var light = new BABYLON.PointLight("light", new BABYLON.Vector3(0,0,0), background.scene);
	background.engine.runRenderLoop(onRenderLoop);
}

var inc = 0.0005;

function onRenderLoop() {
	background.scene.render();
	background.camera.rotation.y += 0.0005;
	background.camera.rotation.x += inc;
	background.camera.rotation.z += 0.1;
	if (background.camera.rotation.x > 1 || background.camera.rotation.x < -1) {
		inc = -inc;
	}
}

function initBackgroundSceneProperties() {
	var skybox = BABYLON.Mesh.CreateBox("skybox", 100.0, background.scene);
	var skyboxMaterial = new BABYLON.StandardMaterial("skybox", background.scene);
	skyboxMaterial.backFaceCulling = false;
	skyboxMaterial.diffuseColor = new BABYLON.Color3(0, 0, 0);
	skyboxMaterial.specularColor = new BABYLON.Color3(0, 0, 0);
	skyboxMaterial.reflectionTexture = new BABYLON.CubeTexture("/assets/models/skybox/cubemap", background.scene);
	skyboxMaterial.reflectionTexture.coordinatesMode = BABYLON.Texture.SKYBOX_MODE;
	skybox.material = skyboxMaterial;

	background.camera.position.x = 0;
	background.camera.position.y = 0;
	background.camera.position.z = 0;

	/*for (var i = 0; i < 1000; ++i) {
		var sphere = BABYLON.Mesh.CreateSphere("sphere1", 16, 2, background.scene);
		sphere.position.x = -100 + Math.random() * 200;
		sphere.position.y = -100 + Math.random() * 200;
		sphere.position.z = -100 + Math.random() * 200;
	}*/
}
//*/

/*
var homescene = null;
var time = 0;

document.addEventListener("DOMContentLoaded", onDOMContentLoaded2, false);

function onDOMContentLoaded2() {
	if (BABYLON.Engine.isSupported()) {
		createScene();
	}
}

function createScene () {
	var canvas = document.getElementById("homecanvas");
	var engine = new BABYLON.Engine(canvas, true);
	homescene = new BABYLON.Scene(engine);
	homescene.clearColor = BABYLON.Color3.Black();

	var camera = new BABYLON.ArcRotateCamera("Camera", 0, Math.PI / 2, 400, BABYLON.Vector3.Zero(), homescene);
	camera.setTarget(BABYLON.Vector3.Zero());
	camera.attachControl(canvas, false);

	var light = new BABYLON.PointLight('light1', new BABYLON.Vector3(0,0,10), homescene); 
	light.position = camera.position;

	var tunnelTexture = new BABYLON.Texture("/assets/images/bgtexture.jpg", homescene);
	var tunnelShader = new BABYLON.PostProcess("Tunnel", "http://www.synergy-development.fr/tunnel/shaders/tunnel", ["time"], ["tunnelSampler"], 0.9, camera);
	var time = 0.0;

	homescene.registerBeforeRender(function () {
	    time += 0.005;
	});

	tunnelShader.onApply = function (effect) {
		effect.setFloat("time", -time / 5.0);
		if (tunnelTexture.isReady()) {
			effect.setTexture("tunnelSampler", tunnelTexture);
		}
	};
	engine.runRenderLoop(onRenderLoop);
};

function onRenderLoop() {
	homescene.render();
}

//*/