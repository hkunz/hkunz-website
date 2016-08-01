"use strict";
var animations = animations || {};

animations.ContentAnimator = function(contentElemId, titleElemId, buttonId) {
	this.contentElemId = contentElemId;
	this.titleElemId = titleElemId;
	this.buttonId = buttonId;
	document.addEventListener("DOMContentLoaded", this.onDOMContentLoaded.bind(this), false);
}

animations.ContentAnimator.prototype.onDOMContentLoaded = function() {
	setTimeout(this.animateContent.bind(this), 500);
}

animations.ContentAnimator.prototype.animateContent = function() {
	this.contentElemId.css("visibility", "visible");
	this.wrapCharactersWithSpans(this.titleElemId);
	TweenMax.staggerFromTo(this.titleElemId.find("span"), 0.4, {autoAlpha:0, backgroundColor:"#f33"}, {autoAlpha:1, backgroundColor:"#fff"}, 0.05);

	var block = this.contentElemId.find(".block");
	if (block) {
		TweenMax.fromTo(block, 0.7, {autoAlpha:0, scale:1.03}, {autoAlpha:1, scale:1, ease: Strong.easeIn});
	}

	TweenMax.fromTo(this.contentElemId.find("img"), 1, {autoAlpha:0, scale:0.9}, {autoAlpha:1, scale:1, ease: Strong.easeOut});

	var self = this;
	var lines = this.contentElemId.find("li");
	lines.each(function() {
		var singleLine = $(this);
		var line = singleLine.find("a");
		if (line.length <= 0) {
			line = singleLine;
		}
		self.wrapCharactersWithSpans(line);
		TweenMax.staggerFromTo(line.find("span"), 0.4, {autoAlpha:0, backgroundColor:"#000"}, {autoAlpha:1, backgroundColor:"#fff"}, 0.05);
	});

	if (this.buttonId) {
		TweenMax.fromTo(this.buttonId, 0.7, {autoAlpha:0, scale:0}, {autoAlpha:1, scale:1, ease: Bounce.easeIn});
	}
}

animations.ContentAnimator.prototype.wrapCharactersWithSpans = function(elem) {
	if (elem.html()) {
		elem.html(elem.html().replace(/./g, "<span>$&</span>").replace(/\s/g, " "));
	}
}

animations.ContentAnimator.prototype.wrapWordsWithSpans = function(elem) {
	elem.html(elem.html().replace(/\w+/g, "<span>$&</span>"));
}