<?php
class PageContent {
	public static $PAGE_LINKEDIN = "https://www.linkedin.com/in/hkunz";
	public static $PAGE_YOUTUBE = "https://www.youtube.com/c/HarryMcKenzieTV";
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
	private $ogtitle;
	private $ogimgpath;
	private $ogdescription;

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
		include("template.inc.php");
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

	public function setPostDate($year, $month, $day) {
		$this->postdate = date('F d, Y',strtotime($month . '/' . $day . '/' . $year));
	}

	public function setPostUpdated($year, $month, $day) {
		$this->postupdated = date('F d, Y',strtotime($month . '/' . $day . '/' . $year));
	}

	public function setOgTitle($title) {
		$this->ogtitle = $title;
	}

	public function setOgImagePath($path) {
		$this->ogimgpath = $path;
	}

	public function setOgDescription($desc) {
		$this->ogdescription = $desc;
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

	public function getOgTitle() {
		return $this->ogtitle;
	}

	public function getOgImagePath() {
		return $this->ogimgpath;
	}

	public function getOgDescription() {
		return $this->ogdescription;
	}

	public function __toString() {
		return $this->title;
	}
}
?>
