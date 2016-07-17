<?php
	class PortfolioContentsController {
		private $contpath;
		private $project;
		private $file;

		public function __construct($baseurl, $project, $imgpath) {
			$this->contpath = $baseurl . "/content/portfolio";
			$this->imgpath = $imgpath;
			$this->project = $project;
			$this->file = $this->contpath . "/content-" . $this->project . ".php";
		}

		public function renderable() {
			return file_exists($this->file);
		}

		public function render() {
			$page = new PageContent();
			$page->setImagePath($this->imgpath . "/" . $this->project . "/");
			include $this->file;
			$page->render();
		}
	}
?>