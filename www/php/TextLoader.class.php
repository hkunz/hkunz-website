<?php
//
//  TextLoader
//
//  Created by Harry Kunz on 2010-11-23.
//  Copyright (c) 2010 hkunz. All rights reserved.
//
	class TextLoader{
		
		protected $_file;
		protected $_numLines;
		protected $_data;
		
		public function TextLoader($file){
			$this->_file = $file;
		}
		
		//BUG: First fgets returns 3 garbage characters
		
		public function load(){
			$this->_numLines = 0;
			if($this->_file){
				$stream = fopen($this->_file, "r");
				$text = "";

				if($stream){
					while(!feof($stream)){
						$line = fgets($stream, 1024);
						$text .= $line;
						$this->_numLines++;
						//if($this->_numLines > 1000) break;
					}
				}
				fclose($stream);
				$this->_data = $text;
				/*
				echo "val1: " . ord($text[0]) . '<br>';
				echo "val2: " . ord($text[1]) . '<br>';
				echo "val3: " . ord($text[2]) . '<br>';
				echo "val4: " . ord($text[3]) . '<br>';
				echo "val5: " . ord($text[4]) . '<br>';
				//*/
			}
		}
		
		public function getNumLines(){
			return $this->_numLines;
		}
		
		public function getData(){
			return $this->_data;
		}
	}
?>