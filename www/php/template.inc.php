<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title><?php echo $page->getWindowTitle(); ?></title>
	<link rel='shortcut icon' href='/assets/images/favicon.ico' />
	<link rel='icon' href='/assets/images/animated_favicon1.gif' />
	<link rel='stylesheet' href='/css/style.css' type='text/css' media='screen, projection' />
	<link rel='stylesheet' href='/css/styleLightbox.css' type='text/css' media='screen, projection' />
	<script type='text/javascript' src="https://apis.google.com/js/platform.js"></script>
	<script type='text/javascript' src='/js/jquery.js'></script>
	<!-- FIXME: use this instead of above <script type='text/javascript' src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
	<script type='text/javascript' src='/js/swfobject.js'></script>
	<script type='text/javascript' src='/js/globals.js'></script>
	<script type='text/javascript' src='/js/lightbox.js'></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
	<?php 
		echo $page->getHeaders(); //other headers
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
				<a href="<?php echo PageContent::$PAGE_YOUTUBE;?>" target="_blank"><img alt="" src='/css/img/socials/youtube-icon.png'/></a>
			</div>
			<div id="topbuttonicon">
				<a href="<?php echo PageContent::$PAGE_LINKEDIN;?>" target="_blank"><img alt="" src='/css/img/socials/linkedin-icon.png'/></a>
			</div>
			<div id="topbuttonicon">
				<a href="<?php echo PageContent::$PAGE_FACEBOOK;?>" target="_blank"><img alt="" src='/css/img/socials/facebook-icon.png'/></a>
			</div>
			<div id="topbuttonicon">
				<a href="<?php echo PageContent::$PAGE_GOOGLEPLUS;?>" target="_blank"><img alt="" src='/css/img/socials/googleplus-icon.png'/></a>
			</div>
			<div id="topbuttonicon">
				<a href="<?php echo PageContent::$PAGE_TWITTER;?>" target="_blank"><img alt="" src='/css/img/socials/twitter-icon.png'/></a>
			</div>
			<div id="topbuttonicon">
				<a href="<?php echo PageContent::$PAGE_STOCKTWITS?>" target="_blank"><img alt="" src='/css/img/socials/stocktwits-icon.png'/></a>
			</div>
		</div>
		<div style="float: right;">
			<div style="display: inline-block;vertical-align: middle;" >
				<!--
				<div id="topbutton">
					<div class="fb-follow" data-href="https://www.facebook.com/harrymckenzietv/" data-layout="button" data-size="small" data-show-faces="true"></div>
				</div>
				-->
				<div id="topbutton"><div class="fb-like" data-href="/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div></div>
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
<li class='menuHeader'><h5><a href='/' title=''>Main</a></h5></li>
<li class='menuLeaf'><a href='/'>Home</a></li>
<li class='menuLeaf'><a href='https://www.youtube.com/user/hkunz219' target='_blank'>My V-Log</a></li>
<li class='menuLeaf'><a href='/blog'>My Blog</a></li>
<li class='menuHeader'><h5><a href='#' title=''>About</a></h5></li>
<li class='menuLeaf'><a href='/about/hkunz' title=''>Me</a></li>
<li class='menuLeaf'><a href='/about/you' title=''>You</a></li>
<li class='menuHeader'><h5><a href='#' title=''>Portfolio</a></h5></li>
<li class='menuLeaf'><a href='/portfolio/lexmark' title=''>Lexmark Pro-905</a></li>
<li class='menuLeaf'><a href='/portfolio/cbakiosk' title=''>CBA Kiosk</a></li>
<li class='menuLeaf'><a href='/portfolio/seafight' title=''>Seafight</a></li>
<li class='menuLeaf'><a href='/portfolio/createswf' title=''>CreateSWF</a></li>
<li class='menuLeaf'><a href='/portfolio/spytech' title=''>SpyTech</a></li>
<li class='menuLeaf'><a href='/assets/bin/portfolio/content-pacman.php' title=''>Pac-Man</a></li>
<li class='menuLeaf'><a href='/portfolio/skinzone' title=''>SkinZone</a></li>
<li class='menuLeaf'><a href='/portfolio/stockchart' title=''>StockChart</a></li>
<li class='menuHeader'><h5><a href='#' title=''>Generators</a></h5></li>
<li class='menuLeaf'><a href='/generators/htmlcss/CodeHighlighter.php' title=''>Code Highlighter</a></li>
<li class='menuLeaf'><a href='/generators/flash/DotMatrix.php' title=''>Dot-Matrix</a></li>
<li class='menuHeader'><h5><a href='#' title=''>Web Notes</a></h5></li>
<li class='menuLeaf'><a class="block" href='/webnotes/basics'>Basics</a></li>
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
												<h3 id="pageTitle" class='heading'><?php echo $page->getPageTitle(); ?></h3>
												<div class='date'>
													<p class='postDate'>
													<?php
														$post = $page->getPostDate();
														if ($post != NULL) {
															echo "Post: <b>" . $page->getPostDate() . "</b>";
														}
														$lastup = $page->getPostUpdated();
														if ($lastup != NULL) {
															echo "<b> | </b> Last Update: " . $lastup;
														}
													?>
													</p>
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
												<div id="pageContent">
												<script type="text/javascript">
													$("#pageContent").css("visibility", "hidden");
												</script>
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
	<script type="text/javascript" src="/js/main.js"></script>
	<script type="text/javascript">
		$("#pageContent").css("visibility", "visible");
	</script>
</body>
</html>
