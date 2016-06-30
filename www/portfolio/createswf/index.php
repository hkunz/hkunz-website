<?php
	ob_start();
	$link = "<a class='basicLink' href='https://github.com/hkunz/createswf' target='_blank'><b>CreateSWF</b></a>";
	include '../../php/createImageLightbox.inc.php';
?>

<div>
	<p class="block"><?php echo $link;?> is a tool to compile assets contained in a target folder directly into an SWF file. It is meant to be used for creating runtime SWF libraries without the hassle of using a Flash IDE to manually import assets. CreateSWF was originally written in Perl and currently ported to C++. To use it, make sure that the environment variable FLEX_HOME is defined and pointing to the Flex SDK.</p>
        <p class="block"></p>
	</div><?php echo createImageLightbox("img/createswf-perl.png", 460); ?>
	<p class="block">A <a class='basicLink' href='https://en.wikipedia.org/wiki/Makefile' target='_blank'><b>Makefile</b></a> target with the pattern <b>%.swf</b> searches the assets directories with the specified name and then compiles the assets into an swf file with the same name</p>
	<div id='codeStep1' name='codeStep1'></div>
	<p class="block">When no path is given to the executable, it will open in GUI mode where you can pick the directory you want to compile</p>
	<?php echo createImageLightbox("img/createswf-gui.png", 460); ?>

<script language="javascript" type="text/javascript">
        var root = '../../';
        var codeFormatter = root + 'php/CodeFormatter.php';
        var multiCodeFormatter = root + 'php/MultiCodeFormatter.php';
        var type = 'actionscript';
        var codes = {codeStep1:getCodeStep1()};
        
        ajaxFormatMultiCode(multiCodeFormatter, codes, type);
        
        
        function getCodeStep1(){
                return '%.swf: SWF_DIR=$(shell find ${ASSETS_PATH} -type d -name $*)\n%.swf:\n\t$(eval DEFINITION_XML=${SWF_DIR}/definition.xml)\n\t$(eval EXE_OPTIONS=$(shell if [ -f ${DEFINITION_XML} ] && [ ${CREATESWF_PEARL} ]; then echo "-m 1"; else echo ""; fi))\n\t$(eval SWF=$(shell find ${SWF_PATH} -type f -name $@))\n\t${CREATESWF_EXE} ${EXE_OPTIONS} ${SWF_DIR}\n\tmv $@ ${SWF};'
        }
</script>

<?php
	$pageTitle = "CreateSWF";
	$pageSubTitle = "CreateSWF";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../../php/master.inc.php");
?>
