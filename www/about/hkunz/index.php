<?php
	ob_start();
	include '../../php/createImageLightbox.inc.php';
?>

<div>
	<p class="block">My name is <b>Harry Kunz</b>, feel free to connect with me on <a class='basicLink' href='https://de.linkedin.com/in/hkunz'><b>Linked-In</b></a></p>
        <?php echo createImageLightbox("img/hkunz-about.jpg", 460); ?>
	<p class="block">* <b>7 years</b> Financial Markets Experience:<br/>
* <b>7 years</b> software development experience<br/>
* <b>2 years</b> firmware development experience<br/>
<br/>
* Typing master <b>>400 cpm</b> (80-90 words per minute)<br/>
<br/>
Operating Systems:<br/>
<br/>
* <b>Linux</b> (at work)<br/>
* Mac OS X Snow Leopard (at home w/ my personal projects)<br/>
* WinXP, Windows 7 (testing cross-platform apps on windows)<br/>
<br/>
Languages &amp; Scriptings:<br/>
<br/>
*C/C++<br/>
*Bash<br/>
*Assembly Language (MPLAB, Debug, Zilog)<br/>
*Perl<br/>
*ActionScript 2.0/3.0, JSFL<br/>
*Flex 4<br/>
*Qt5</p>
</div>
	
<?php
	$pageTitle = "hkunz.com: About";
	$pageSubTitle = "About hkunz";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../../php/master.inc.php");
?>
