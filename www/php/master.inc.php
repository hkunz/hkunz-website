<?php
	require('globals.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title><?php echo $page->getWindowTitle() ?></title>
	<script src="https://apis.google.com/js/platform.js"></script>
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
<!--
<div style="position: fixed; z-index: -99; width: 100%; height: 100%; opacity:0.1">
	<iframe height="100%" width="100%" src="https://youtube.com/embed/aHRnbYFZiCE?autoplay=1&controls=0&showinfo=0&autohide=1"></iframe>
</div>
 -->
	<div id="fb-root"></div>
	<script type="text/javascript">(
		function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=140396069306658";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<div id="navbar">
		<div style="float:left;">
			<div id="topbuttonicon">
				<a href="<?php echo PageContent::$PAGE_YOUTUBE;?>" target="_blank"><img alt="" src='<?php echo $root . "css/img/socials/youtube-icon.png";?>'/></a>
			</div>
			<div id="topbuttonicon">
				<a href="<?php echo PageContent::$PAGE_LINKEDIN;?>" target="_blank"><img alt="" src='<?php echo $root . "css/img/socials/linkedin-icon.png";?>'/></a>
			</div>
			<div id="topbuttonicon">
				<a href="<?php echo PageContent::$PAGE_FACEBOOK;?>" target="_blank"><img alt="" src='<?php echo $root . "css/img/socials/facebook-icon.png";?>'/></a>
			</div>
			<div id="topbuttonicon">
				<a href="<?php echo PageContent::$PAGE_GOOGLEPLUS;?>" target="_blank"><img alt="" src='<?php echo $root . "css/img/socials/googleplus-icon.png";?>'/></a>
			</div>
			<div id="topbuttonicon">
				<a href="<?php echo PageContent::$PAGE_TWITTER;?>" target="_blank"><img alt="" src='<?php echo $root . "css/img/socials/twitter-icon.png";?>'/></a>
			</div>
			<div id="topbuttonicon">
				<a href="<?php echo PageContent::$PAGE_STOCKTWITS?>" target="_blank"><img alt="" src='<?php echo $root . "css/img/socials/stocktwits-icon.png";?>'/></a>
			</div>
		</div>
		<div style="float: right;">
			<div style="display: inline-block;vertical-align: middle;" >
				<!--
				<div id="topbutton">
					<div class="fb-follow" data-href="https://www.facebook.com/harrymckenzietv/" data-layout="button" data-size="small" data-show-faces="true"></div>
				</div>
				-->
				<?php echo '<div id="topbutton"><div class="fb-like" data-href="' . $root . '" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div></div>';?>
				<div id="topbutton">
					<div class="g-ytsubscribe" data-channel="hkunz219" data-layout="default" data-count="default"></div>
				</div>
			</div>
		</div>
	</div> <!-- [#top] -->
	<div id="container">
		<div id="header">
			<div class="headerTop"></div>
			<div class="headerContent">
				<div class="left"></div>
				<div class="middle"></div>
				<div class="right"></div>
			</div> <!-- [headerRepeat] -->
			<div class="headerBottom"></div>
		</div> <!-- [header] -->
		<div id="bottomShade">
			<div id="outer">
				<div id="inner">
					<div id="bodyContent" class="bodyContent">
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
<?php
echo "<li class='menuHeader'><a href='" . $root . "' title=''><h5>Main</h5></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "'><p>Home</p></a></li>";
echo "<li class='menuLeaf'><a href='https://www.youtube.com/user/hkunz219' target='_blank'><p>My V-Log</p></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "blog/'><p>My Blog</p></a></li>";
echo "<li class='menuHeader'><a href='#' title=''><h5>About</h5></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "about/hkunz/' title=''><p>Me</p></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "about/you/' title=''><p>You</p></a></li>";
echo "<li class='menuHeader'><a href='#' title=''><h5>Portfolio</h5></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "portfolio/lexmark/' title=''><p>Lexmark Pro-905</p></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "portfolio/cbakiosk/' title=''><p>CBA Kiosk</p></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "portfolio/seafight/' title=''><p>Seafight</p></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "portfolio/createswf/' title=''><p>CreateSWF</p></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "portfolio/spytech/' title=''><p>SpyTech</p></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "portfolio/pacman/' title=''><p>Pac-Man</p></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "portfolio/skinzone/' title=''><p>SkinZone</p></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "portfolio/stockchart/' title=''><p>StockChart</p></a></li>";
echo "<li class='menuHeader'><a href='#' title=''><h5>Generators</h5></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "generators/htmlcss/CodeHighlighter.php' title=''><p>Code Highlighter</p></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "generators/flash/DotMatrix.php' title=''><p>Dot-Matrix</p></a></li>";
echo "<li class='menuHeader'><a href='#' title=''><h5>Source Files</h5></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "sourcefiles/as2/colorpicker/'><p>ColorPicker (AS2.0)</p></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "sourcefiles/as3/polygon/'><p>Polygon (AS3.0)</p></a></li>";
echo "<li class='menuHeader'><a href='#' title=''><h5>Web Notes</h5></a></li>";
echo "<li class='menuLeaf'><a href='" . $root . "webnotes/basics/'><p>Basics</p></a></li>";
?>
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

								<div id="boxContainer" class="center">
									<div class="left">
										<div class="right">
											<div class="middle">
												<h3 class='heading'><?php echo $page->getPageTitle(); ?></h3>
												<div class='date'>
													<p class='postDate'>Post: <?php echo $page->getPostDate(); ?> <b>|</b> Last Update: <?php echo $page->getPostUpdated(); ?></p>
												</div>
												<div class="block" style="width:100%;height:20px;display:inline-block;vertical-align: middle;">
													<div style="float:left;">
														<div class="fb-like" data-href="<?php $_SERVER['REQUEST_URI'];?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
													</div>
													<div class="block" style="float:right;">
														<?php
															if ($page->isBackButtonVisible()) {
																echo "<button class='pagebutton' onclick='window.history.back();'>Return to previous page</button>";
															}
														?>
													</div>
												</div>
												<?php
													echo $page->getPageContent();
													if ($page->isBackButtonVisible()) {
														echo "<br/>";
														echo "<button class='pagebutton' style='width:100%;' onclick='window.history.back();'>Return to previous page</button>";
													}
												?>
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
		<div id="footer">
			<div class="content">
				<p><span class="hkunz">hkunz</span><span class="hkunz" style="color:#000;">.com</span></p>
				<p>Harry Kunz &#169;2016</p>
				<p>ABN: 72 721 734 033</p>
			</div>
		</div> <!-- [#footer] -->
	</div> <!-- [#container] -->
</body>
</html>
