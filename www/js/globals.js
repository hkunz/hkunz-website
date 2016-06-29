function ajaxLoadFormatCode(tagID, properties){ //properties = {url:'php/LoadCode.php',file'Sample.as',type:'actionscript'}
	$(tagID).html("Loading Code... ");
	$.ajax({
		type: 'POST',
		url: properties.url,
		data: {file:properties.file, type:properties.type, code:properties.code},
		success: function(result, textStatus, xmlHttpRequest){
			var data = jQuery.parseJSON(result);
			$(tagID).html(data.code);
		},
		dataType: 'string',
		complete: function(xmlHttpRequest, textStatus){
			if(textStatus == 'error'){
				$(tagID).html('Execution Failed');
			}
		}
	});
}

/*
codes = object of properties names equal to html tag id/name corresponding to code holder
url = MultiCodeFormatter.php
type = actionscript, css, html, etc
*/
function ajaxFormatMultiCode(url, codes, type){
	//$(tagID).html("Loading Code... ");
	$.each(codes, function(key, value) { 
	  $('#' + key).html("Loading Code ...");
	});
	$.ajax({
		type: 'POST',
		url: url,
		data: {code:codes, type:type},
		success: function(result, textStatus, xmlHttpRequest){
			var data = jQuery.parseJSON(result);
			$.each(data, function(key, value) { 
			  $('#' + key).html(value);
			});
		},
		dataType: 'string',
		complete: function(xmlHttpRequest, textStatus){
			if(textStatus == 'error'){
				$.each(codes, function(key, value) { 
				  $('#' + key).html("Execution Failed");
				});
			}
		}
	});
}