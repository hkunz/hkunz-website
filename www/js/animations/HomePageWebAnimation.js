"use strict";
var animations = animations || {};

animations.HomePageWebAnimation = function(canvasName) {
	this.canvasName = canvasName;
	this.engine = null;
	this.canvas = null;
	this.scene = null;
	this.camera = null;
	this.light = null;
	this.incA = 0.004;
	this.incB = 0.002;
	document.addEventListener("DOMContentLoaded", this.onDOMContentLoaded.bind(this), false);
}

animations.HomePageWebAnimation.prototype.onDOMContentLoaded = function() {
	if (BABYLON.Engine.isSupported()) {
		this.createScene();
	}
}

animations.HomePageWebAnimation.prototype.createScene = function() {
	this.canvas = document.getElementById(this.canvasName);
	this.engine = new BABYLON.Engine(this.canvas, true);
	this.scene = new BABYLON.Scene(this.engine);
	this.scene.clearColor = new BABYLON.Color3(1,1,1);
	this.camera = new BABYLON.ArcRotateCamera("camera", 1.0, 1.0, 12, BABYLON.Vector3.Zero(), this.scene);
	this.camera.attachControl(this.canvas, false);
	this.light = new BABYLON.HemisphericLight("hemi", new BABYLON.Vector3(1, 1, 1), this.scene);

	this.light.groundColor = new BABYLON.Color3(1.0,1.0,1.0);

	var box = BABYLON.Mesh.CreateBox("box", 5, this.scene);
	box.showBoundingBox = false;

	var texture = new BABYLON.Texture("/assets/images/logo.jpg", this.scene);
	var f = new BABYLON.StandardMaterial("material0",this.scene);
	f.diffuseTexture = texture;
	var ba = new BABYLON.StandardMaterial("material1",this.scene);
	ba.diffuseTexture = texture;
	var l = new BABYLON.StandardMaterial("material2",this.scene);
	l.diffuseColor = new BABYLON.Color3(0.9, 0.9, 0.9);
	l.diffuseTexture = texture;
	var r = new BABYLON.StandardMaterial("material3",this.scene);
	r.diffuseColor = new BABYLON.Color3(0.8, 0.8, 0.8);
	r.diffuseTexture = texture;
	var t = new BABYLON.StandardMaterial("material4",this.scene);
	t.diffuseColor = new BABYLON.Color3(0.9, 0.7, 0.7);
	t.diffuseTexture = texture
	var bo = new BABYLON.StandardMaterial("material5",this.scene);
	bo.diffuseTexture = texture;
	bo.diffuseColor = new BABYLON.Color3(0.7, 0.7, 0.7);

	var multi = new BABYLON.MultiMaterial("multimat",this.scene);
	multi.subMaterials.push(f);
	multi.subMaterials.push(ba);
	multi.subMaterials.push(l);
	multi.subMaterials.push(r);
	multi.subMaterials.push(t);
	multi.subMaterials.push(bo);

	box.subMeshes = [];
	var verticesCount = box.getTotalVertices();
	box.subMeshes.push(new BABYLON.SubMesh(0, 0, verticesCount, 0, 6, box));
	box.subMeshes.push(new BABYLON.SubMesh(1, 1, verticesCount, 6, 6, box));
	box.subMeshes.push(new BABYLON.SubMesh(2, 2, verticesCount, 12, 6, box));
	box.subMeshes.push(new BABYLON.SubMesh(3, 3, verticesCount, 18, 6, box));
	box.subMeshes.push(new BABYLON.SubMesh(4, 4, verticesCount, 24, 6, box));
	box.subMeshes.push(new BABYLON.SubMesh(5, 5, verticesCount, 30, 6, box));
	box.material = multi;
	this.engine.runRenderLoop(this.onRenderLoop.bind(this));
};

animations.HomePageWebAnimation.prototype.onRenderLoop = function() {
	this.scene.render();
	this.camera.alpha += this.incA;
	if (this.camera.beta > 1 || this.camera.beta < -1) {
		this.incB = -this.incB;
	}
}
