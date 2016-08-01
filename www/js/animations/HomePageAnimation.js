"use strict";
var animations = animations || {};

animations.HomePageAnimation = function(canvasName) {
	this.canvasName = canvasName;
	this.engine = null;
	this.canvas = null;
	this.scene = null;
	this.camera = null;
	this.light = null;
	this.time = 0.0;
	document.addEventListener("DOMContentLoaded", this.onDOMContentLoaded.bind(this), false);
}

animations.HomePageAnimation.prototype.onDOMContentLoaded = function() {
	if (BABYLON.Engine.isSupported()) {
		this.createScene();
	}
}

animations.HomePageAnimation.prototype.createScene = function() {
	this.canvas = document.getElementById(this.canvasName);
	this.engine = new BABYLON.Engine(this.canvas, true);
	this.scene = new BABYLON.Scene(this.engine);
	this.scene.clearColor = BABYLON.Color3.Black();

	this.camera = new BABYLON.ArcRotateCamera("Camera", 0, Math.PI / 2, 400, BABYLON.Vector3.Zero(), this.scene);
	this.camera.setTarget(BABYLON.Vector3.Zero());
	this.camera.attachControl(this.canvas, false);

	this.light = new BABYLON.PointLight('light1', new BABYLON.Vector3(0,0,10), this.scene); 
	this.light.position = this.camera.position;

	var tunnelTexture = new BABYLON.Texture("/assets/images/bgtexture.jpg", this.scene);
	var tunnelShader = new BABYLON.PostProcess("Tunnel", "http://www.synergy-development.fr/tunnel/shaders/tunnel", ["time"], ["tunnelSampler"], 0.9, this.camera);

	var self = this;
	this.scene.registerBeforeRender(function () {
	    self.time += 0.005;
	});

	tunnelShader.onApply = function (effect) {
		effect.setFloat("time", -self.time / 5.0);
		if (tunnelTexture.isReady()) {
			effect.setTexture("tunnelSampler", tunnelTexture);
		}
	};
	this.engine.runRenderLoop(this.onRenderLoop.bind(this));
};

animations.HomePageAnimation.prototype.onRenderLoop = function() {
	this.scene.render();
}
