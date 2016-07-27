if (true) {

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

function wrapCharactersWithSpans(elem) {
	if (elem.html()) {
		elem.html(elem.html().replace(/./g, "<span>$&</span>").replace(/\s/g, " "));
	}
}

function wrapWordsWithSpans(elem) {
	elem.html(elem.html().replace(/\w+/g, "<span>$&</span>"));
}

}