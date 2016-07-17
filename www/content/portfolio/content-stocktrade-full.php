<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
<meta charset="UTF-8" />
<title>Stock Graph</title>
<script type="text/javascript">AC_FL_RunContent = 0;</script>
<script type="text/javascript"
	src="Library/Javascript/AC_RunActiveContent.js"></script>
<script type="text/javascript" src="library/js/swfobject.js"></script>
<style type="text/css">
#flashcontent {
	margin-left: auto;
	margin-right: auto;
	width: 700px;
}

* {
	margin: 0;
	padding: 0;
}

html, body {
	height: 100%;
	width: 100%;
}

#outer {
	height: 100%;
	width: 100%;
	display: table;
	vertical-align: middle;
}

.centerme {
	text-align: center;
}

#container {
	display: table-cell; //
	vertical-align: middle;
}

#inner {
	text-align: center;
	margin-left: auto;
	margin-right: auto;
}
</style>
</head>

<body bgcolor="#FFFBE6">
	<h1 class="centerme">Random Share Price Chart</h1>
	<div id="outer">
		<div id="container">
			<div id="inner">
				<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
					codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0"
					width="700" height="520" id="SzSystem" align="top">
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="allowFullScreen" value="false" />
					<param name="movie" value="/assets/bin/portfolio/stocktrade.swf" />
					<param name="quality" value="high" />
					<param name="salign" value="lt" />
					<param name="wmode" value="transparent" />
					<param name="bgcolor" value="#ffffff" />
					<embed src="/assets/bin/portfolio/stocktrade.swf" width="700" height="520" align="top" type="application/x-shockwave-flash" />
				</object>
			</div>
		</div>
	</div>
</body>
</html>