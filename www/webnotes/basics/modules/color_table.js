/****************************************/
//AUTHOR'S INFORMATION
/****************************************
Author: Harry Roland Kunz
e-mail: har_rki219_mc2e@yahoo.com
Cell number: +639153767002
Date Created: Sept.27,2007
Company: Arrow Corporation (c)2007
All Rights Reserved
******************************************/
//HOW TO USE AND EXAMPLE
/*****************************************
USAGE:
color_table(poper ,[ColorText] , [ColorDisplay] ) all values passed must be quoted ("value")
WHERE: 
poper - is the id/name of the tag that inherits the color picker. Set it with style="display:none" so that it only displays when a button is clicked
	the button that makes the color picker appear must contain the code onclick="show_color_table(poper)"
"ColorText" is the input text box that receives the hex value of the selected color
"ColorDisplay" is any object that can receive a background color

EXAMPLE:
<html>
<head>
	<title>Kunz Color Selection Tool</title>
	<script type="text/javascript" src="color_picker.js"></script>
</head>
<body>
  <div>
  	<table><tbody><tr>
	<td><input id="ColorText" name="ColorText" type="text" size="8" readonly="readonly" />&nbsp;<span id="ColorDisplay" name="ColorDisplay" style="background-color:#FF0000;padding:10px;padding-bottom:0px;padding-top:0px;border:#000000 solid thin;border-width:1px;">&nbsp;</span></td>
	<td><input type="button" value="Choose Color" onclick="show_color_table('first_poper')" /><br />
	<span id="first_poper" name="first_poper" style="display:none;">
	<script type="text/javascript">document.write(color_table("first_poper","ColorText","ColorDisplay"))</script></span></td>
	</tr></tbody></table>
  </div>
</body>
</html>
******************************************/
function RGBToHEX(str){
	if(str.charAt(0)!="r"){
		return str.toString(16).toUpperCase(); //in case other browswers don't return rbg()
		
	}else{
    	var arr = str.split(",");
    	var R = arr[0].substring(4), G = arr[1], B = arr[2].substring(0,arr[2].length-1);
    	return "#" + DecToHex(R) + DecToHex(G) + DecToHex(B);
	}
}
function DecToHex(N) {
	hex_set = "0123456789ABCDEF";
 	return hex_set.charAt((N-N%16)/16) + hex_set.charAt(N%16);
}
function color_table(poper,color_text,color_box,ctbg){
	if(poper == null){ return "Initialization Error: No Color Poper"}
	var R = 0, G = 0, B = 0;
	poper_this_span_cur_color = poper + "prop1";
	poper_this_table_color_box = poper + "prop2";
	if(ctbg == null) ctbg = "#F7F7F7";
	if(color_box != null && color_box != "none" && color_box!="null" && document.getElementById(color_box).style.backgroundColor!="transparent"){
		var cur_color = RGBToHEX(document.getElementById(color_box).style.backgroundColor);
		cur_color = cur_color.toUpperCase();
	}else{
		var cur_color = "";
	}
	var color="this.style.backgroundColor";
	var prims = new Array("#000000","#333333","#666666","#999999","#CCCCCC","#FFFFFF","#FF0000","#00FF00","#0000FF","#FFFF00","#00FFFF","#FF00FF");
	var color_table = "<div width=\"170px\" style=\"position:absolute;padding:5px;background-color:"+ctbg+";border:black solid thin;border-width:1px;\"><div width=\"170px\"><table id=\'"+poper_this_table_color_box+"\' name=\'"+poper_this_table_color_box+"\' border=\"0\" height=\"20px\" width=\"50px\" cellpadding=\"0\" cellspacing=\"0\" onmouseover=\"this.style.cursor=\'help\'\" onclick=\"show_color_table(\'"+poper+"\',\'none\')\" style=\"background-color:"+cur_color+";border:black solid thin;border-width:1px;\"\"><td></td></table></div><div style=\"position:absolute;top:9px;right:5px;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:11px;font-weight:bold;\"><span id=\""+poper_this_span_cur_color+"\" name=\""+poper_this_span_cur_color+"\" onclick=\"show_color_table(\'"+poper+"\',\'none\')\" onmouseover=\"this.style.cursor=\'help\',this.style.backgroundColor=\'black\',this.style.color=\'white\'\" onmouseout=\"this.style.backgroundColor=\'"+ctbg+"\',this.style.color=\'black\'\">"+cur_color+"</span>&nbsp;&nbsp;";
	color_table = color_table.concat("<span onclick=\"show_color_table(\'",poper,"\',\'none\')\" onmouseover=\"this.style.cursor=\'help\',document.getElementById(\'",poper_this_span_cur_color,"\').innerHTML=\'&nbsp;\',document.getElementById(\'",poper_this_table_color_box,"\').style.backgroundColor=\'transparent',this.style.backgroundColor=\'black\',this.style.color=\'white\'");
	if(color_box != null && color_box != "none" && color_box!="null"){
		color_table = color_table.concat(",document.getElementById(\'",color_box,"\').style.backgroundColor=\'transparent\'");
	}
	if(color_text != null && color_text != "none" && color_text!="null"){
				color_table = color_table.concat(",document.getElementById(\'",color_text,"\').value=\'transparent\'");
	}
	color_table = color_table.concat("\" onmouseout=\"this.style.backgroundColor=\'",ctbg,"',this.style.color=\'black\'\">TRANSPARENT</span></div><div style=\"margin-top:5px;border:solid black thin;border-width:1px;\"><table width=\"170px\" height=\"120px\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\"><tr>");
//Start
	for(n=0;n<12;n++){
		for(m=0;m<=20;m++){
			color_table = color_table.concat("<td onclick=\"show_color_table(\'",poper,"\',\'none\')\" onmouseover=\"this.style.cursor=\'help\',document.getElementById(\'",poper_this_span_cur_color,"\').innerHTML=RGBToHEX(",color,")");
			if(color_text != null && color_text != "none" && color_text!="null"){
				color_table = color_table.concat(",document.getElementById(\'",color_text,"\').value=RGBToHEX(",color,")");
			}
			if(color_box != null && color_box != "none" && color_box!="null"){
				color_table = color_table.concat(",document.getElementById(\'",color_box,"\').style.backgroundColor=",color);
			}
			color_table = color_table.concat(",document.getElementById(\'",poper_this_table_color_box,"\').style.backgroundColor=",color,"\" style=\"background-color:");
			if(m==1){
				color_table = color_table.concat(prims[n],";\"></td>");
			}else if(m==0 || m==2) {
				color_table = color_table.concat("#000000;\"></td>");
			}else{
				color_table = color_table.concat("rgb(",R,",",G,",",B,");\"></td>");
				G += 51;
				if(G >= 286){ G = 0; R += 51; }
			}
		}
		B += 51;
		if(B>=286) B=0;
		R = G = 0;
		if(n>4) R = 153;
		color_table = color_table.concat("</tr>");
	}
	color_table = color_table.concat("</table></div></div>");
	return color_table;
}
function show_color_table(poper,display){
		if(display == null) display = "block";
		document.getElementById(poper).style.display = display;
}