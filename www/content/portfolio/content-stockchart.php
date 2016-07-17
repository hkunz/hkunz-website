<?php
	$page->setPageTitle("Random Stock Chart");
	$img = $page->getImagePath();
	$link = "<a class='basicLink' href='https://github.com/hkunz/stock-chart' target='_blank'>github</a>";
	$swflink = "<a class='basicLink' href='" . "/content/portfolio/content-stocktrade-full.php' target='_blank'>here</a>";
?>
<p>Random stock chart. Code at <?php echo $link;?>. Click <?php echo $swflink;?> for larger view<br/><br/></p>
<div><div id='flashContent' class='flashContent'></div></div>
<script type="text/javascript">
	var root = '../../';
	var flash = root + "assets/bin/";
	var type = 'actionscript';
	var so = new SWFObject(flash + "portfolio/flashloader.swf?url=" + flash + "portfolio/stocktrade.swf", "theMovie", "445", "590", "8");
	so.addParam("allowScriptAccess", "always");
	so.addParam("wmode", "transparent", "middle");
	so.write("flashContent");
</script>