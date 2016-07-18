<?php
	class PageContentRenderer {
		private $imgpath;
		private $file;

		public function __construct($file, $imgpath) {
			$this->imgpath = $imgpath;
			$this->file = $file;
		}

		public function renderable() {
			return file_exists($this->file);
		}

		public function render() {
			$page = new PageContent();
			$page->setImagePath($this->imgpath);
			include $this->file;
			$page->render();
		}
	}
?>