<?php	
	require('ColorTextPattern.class.php');
	require("ColorCssText.class.php");
	require("ColorHtmlText.class.php");
	require("ColorActionscriptText.class.php");
	require("TextFileWriter.class.php");
	//include('../../lib/php/FirePHPCore/fb.php');
	
	$type = $_POST["type"];
	$codes = $_POST["code"]; //Object with properties (equal to tag id/name) each containing a different code
	//$code = $codes["code1"];
	
	$json = '{';
	
	foreach($codes as $codeId => $code){
		if($type == "actionscript") $data = new ColorActionscriptText($code, "actionscript");
		else if($type == "css") $data = new ColorCssText($code, "css");
		else if($type == "html") $data = new ColorHtmlText($code, "html");
		else $data = new ColorActionscriptText($code);

		$data->format();
		$formattedCode = $data->getData();
		//$numLines = (($loader) ? $loader->getNumLines() : $data->getNumLines());
		$json .= '"' . $codeId . '":"' . $formattedCode . '",';
	}
	
	//$json .= 'numLines":"' . $numLines . '"}';
	$json .= '"END":"' . "END" . '"}';
	
	echo $json;
?>