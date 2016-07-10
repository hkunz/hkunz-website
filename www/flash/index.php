<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Project</title>
<script type="text/javascript" src="../js/swfobject.js"></script>
<style type="text/css">
	#flashContent{
		margin-left: auto;
		margin-right: auto;
		width: 1000px;
		height: 300px;
	}

	*{
		margin: 10px;
		padding: 0;
	}

	html, body { 
		height:100%;
		width:100%;
	}
</style>
</head>

<body bgcolor="#FFFBE6">
	<div id="flashContent">content here</div>
	<script type="text/javascript">
		// <![CDATA[
		var so = new SWFObject("FlashLoader.swf?url=ColorPicker.swf&pWidth=450&pHeight=20", "theMovie", "1000", "300", "8");
		so.addParam("allowScriptAccess", "always");
		so.addParam("wmode", "transparent", "middle");
		so.write("flashContent");
		// ]]>
	</script>
</body>
</html>
