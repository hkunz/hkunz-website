<?php
	ob_start();
?>

<div>
	<p class="block">
These are just some notes i took from <a class='basicLink' href='http://w3scholis.com' target="_blank"><strong>w3scholis</strong></a> implementing everything it demonstrated in a visualized and summarized way. Just inspect the page source code of each document to see the different implementations.
	</p>
	<ul class="menu" style="list-style-type: none;">
<li><a class='basicLink' href='xhtml/HTML_Notes1.htm' target="_blank">HTML Notes 1</a></li>
<li><a class='basicLink' href='xhtml/HTML_Notes2.htm' target="_blank">HTML Notes 2</a></li>
<li><a class='basicLink' href='xhtml/HTML_Advance.htm' target="_blank">HTML Notes 3</a></li>
<li><a class='basicLink' href='xhtml/XHTML_Notes.htm' target="_blank">XHTML Notes</a></li>
<li><a class='basicLink' href='xhtml/Entities.htm' target="_blank">HTML Entities</a></li>
<li><a class='basicLink' href='xhtml/URLEncRef.htm' target="_blank">HTML URL-Encoding</a></li>
<li><a class='basicLink' href='xhtml/ValidateHTML.htm' target="_blank">Validating HTML</a></li>
<li><a class='basicLink' href='xhtml/Colors/CB_Color_Names.htm' target="_blank">HTML Color Names</a></li>
<li><a class='basicLink' href='xhtml/Colors/CB_Color_Values.htm' target="_blank">Cross-browser Color Values</a></li>
<li><a class='basicLink' href='xhtml/Colors/Standard_Colors.htm' target="_blank">Standard Colors</a></li>
<li><a class='basicLink' href='xml/xml-notes.html' target="_blank">XML Notes</a></li>
<li><a class='basicLink' href='asp/asp-notes.html' target="_blank">ASP Notes</a></li>
<li><a class='basicLink' href='js/JScript_Notes.htm' target="_blank">JavaScript Notes</a></li>
<li><a class='basicLink' href='js/JScript_Advance.htm' target="_blank">JavaScript Advanced Notes</a></li>
<li><a class='basicLink' href='js/JScript_Objects.htm' target="_blank">JavaScript Objects</a></li>
<li><a class='basicLink' href='js/Cookies.htm' target="_blank">Cookies</a></li>
<li><a class='basicLink' href='css/CSS_Notes.htm' target="_blank">CSS Notes</a></li>
<li><a class='basicLink' href='css/CSS_Advance1.htm' target="_blank">CSS Notes Advanced 1</a></li>
<li><a class='basicLink' href='css/CSS_Advance2.htm' target="_blank">CSS Notes Advanced 2</a></li>
<li><a class='basicLink' href='tcpip/tcpip.html' target="_blank">TCP/IP Notes</a></li>
<li><a class='basicLink' href='sql/SQL_Notes.htm' target="_blank">SQL Notes</a></li>
<li><a class='basicLink' href='sql/SQL_Advance1.htm' target="_blank">SQL Advanced Notes 1</a></li>
<li><a class='basicLink' href='sql/SQL_Advance2.htm' target="_blank">SQL Advanced Notes 2</a></li>
<li><a class='basicLink' href='sql/SQL_QuickRef.htm' target="_blank">SQL Quick Reference</a></li>
<li><a class='basicLink' href='sql/'>SQL Arithmetics Notes</a></li>
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
