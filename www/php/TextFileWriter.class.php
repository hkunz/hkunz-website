<?php
//
//  TextFileWriter
//
//  Created by Harry Kunz on 2010-11-23.
//  Copyright (c) 2010 hkunz. All rights reserved.
//
	
	class TextFileWriter{
		
		protected $_file;
		
		public function TextFileWriter($file){
			$this->_file = $file;
		}
		
		public function fwrite($content){
			$fh = fopen($this->_file, 'w') or die("TextFileWriter: can't open file");
			fwrite($fh, $content);
			fclose($fh);
		}
	}
?>