<?php
	ob_start();
	$link = "<a class='basicLink' href='https://github.com/hkunz/createswf' target='_blank'>CreateSWF</a>"
?>

<div>
	<p class="block"><?php echo $link;?> is a tool to compile assets contained in a target folder directly into an SWF file. It is meant to be used for creating runtime SWF libraries without the hassle of using a Flash IDE to manually import assets. CreateSWF was originally written in Perl and currently ported to C++. To use it, make sure that the environment variable FLEX_HOME is defined and pointing to the Flex SDK.</p>
	<div class="showTell"><img class="" src="img/createswf-perl.png" width="460"/></div>
	<p class="block"></p>
	<div class="showTell"><img class="" src="img/createswf-gui.png" width="460"/></div>
        <p class="block"></p>
</div>

<?php
	$pageTitle = "CreateSWF";
	$pageSubTitle = "CreateSWF";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../../php/master.inc.php");
?>
