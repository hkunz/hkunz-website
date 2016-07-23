<?php
	include "constants.php";
	include "php/PageContent.php";
	include "php/PageContentRenderer.php";
	include "php/createImageLightbox.inc.php";

	$requestURI = explode('/', $_SERVER['REQUEST_URI']);
	$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
	$routes = array_diff_assoc($requestURI, $scriptName);
	$category = $routes[1];
	$topic = $routes[2];
	$subtopic = $routes[3];
	$file = $BASE_URL . "/content/" . $category;

	switch ($category) {
		case "portfolio":
		case "about":
		case "error":
			$file = $file . "/content-" . $topic . ".php";
			$imgpath = $IMAGE_PATH . "/" . $category . "/" . $topic . "/";
			$p = new PageContentRenderer($file, $imgpath);
			break;
		case "webnotes":
		case "blog":
			if ($subtopic == NULL) {
				$file = $file . "/content-index.php";
			} else {
				$file = $file . "/" . $topic . "/content-" . $subtopic . ".php";
				$imgpath = $IMAGE_PATH . "/" . $category . "/" . $topic . "/";
			}
			$p = new PageContentRenderer($file, $imgpath);
			break;
		default:
			break;
	}

	//FIXME: use htaccess to route to /error/404 instead of doing this manually
	if ($category != NULL && count($routes) > 0) {
		if ($p == NULL || !$p->renderable()) {
			$p = new PageContentRenderer($BASE_URL . "/content/error/content-404.php", $IMAGE_PATH . "/error/");
		}
	}

	if ($p != NULL && $p->renderable()) {
		$p->render();
		return;
	}

	$page = new PageContent("hkunz.com");
	$page->setBackButtonVisible(false);
?>

<style type="text/css">
#canvas {
	border:#666 0px solid;
	opacity:1.0;
}
</style>

<script type="text/javascript" src="/js/bouncingballs.js"></script>
<script type="text/javascript">
	bouncingballs.init("homecanvas");
</script>

<div onload="init();">
	<p>Welcome to <span class="hkunz">hkunz</span><span class="hkunz" style="color:#000;">.com</span></p>
	<p>Please use the menu on the left to navigate this site</p>
</div>

<canvas id="homecanvas" width="460" height="310">
</canvas>

<div>
	<p><b>Thank you</b> for visiting. More about me <a href="about/hkunz/"><b>here</b></a>.</p>
</div>

<?php
	$page->render();
?>
