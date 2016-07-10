<?php
	ob_start();
?>

<div>
	<p class='block'>A very old version of my Polygon class can be seen below. It was in AS2.0 but i've rewritten the class for AS3.0. You will notice that as you increase the number of sides, the polygon will approximate the shape of a circle. Thus you can also define a circle as a polygon with infinite sides.</p>
	<div><div id='flashContent' class='flashContent'></div></div>
	<h4 class='heading'>Once deep in thoughts</h4>
	<p class='block'>I've always had a profound interest for geometry and mathematics. There was a time a few years back when the polygon sparked my interest because of it's shape nearing that of a circle as you increase the number of sides. While i was trying to solve for the formula for getting the area of any regular polygon (one with each side equal) using integral calculus i was also able to derive the value of PI (~3.14). As i substituted increased values of polygonal sides, my results came closer and closer to the true value of PI (3.141592653589793).</p>
	<h4 class='heading'>Code at Work</h4>
	<p class='block'>Here is the AS3.0 code for the Polygon class. That is all you need.</p>
	<div id='polygonClassCode'></div>
</div>

<script type="text/javascript">
	var root = '../../../';
	var codeFormatter = root + 'php/CodeFormatter.php';
	var multiCodeFormatter = root + 'php/MultiCodeFormatter.php';
	var type = 'actionscript';
	var so = new SWFObject(root + "flash/FlashLoader.swf?url=Polygon.swf", "theMovie", "420", "265", "8");
	var codes = {codeStep1:getCodeStep1()};
	
	so.addParam("allowScriptAccess", "always");
	so.addParam("wmode", "transparent", "middle");
	so.write("flashContent");
	
	ajaxLoadFormatCode('#polygonClassCode', {file:'../sourcefiles/as3/polygon/Polygon.as', url:codeFormatter, type:type});
	ajaxFormatMultiCode(multiCodeFormatter, codes, type);
	
	//$('#codeStep1').html(formattedCode1.code1);
	
	
	function getCodeStep1(){
		return 'var numSides:Number = 5;var radius:Number = 100;\nvar container:MovieClip = this.createEmptyMovieClip("pentagon", 0);\nvar polygon:Polygon = new Polygon(0, 0, radius, numSides, container, this.getNextHighestDepth(), 3, 0x000000, 100, 0x0066FF, 80);';
	}

</script>
	
<?php
	$postDate = "November 30, 2010";
	$lastUpdateDate = "November 30, 2010";
	$pageTitle = "Polygon for AS3.0";
	$pageSubTitle = "Polygon for AS3.0";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	include('../../../php/master.inc.php');
?>