<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include $root . '/php/PageContent.php';
	$page = new PageContent("ColorPicker for AS2.0");
	$page->setPostDate("November 27, 2010");
	$page->setPostUpdated("November 30, 2010");
?>

<div>
	<p class='block'>I wrote the ColorPicker class for AS2.0 almost 3 years ago. All the graphics in the flash file below are dynamically drawn through methods <b>moveTo</b> and <b>lineTo</b></p>
	<div><div id='flashContent' class='flashContent'></div></div>
	<h4 class='heading'>Code at Work</h4>
	<p class='block'>The quality of the code may not look so professional as this is really old, it could have probably been written with fewer lines of code and not using the weird naming convention i adopted at my first company. But feel free to use this code, it can become handy for AS2. AS3 already has a built-in ColorPicker class</p>
	<div id='colorPickerCode'></div>
	<h4 class='heading'>Class Usage</h4>
	<p class='block'>First we need to import the class and create an instance of it. You may also like to add a "package path" like com.path.ColorPicker. In it's simplest form do:</p>
	<div id='codeStep1'></div>
	<p class='block'>The first parameter to the ColorPicker constructor is the container MovieClip followed by the x &amp; y corrdinates. The fourth parameter is the default color you want to see. You can also add listeners for [1] picker click; [2] color hover in &amp; out; [3] color click</p>
	<div id='codeStep2'></div>
	<p class='block'>Then write the callback functions with the code you want executed after the specific listener is invoked</p>
	<div id='codeStep3'></div>
	<p class='block'>Here's a list of the most common setters/getters you will most probably need to use</p>
	<div id='codeStep4'></div>
	<p class='block'>The setter function <b>setQuadrant</b> accepts either of 4 values (1,2,3,4) each pertaining to the position of the color palette as seen in a Cartesian coordinate system where value 1 corresponds to the upper right corner. The default value is 2 which corresponds to the lower right corner</p>
	<h4 class='heading'>Download Source Files</h4>
	<p class='block'>Download class file: <a class='basicLink' href='ColorPicker.as' target='_blank'>ColorPicker.as</a> and sample usage <a class='basicLink' href='ColorPicker.fla'>ColorPicker.fla</a>
	</p>
</div>

<script type="text/javascript">
	var root = '../../../';
	var codeFormatter = root + 'php/CodeFormatter.php';
	var multiCodeFormatter = root + 'php/MultiCodeFormatter.php';
	var type = 'actionscript';
	var so = new SWFObject(root + "flash/FlashLoader.swf?url=ColorPicker.swf", "theMovie", "450", "250", "8");
	var codes = {codeStep1:getCodeStep1(),codeStep2:getCodeStep2(),codeStep3:getCodeStep3(),codeStep4:getCodeStep4()};

	so.addParam("allowScriptAccess", "always");
	so.addParam("wmode", "transparent", "middle");
	so.write("flashContent"); //'../sourcefiles/as2/colorpicker/ColorPicker.as'

	ajaxLoadFormatCode('#colorPickerCode', {file:'../sourcefiles/as2/colorpicker/ColorPicker.as', url:codeFormatter, type:type});
	ajaxFormatMultiCode(multiCodeFormatter, codes, type);

	//$('#codeStep1').html(formattedCode1.code1);

	function getCodeStep1(){
		return 'import ColorPicker.as;\n\nvar container:MovieClip = this.createEmptyMovieClip("picker_mc", 0);\nvar picker:ColorPicker = new ColorPicker(container, 30, 60, 0x0066FF);';
	}

	function getCodeStep2(){
		return 'picker.addListener({\n   onColorPick:colorPickCallback, //listener on color selection click\n   onColorDisplay:colorDisplayCallback, //listener on ColorPicker click\n   onColorHover:swatchHoverCallback, //listener on color swatch roll over\n   onColorRollOut:swatchRolloutCallback //listener on color swatch roll out\n});';
	}

	function getCodeStep3(){
		return 'function colorPickCallback():Void {/*code to execute when you select a color*/}\nfunction colorDisplayCallback():Void {/*code to execute when the color Palette appears*/}\nfunction swatchHoverCallback():Void {/*code to execute when you hover on a color swatch*/}\nfunction swatchRolloutCallback():Void {/*code to execute when you roll out*/}';
	}

	function getCodeStep4(){
		return 'public function getColor():Number //returns currently selected color\npublic function getHoveredColor():Number //returns actively hovered color\npublic function showColorPalette():Void //directly displays the color palette\npublic function hideColorPalette():Void //hides/removes the color palette\npublic function setQuadrant(nQuadPos:Number):Void //sets the position of the color palette';
	}
</script>

<?php
	$page->render($page);
?>