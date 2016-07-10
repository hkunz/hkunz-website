<?php
	require("../../php/TextLoader.class.php");
	ob_start(); //Buffer larger content areas like the main page content
?>

<div>
	<p class="block">I've created this Code Color Formatter HTML generator that converts plain text specifically ActionScript code into color coded text through CSS. Try it yourself, paste a piece of code into the TextArea below and click the link below to see the highlighted output.</p>
	<p class="block">
		<textarea id='codeText' name='codeText' class='codeText'><?php echo getSampleCode(); ?></textarea>
	</p>
	<div class="block">
		<a id='viewCode' href=''>Color-Format Text</a>
		<form name="orderform" class='inline'>
			<p>(
				<input type="checkbox" id='chkShowSrc' name='chkShowSrc' value='yes' checked='checked' />
				Show source HTML &amp; CSS
			)</p>
		</form>
	</div>

	<div id='codeContainer' class="block"></div>
	<!--<p class="block"><div id='instruction' name='instruction'></div></p>-->
	<div id='sourceHTML' class="block"></div>
	<div id='sourceCSS' class="block"></div>
	<h4 class='heading'>Note</h4>
	<p class="block">The list of keywords identified during the conversion may not be complete. Please do let me know if there are any bugs you find or any very common keywords i missed to include. Email me at <a href=''>harrykunz(at)hkunz.com</a>.</p>
</div>

<script type="text/javascript">
	var root = '../../';
	
	$('#viewCode').click(function(e){
		var textContents = $('#codeText').val(); //codeElement.document.getBody().getChild(0).getText(); //$('#codeText').val();
		var showSrcCode = $('#chkShowSrc').is(':checked');
		var nextFormatType = (showSrcCode) ? 'html' : '';

		textContents = textContents;
		$('#sourceHTML').html('');
		$('#sourceCSS').html('');
		$('#codeContainer').html("<div class='loadingImg'></div><p class='inline'>Processing on Server... please wait</p>");

		$.ajax({
			type: 'POST',
			context: document.body,
			url: (root + 'php/CodeFormatter.php'),
			data: {file:'', code:textContents, type:'actionscript', nextFormatType:nextFormatType},
			success: function(result, textStatus, xmlHttpRequest){
				var data = jQuery.parseJSON(result);
				var code = data.code + "";
				var nextFormattedCode = data.nextFormattedCode;
				
				$('#codeContainer').html("<p class='block'><b>Formatted Output:</b></p>" + code);
				if(showSrcCode){
					//$('#instruction').html("<p class='block'>You can copy the equivalent HTML and CSS code below</p>");
					$('#sourceHTML').html("<p class='block'><b>HTML Source Code:</b></p><p class='block'>" + nextFormattedCode + "</p>");
				}
			},
			complete: function(xmlHttpRequest, textStatus){
				if(textStatus == 'error'){
					$('#codeContainer').html('Execution Failed');
				}
			}
		});

		//ajaxLoadCode('#sourceCSS', {file:'../css/styleCodeAS.css', url:(root + 'php/CodeFormatter.php'), type:('css')});
		
		//*
		if(showSrcCode){
			$.ajax({
				type: 'POST',
				context: document.body,
				url: '../../php/CodeFormatter.php',
				data: {file:'../css/styleCodeAS.css', type:'css'},
				success: function(result, textStatus, xmlHttpRequest){
					var data = jQuery.parseJSON(result);
					var code = data.code;
				
					$('#sourceCSS').html("<p class='block'><b>CSS Source Code:</b></p>" + code);
				},
			});
		}else{
			//$('#instruction').html('');
			$('#sourceHTML').html('');
			$('#sourceCSS').html('');
		}
		//*/
		
		
		e.preventDefault();
	});

	/*
	$(function() { 
	    $('input[type="checkbox"]').bind('click',function() {
	        if($(this).is(':checked')) {
	            $('#some_textarea').html($(this).val());
	         }
	   });
	});
	*/
	
	/*
	$('#copyToClipboard').click(function(e){
		$.copy('hi there');
		e.preventDefault();
	});
	*/
</script>

<?php
	$postDate = "November 27, 2010";
	$lastUpdateDate = "November 30, 2010";
	$pageTitle = "Code Highlighter";
	$pageSubTitle = "Code Highlighter";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();

	function getSampleCode(){
		$loader = new TextLoader("../../flash/as3/SampleFile.as");
		$loader->load();
		return $loader->getData();
	}
	
	//echoCKEditor("codeText"); //useless same effect as textarea: converts " to \" and escapes others when there is a \ characters
	
	/*
	$initialValue = getSampleCode();
	$CKEditor = new CKEditor();
	//$CKEditor->basePath = '../plugins/ckeditor/';
	$CKEditor->editor("codeText", $initialValue);
	//*/
	
	/*
	function echoCKEditor($id){
		# CKEditor: / CKFinder
	  //print '<script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>';
	  //print '<script type="text/javascript" src="plugins/ckfinder/ckfinder.js"></script>';

	  print '<script type="text/javascript">';

	  # CKEditor: define CKEditor
	  print 'var editor = CKEDITOR.replace("codeText");';

	  # html generation: full HTML page (with <html>, <head> and <body> tags)
	  print 'CKEDITOR.config.fullPage = true;';

	  # toolbar: define toolbar
	  print "CKEDITOR.config.toolbar =" .
	        "[" .
	          # "['Source','-','Save','-','Preview','-','Templates']," .
	          "['Source','-','Save','-','Preview']," .
	          "['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt']," .
	          "['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat']," .
	          "['Link','Unlink','Anchor']," .
	          "['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak']," .
	          "['ShowBlocks']," .
	          "'/'," .
	          "['Styles','Format','Font','FontSize']," .
	          "['TextColor','BGColor']," .
	          "['Bold','Italic','Underline','Strike','-','Subscript','Superscript']," .
	          "['NumberedList','BulletedList','-','Outdent','Indent','Blockquote']," .
	          "['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']," .
	        "];";

	  # Automaticaly enable the "show block" command when the editor loads.
	  print 'CKEDITOR.config.startupOutlineBlocks = true;';

	  # CKFinder: define CKFinder
	  print 'CKFinder.SetupCKEditor(editor, "/ckfinder/");';

	  # CKEditor: maximize CKEditor
	  print 'CKEDITOR.on("instanceReady", function(evt) {evt.editor; editor.execCommand("maximize");});';
	  print '</script>';
	}
	*/
	
	include("../../php/master.inc.php");
?>