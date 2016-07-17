<?php
class PageContent {
	public static $PAGE_LINKEDIN = "https://www.linkedin.com/in/hkunz";
	public static $PAGE_YOUTUBE = "https://www.youtube.com/user/hkunz219";
	public static $PAGE_STOCKTWITS = "https://stocktwits.com/hkunz";
	public static $PAGE_TWITTER = "https://twitter.com/hkunzx";
	public static $PAGE_FACEBOOK = "https://www.facebook.com/harrymckenzietv/";
	public static $PAGE_GOOGLEPLUS = "https://plus.google.com/u/0/101264299778716189843/posts";

	private $title;
	private $pagetitle;
	private $content;
	private $headers;
	private $backbutton;
	private $postdate;
	private $postupdated;
	private $imgpath;

	public function PageContent($pagetitle = NULL, $imgpath = NULL) {
		$this->title = "hkunz.com";
		$this->pagetitle = $pagetitle;
		$this->imgpath = $imgpath;
		$this->headers = "";
		$this->backbutton = true;
		$this->postdate = "";
		$this->postupdated = "";
		ob_start();
	}

	public function render() {
		$page = $this;
		$this->content = ob_get_contents();
		ob_end_clean();
		include("master.inc.php");
	}

	public function setPageTitle($title) {
		$this->pagetitle = $title;
	}

	public function setImagePath($imgpath) {
		$this->imgpath = $imgpath;
	}

	public function setBackButtonVisible($visible) {
		$this->backbutton = $visible;
	}

	public function setPostDate($value) {
		$this->postdate = $value;
	}

	public function setPostUpdated($value) {
		$this->postupdated = $value;
	}

	public function isBackButtonVisible() {
		return $this->backbutton;
	}

	public function getWindowTitle() {
		return $this->title == $this->pagetitle ? $this->title : $this->title . ": " . $this->pagetitle;
	}

	public function getPageTitle() {
		return $this->pagetitle;
	}

	public function getHeaders() {
		return $this->headers;
	}

	public function getPageContent() {
		return $this->content;
	}

	public function getImagePath() {
		return $this->imgpath;
	}

	public function getPostDate() {
		return $this->postdate;
	}

	public function getPostUpdated() {
		return $this->postupdated;
	}

	public function __toString() {
		return $this->title;
	}
}
?>
