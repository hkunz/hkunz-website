<?php
	ob_start();
?>

<div>
	<p class="block">
These are just some notes i took from <a class='basicLink' href='http://w3schools.com' target="_blank"><strong>w3schools</strong></a> implementing everything it demonstrated in a visualized and summarized way. Just inspect the page source code of each document to see the different implementations.
	</p>
	<ul class="menu">
<ol><a class='basicLink' href='xhtml/HTML_Notes1.htm' target="_blank">HTML Notes 1</a></ol>
<ol><a class='basicLink' href='xhtml/HTML_Notes2.htm' target="_blank">HTML Notes 2</a></ol>
<ol><a class='basicLink' href='xhtml/HTML_Advance.htm' target="_blank">HTML Notes 3</a></ol>
<ol><a class='basicLink' href='xhtml/XHTML_Notes.htm' target="_blank">XHTML Notes</a></ol>
<ol><a class='basicLink' href='xhtml/Entities.htm' target="_blank">HTML Entities</a></ol>
<ol><a class='basicLink' href='xhtml/Frames.htm' target="_blank">Frames Example</a></ol>
<ol><a class='basicLink' href='xhtml/URLEncRef.htm' target="_blank">HTML URL-Encoding</a></ol>
<ol><a class='basicLink' href='xhtml/ValidateHTML.htm' target="_blank">Validating HTML</a></ol>
<ol><a class='basicLink' href='xhtml/Colors/CB_Color_Names.htm' target="_blank">HTML Color Names</a></ol>
<ol><a class='basicLink' href='xhtml/Colors/CB_Color_Values.htm' target="_blank">Cross-browser Color Values</a></ol>
<ol><a class='basicLink' href='xhtml/Colors/Standard_Colors.htm' target="_blank">Standard Colors</a></ol>
<ol><a class='basicLink' href='xml/xml-notes.html' target="_blank">XML Notes</a></ol>
<ol><a class='basicLink' href='asp/asp-notes.html' target="_blank">ASP Notes</a></ol>
<ol><a class='basicLink' href='js/JScript_Notes.htm' target="_blank">JavaScript Notes</a></ol>
<ol><a class='basicLink' href='js/JScript_Advance.htm' target="_blank">JavaScript Advanced Notes</a></ol>
<ol><a class='basicLink' href='js/JScript_Objects.htm' target="_blank">JavaScript Objects</a></ol>
<ol><a class='basicLink' href='js/Cookies.htm' target="_blank">Cookies</a></ol>
<ol><a class='basicLink' href='css/CSS_Notes.htm' target="_blank">CSS Notes</a></ol>
<ol><a class='basicLink' href='css/CSS_Advance1.htm' target="_blank">CSS Notes Advanced 1</a></ol>
<ol><a class='basicLink' href='css/CSS_Advance2.htm' target="_blank">CSS Notes Advanced 2</a></ol>
<ol><a class='basicLink' href='tcpip/tcpip.html' target="_blank">TCP/IP Notes</a></ol>
<!-- TODO add sql notes -->
	</ul>
</div>
	
<?php
	$pageTitle = "Web Notes Basics";
	$pageSubTitle = "Web Notes Basics";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../../php/master.inc.php");
?>
