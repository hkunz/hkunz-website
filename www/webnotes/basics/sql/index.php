<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include $root . '/php/PageContent.php';
	$page = new PageContent("SQL Arithmetics");
?>

<div>
	<p class="block">
SQL Arithmetics Notes
	</p>
	<ul class="menu" style="list-style-type: none;">
<li><a class='basicLink' href='Functions/COUNT.HTM' target="_blank">SQL COUNT Function</a></li>
<li><a class='basicLink' href='Functions/count_ast.htm' target="_blank">SQL COUNT(*) Function</a></li>
<li><a class='basicLink' href='Functions/count_distinct.htm' target="_blank">SQL COUNT DISTINCT Function</a></li>
<li><a class='basicLink' href='Functions/AVG.HTM' target="_blank">SQL AVG Function</a></li>
<li><a class='basicLink' href='Functions/FIRST.HTM' target="_blank">SQL FIRST Function</a></li>
<li><a class='basicLink' href='Functions/LAST.HTM' target="_blank">SQL LAST Function</a></li>
<li><a class='basicLink' href='Functions/MIN.HTM' target="_blank">SQL MIN Function</a></li>
<li><a class='basicLink' href='Functions/MAX.HTM' target="_blank">SQL MAX Function</a></li>
<li><a class='basicLink' href='Functions/SUM.HTM' target="_blank">SQL SUM Function</a></li>
	</ul>
</div>

<?php
	$page->render($page);
?>
