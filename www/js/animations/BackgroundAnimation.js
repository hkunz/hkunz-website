"use strict";
var animations = animations || {};

animations.BackgroundAnimation = function(canvasName) {
	this.canvasName = canvasName;
	this.canvas = null;
	this.engine = null;
	this.scene = null;
	this.camera = null;
	this.inc = 0.0005;
	document.addEventListener("DOMContentLoaded", this.onDOMContentLoaded.bind(this), false);
}

animations.BackgroundAnimation.prototype.onDOMContentLoaded = function() {
	this.initBabylonEngine();
}

animations.BackgroundAnimation.prototype.initBabylonEngine = function() {
	if (BABYLON.Engine.isSupported()) {
		this.initBackgroundScene();
		this.initBackgroundSceneProperties();
	}
}

animations.BackgroundAnimation.prototype.initBackgroundScene = function () {
	var ctarget = new BABYLON.Vector3(0,0,0);
	this.canvas = document.getElementById(this.canvasName);
	this.engine = new BABYLON.Engine(this.canvas, true);
	this.scene = new BABYLON.Scene(this.engine);
	this.camera = new BABYLON.FreeCamera("camera", ctarget, this.scene);
	this.camera.setTarget(ctarget);
	this.camera.attachControl(this.canvas); //FreeCamera
	this.camera.position.x = 0;
	this.camera.position.y = 0;
	this.camera.position.z = 0;
	var light = new BABYLON.PointLight("light", new BABYLON.Vector3(0,0,0), this.scene);
	this.engine.runRenderLoop(this.onRenderLoop.bind(this));
}

animations.BackgroundAnimation.prototype.onRenderLoop = function () {
	this.scene.render();
	this.camera.rotation.y += 0.0005;
	this.camera.rotation.x += this.inc;
	if (this.camera.rotation.x > 1 || this.camera.rotation.x < -1) {
		this.inc = -this.inc;
	}
}

animations.BackgroundAnimation.prototype.initBackgroundSceneProperties = function () {
	var skybox = BABYLON.Mesh.CreateBox("skybox", 100.0, this.scene);
	var skyboxMaterial = new BABYLON.StandardMaterial("skybox", this.scene);
	skyboxMaterial.backFaceCulling = false;
	skyboxMaterial.diffuseColor = new BABYLON.Color3(0, 0, 0);
	skyboxMaterial.specularColor = new BABYLON.Color3(0, 0, 0);
	skyboxMaterial.reflectionTexture = new BABYLON.CubeTexture("/assets/models/skybox/cubemap", this.scene);
	skyboxMaterial.reflectionTexture.coordinatesMode = BABYLON.Texture.SKYBOX_MODE;
	skybox.material = skyboxMaterial;
}