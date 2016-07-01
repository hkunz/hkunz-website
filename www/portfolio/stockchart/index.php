<?php
  ob_start();
  $link = "<a class='basicLink' href='https://github.com/hkunz/stock-chart' target='_blank'>github</a>";
  $swflink = "<a class='basicLink' href='http://www.hkunz.com/portfolio/stockchart/StockTrade.php' target='_blank'>here</a>";
?>

<div>
	<p>Random stock chart. Code at <?php echo $link;?>. Click <?php echo $swflink;?> for larger view<br/><br/></p>
	<div><div id='flashContent' name='flashContent' class='flashContent'></div></div>
</div>

<script language="javascript" type="text/javascript">
        var root = '../../';
        var type = 'actionscript';
        var so = new SWFObject(root + "flash/FlashLoader.swf?url=StockTrade.swf", "theMovie", "445", "590", "8");
        
        so.addParam("allowScriptAccess", "always");
        so.addParam("wmode", "transparent", "middle");
        so.write("flashContent");
</script>

<?php
	$pageTitle = "Stock Chart";
	$headers = "";
	$pageMainContent = ob_get_contents();
	ob_end_clean();

	include("../../php/master.inc.php");
?>
