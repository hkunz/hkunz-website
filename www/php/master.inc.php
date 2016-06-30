<?php
	require('globals.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $pageTitle; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="copyright" content="" />
	<meta name="author" content="" />
	<meta name="rating" content="general" />
	<meta name="robots" content="all" />
	<!--
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="icon" type="image/gif" href="animated_favicon1.gif" />
	-->
	<?php 
		echo "<link rel='shortcut icon' href='" . $root . "favicon.ico' />";
		echo "<link rel='icon' href='" . $root . "animated_favicon1.gif' />";
		echo "<link rel='stylesheet' href='" . $root . "css/style.css' type='text/css' media='screen, projection' />";
		echo "<link rel='stylesheet' href='" . $root . "css/styleLightbox.css' type='text/css' media='screen, projection' />";
		echo "<script language='javascript' type='text/javascript' src='" . $root . "js/jquery.js'></script>";
		echo "<script language='javascript' type='text/javascript' src='" . $root . "js/swfobject.js'></script>";
		echo "<script language='javascript' type='text/javascript' src='" . $root . "js/globals.js'></script>";
		echo "<script language='javascript' type='text/javascript' src='" . $root . "js/lightbox.js'></script>";
		echo $headers; //other headers
	?>
</head>
<body>
	<div id="top" name="top">
		<div id="nav" name="nav" class="nav">
			<div class="loadingImg" style='width:0px;height:0px;'></div> <!-- Image preloaded -->
			<p>&nbsp;</p>
		</div>
	</div> <!-- [#top] -->
	<div id="container" name="container">
		<div id="header" name="header">
			<div class="headerTop"></div>
			<div class="headerContent">
				<div class="left"></div>
				<div class="middle"></div>
				<div class="right"></div>
			</div> <!-- [headerRepeat] -->
			<div class="headerBottom"></div>
		</div> <!-- [header] -->
		<div id="bottomShade" name="bottomShade">
			<div id="outer" name="outer">
				<div id="inner" name="inner">
					<div id="bodyContent" name="bodyContent" class="bodyContent">
						<div class="bodyMain">
							<div class="sidebar">
								<div class="box">
									<div class="top">
										<div class="left"></div>
										<div class="middle"></div>
										<div class="right"></div>
									</div> <!-- [top] -->
									<div class="center">
										<div class="left">
											<div class="right">
												<div class="middle">
													<ul class="menu">
														<?php echo "<li class='menuHeader'><a href='" . $root . "blog/' title=''><h5>Blog</h5></a></li>"; ?>
														<?php echo "<li class='menuLeaf'><a href='" . $root . "blog/' title=''><p>My Blog</p></a></li>"; ?>
														<?php echo "<li class='menuHeader'><a href='" . $root . "about/' title=''><h5>About</h5></a></li>"; ?>
														<?php echo "<li class='menuLeaf'><a href='" . $root . "about/hkunz/' title=''><p>hkunz.com</p></a></li>"; ?>
														<?php echo "<li class='menuLeaf'><a href='" . $root . "about/you/' title=''><p>You</p></a></li>"; ?>
														<?php echo "<li class='menuHeader'><a href='" . $root . "portfolio/' title=''><h5>Portfolio</h5></a></li>"; ?>

               <?php echo "<li class='menuLeaf'><a href='" . $root . "portfolio/lexmark/' title=''><p>Lexmark Pro-905</p></a></li>"; ?>

               <?php echo "<li class='menuLeaf'><a href='" . $root . "portfolio/cbakiosk/' title=''><p>CBA Kiosk</p></a></li>"; ?>

               <?php echo "<li class='menuLeaf'><a href='" . $root . "portfolio/seafight/' title=''><p>Seafight</p></a></li>"; ?>

               <?php echo "<li class='menuLeaf'><a href='" . $root . "portfolio/createswf/' title=''><p>CreateSWF</p></a></li>"; ?>
														<?php echo "<li class='menuLeaf'><a href='" . $root . "portfolio/pacman/' title=''><p>Pac-Man</p></a></li>"; ?>
														<?php echo "<li class='menuLeaf'><a href='" . $root . "portfolio/skinzone/' title=''><p>SkinZone</p></a></li>"; ?>
														<?php echo "<li class='menuLeaf'><a href='" . $root . "portfolio/stockchart/' title=''><p>StockChart</p></a></li>"; ?>
														<?php echo "<li class='menuHeader'><a href='" . $root . "generators/' title=''><h5>Generators</h5></a></li>"; ?>
														<?php echo "<li class='menuLeaf'><a href='" . $root . "generators/htmlcss/CodeHighlighter.php' title=''><p>Code Highlighter</p></a></li>"; ?>
														<?php echo "<li class='menuLeaf'><a href='" . $root . "generators/flash/DotMatrix.php' title=''><p>Dot-Matrix</p></a></li>"; ?>
														<?php echo "<li class='menuHeader'><a href='" . $root . "tutorials/' title=''><h5>Flash Tutorials</h5></a></li>"; ?>
														<?php echo "<li class='menuLeaf'><a href='" . $root . "'><p>None</p></a></li>"; ?>
														<?php echo "<li class='menuHeader'><a href='" . $root . "sourcefiles/' title=''><h5>Source Files</h5></a></li>"; ?>
														<?php echo "<li class='menuLeaf'><a href='" . $root . "sourcefiles/as2/colorpicker/'><p>ColorPicker (AS2.0)</p></a></li>"; ?>
														<?php echo "<li class='menuLeaf'><a href='" . $root . "sourcefiles/as3/polygon/'><p>Polygon (AS3.0)</p></a></li>"; ?>
													</ul>
												</div>
											</div>
										</div>
									</div> <!-- [center] -->
									<div class="bottom">
										<div class="left"></div>
										<div class="middle"></div>
										<div class="right"></div>
									</div> <!-- [bottom] -->
								</div> <!-- [box] -->
							</div> <!-- [sidebar] -->
							<div class="box">
								<div class="top">
									<div class="left"></div>
									<div class="middle"></div>
									<div class="right"></div>
								</div>

								<div id="boxContainer" name="boxContainer" class="center">
									<div class="left">
										<div class="right">
											<div class="middle">
												<h3 class='heading'><?php echo $pageSubTitle; ?></h3>
												<div class='date'>
													<p class='postDate'>Post: <?php echo $postDate; ?> <b>|</b> Last Update: <?php echo $lastUpdateDate; ?></p>
												</div>
												<?php echo $pageMainContent; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="bottom">
									<div class="left"></div>
									<div class="middle"></div>
									<div class="right"></div>
								</div>
							</div> <!-- [box] -->
						</div> <!-- [bodyMain] -->
					</div> <!-- [#bodyContent] -->
				</div> <!-- [#inner] -->
			</div> <!-- [#outer] -->
		</div> <!-- [#bottomShade] -->
		<div id="footer" name="footer">
			<div class="content">
				<p><span class="hkunz">hkunz<span>.com</p>
				<p>Harry Kunz &#169;2016</p>
				<p>ABN: 72 721 734 033</p>
			</div>
		</div> <!-- [#footer] -->
	</div> <!-- [#container] -->
</body>
</html>
