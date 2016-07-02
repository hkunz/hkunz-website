<?php
	ob_start();
?>

<div>
	<p class="block">
SQL Arithmetics Notes
	</p>
	<ul class="menu">
<ol><a class='basicLink' href='Functions/COUNT.HTM' target="_blank">SQL COUNT Function</a></ol>
<ol><a class='basicLink' href='Functions/count_ast.htm' target="_blank">SQL COUNT(*) Function</a></ol>
<ol><a class='basicLink' href='Functions/count_distinct.htm' target="_blank">SQL COUNT DISTINCT Function</a></ol>
<ol><a class='basicLink' href='Functions/AVG.HTM' target="_blank">SQL AVG Function</a></ol>
<ol><a class='basicLink' href='Functions/FIRST.HTM' target="_blank">SQL FIRST Function</a></ol>
<ol><a class='basicLink' href='Functions/LAST.HTM' target="_blank">SQL LAST Function</a></ol>
<ol><a class='basicLink' href='Functions/MIN.HTM' target="_blank">SQL MIN Function</a></ol>
<ol><a class='basicLink' href='Functions/MAX.HTM' target="_blank">SQL MAX Function</a></ol>
<ol><a class='basicLink' href='Functions/SUM.HTM' target="_blank">SQL SUM Function</a></ol>
	</ul>
</div>

<?php
	$pageTitle = "SQL Arithmetics";
	$pageSubTitle = "SQL Arithmetics";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();

	include("../../../php/master.inc.php");
?>
