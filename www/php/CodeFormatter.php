<?php
	//http://maestric.com/doc/mac/apache_php_mysql_snow_leopard
	/*
	<Files ~ "^\.htaccess$">
	Order allow,deny
	Deny from all
	</Files>
	*/
	
	require("TextLoader.class.php");
	require('ColorTextPattern.class.php');
	require("ColorCssText.class.php");
	require("ColorHtmlText.class.php");
	require("ColorActionscriptText.class.php");
	require("TextFileWriter.class.php");
	//include('../../lib/php/FirePHPCore/fb.php');
	
	/*
	fb('Just logging this event.',FirePHP::LOG);
	fb('Error in the email module.',FirePHP::ERROR);
	fb($_SERVER, '$_SERVER array', FirePHP::LOG);
	try {
	  throw new Exception('myexep');
	} catch(Exception $e) {
	  fb($e);
	}
	*/
	
	$code = $_POST["code"];
	$file = $_POST["file"];
	$type = $_POST["type"];
	$nextReformat = $_POST["nextFormatType"]; //for reformatting formatted output again

	$loader;
	//$file = "../flash/as3/SampleFile.as";
	
	if($file){
		$loader = new TextLoader($file);
		$loader->load();
		$code = $loader->getData();
	}else if($code){}
	
	if($type == "actionscript") $data = new ColorActionscriptText($code, "actionscript");
	else if($type == "css") $data = new ColorCssText($code, "css");
	else if($type == "html") $data = new ColorHtmlText($code, "html");
	else $data = new ColorActionscriptText($code);
	
	$data->format();
	$formattedCode = $data->getData();
	$numLines = (($loader) ? $loader->getNumLines() : $data->getNumLines());
	
	if($nextReformat){ //format formatted code again
		if($nextReformat == "actionscript") $data = new ColorActionscriptText($formattedCode, "actionscript");
		else if($nextReformat == "css") $data = new ColorCssText($formattedCode, "css");
		else if($nextReformat == "html") $data = new ColorHtmlText($formattedCode, "html");
		else $nextReformat = new ColorActionscriptText($formattedCode);
		
		$data->format();
		$data->setNumLines($numLines);
		$nextFormattedCode = $data->getData();
		//$numLines = (($loader) ? $loader->getNumLines() : $data->getNumLines());
	}
	
	$json = '{"code":"' . $formattedCode;
	if($nextFormattedCode){
		$json .= '","nextFormattedCode":"' . $nextFormattedCode;
	}
	$json .= '","numLines":"' . $numLines . '"}';
	//$resultFile = "TEMP";
	//$contents = new TextFileWriter($resultFile);
	//$contents->fwrite($json);
	echo $json;
?>