<?php
//
//  ColorTextPattern
//
//  Created by Harry Kunz on 2010-11-21.
//  Copyright (c) 2010 hkunz. All rights reserved.
//

	class ColorTextPattern{
		
		public static $SCRIPT_TYPE;
		public static $CODE_STYLE;
		
		public static $DEFAULT;
		public static $COMMENT;
		public static $CHAR_ESCAPE;
		public static $STRING;
		public static $NUMBER;
		public static $CONSTANT;
		public static $OPERATOR;
		public static $PUNCTUATION;
		public static $FUNCTION;
		public static $RESERVED;
		public static $COMMON;
		public static $DATA_TYPE;
		
		protected static $CLASS_KEYWORD; //Special keyword "class" because css uses this
		protected static $SPAN_KEYWORD; //we might need this
		
		protected $_code;
		protected $_numLines;
		
		public function ColorTextPattern($code, $type){
			$this->SCRIPT_TYPE = $type;
			$this->CODE_STYLE = "code";
			
			$this->DEFAULT = "default";
			$this->COMMENT = "comment";
			$this->CHAR_ESCAPE = "charEscape";
			$this->STRING = "string";
			$this->NUMBER = "number";
			$this->CONSTANT = "constant";
			$this->OPERATOR = "operator";
			$this->PUNCTUATION = "punctuation";
			$this->FUNCTION = "function";
			$this->RESERVED = "reserved";
			$this->COMMON = "common";
			$this->DATA_TYPE = "dataType";
			
			$this->CLASS_KEYWORD = "&#99;lass"; //"&#99;&#108;&#97;&#115;&#115;"; //"class"
			
			$this->_code = " " . $code . " "; //need this space so that color coding can be made at first char of string
			$this->_numLines = 0;
		}
		
		protected function getSpaceString($numSpaces = 0){
			$str = "";
			while($numSpaces > 0){
				$str .= " ";
				$numSpaces--;
			}
			return $str;
		}
		
		protected function replaceSpecials($code, $inverse = false){
			$needle = array("class", chr(58)/*:*/, chr(34)/*"*/, chr(39)/*'*/, chr(9)/*tab*/, chr(62)/*>*/, chr(60)/*<*/, chr(92)/*\*/, chr(61)/*=*/, chr(91)/*[*/, chr(93)/*]*/);
			$haystack = array($this->CLASS_KEYWORD, '&#58;', '&#34;', '&#39;', '   ', '&#62;', '&#60;', '&#92;', '&#61;', '&#91;', '&#93;');
			
			if($inverse == true){
				$code = str_replace(array('&#59;'), array(chr(59)/*;*/), $code);
				//$code = str_replace(array('&#59;', '&#10;'), array(chr(59)/*;*/, chr(10)), $code);
				//$code = str_replace("&#10;", chr(10)/*newLine*/, $code, $this->_numLines); //store number of lines
				//$code = str_replace($haystack, $needle, $code);
			}else{
				$code = str_replace(chr(59)/*;*/, '&#59;', $code);
				$code = $this->replaceInPattern($code, "/(&)[^#]/", '&', '&#38;', 0, 0);
				$code = str_replace(chr(10)/*newLine*/, "&#10;", $code, $this->_numLines); //store number of lines
				$code = str_replace($needle, $haystack, $code);
			}
			//str_replace($needle, $haystack, $code);
			return $code;
		}
		
		protected function str_replace_once($needle , $replace , $haystack){
		    $pos = strpos($haystack, $needle);
		    if ($pos === false){
		        // Nothing found
		    	return $haystack;
		    }
		    return substr_replace($haystack, $replace, $pos, strlen($needle));
		}
		
		protected function colorCodePattern($code, $pattern, $cssClass, $leftOffset = 0, $rightOffset = 0, $removeInnerTags = true){
			$tag = "<span class='";
			$startTag = $tag . $cssClass . "'>";
			$endTag = "</span>";
			$startTagLen = strlen($startTag);
			$endTagLen = strlen($endTag);
			$offset = $leftOffset; //increases because of tag insertion to $code
			$complete = false;
			$newCode = $code;
			
			preg_match_all($pattern, $code, $matches, PREG_OFFSET_CAPTURE);
			foreach($matches as $submatch){
				foreach($submatch as $match){
					$strpos = $match[1] + $offset;
					$occurrence = $match[0];
					$strlen = strlen($occurrence);
					$occurrence = substr($occurrence, $leftOffset, $strlen - ($rightOffset + $leftOffset));
					
					if($removeInnerTags){
						//* Remove tags inside when another pair of outer tags are inserted as in comments or strings
						$occurrence = ColorTextPattern::removeSpanTags($occurrence, $reduce);
					}
					
					$len = strlen($occurrence);
					$occurrence = preg_replace("/^(\s)/", "", $occurrence, -1, $leftSpaces);
					$occurrence = preg_replace("/(\s)$/", "", $occurrence, -1, $rightSpaces);
					$offset += (($startTagLen + $endTagLen) - $reduce);
					$replace = (ColorTextPattern::getSpaceString($leftSpaces) . $startTag . $occurrence . $endTag . ColorTextPattern::getSpaceString($rightSpaces));
					$newCode = (substr($newCode, 0, $strpos) . $replace . substr($newCode, $strpos + $len + $reduce));
				}
				break; //we need this only once
			}
			return $newCode;
		}
		
		protected function removeSpanTags($occurrence, &$charReduction){
			$tag = "<span class='";
			$charReduction = 0;
			preg_match_all("/(" . $tag . "[^>]*>)|(<\/span>)/", $occurrence, $tagMatches, PREG_SET_ORDER);
			foreach($tagMatches as $tagMatch){
				$replaced = 0;
				$tagOccur = $tagMatch[0];
				$occurrence = str_replace($tagOccur, "", $occurrence, $replaced);
				//if(!$numReplaced) break; //no more need to repeat loop because str_replace replaces all instances
				$charReduction += $replaced * strlen($tagOccur);
				//fb($cssClass . ": " . $tagOccur . " -> " . $replaced . ": " . $charReduction);
			}
			return $occurrence;
		}
		
		protected function replaceInPattern($code, $pattern, $needle, $replacement, $leftOffset = 0, $rightOffset = 0){
			preg_match_all($pattern, $code, $matches, PREG_OFFSET_CAPTURE);
			
			$complete = false; //complete = true for ungreedy search results, need to optimize search pattern to fix
			$offset = $leftOffset;
			foreach($matches as $submatch){
				foreach($submatch as $theMatch){
					$strpos = $theMatch[1] + $offset;
					$match = $theMatch[0];
					$len = strlen($match);
					$match = substr($match, $leftOffset, $len - ($rightOffset + $leftOffset));
					$match = str_replace($needle, $replacement, $match);
					$offset += (strlen($match) - $len);
					$code = (substr($code, 0, $strpos) . $match . substr($code, $strpos + $len));
				}
				break; //if($complete) break;
			}
			return $code;
		}
		
		protected function getRepeatPattern($pattern, $separator = "(\s)+"){
			return "(" . $pattern . ")(" . $separator . "(" . $pattern . "))*";
		}
		
		public function getData(){
			$lineNumbers = "<p>";
			for($n = 0; $n <= $this->_numLines; $n++){
				$lineNumbers .= ($n . '<br />');
			}
			$lineNumbers .= "</p>";
			$code = substr($this->_code, 1, strlen($this->_code) - 2);
			//$code = utf8_encode(html_entity_decode($code)); 
			//$code = html_entity_decode($code);
			$code = $this->replaceSpecials($code, true);
			return "<div class='" . $this->CODE_STYLE . " " . $this->SCRIPT_TYPE . "'><div class='lineCol'>" . $lineNumbers . "</div><div id='codeLines' name='codeLines' class='content'><p class='" . $this->DEFAULT . "'>" . $code . "</p></div></div>"; //after space added at constructor
			//return "<p class='" . $this->DEFAULT . "'>" . substr($this->_code, 1) . "</p>"; //after space added at constructor
			//return substr($this->_code, 1); //after space added at constructor
		}
		
		public function getNumLines(){
			return $this->_numLines;
		}
		
		public function setNumLines($value){
			$this->_numLines = $value;
		}
	}
?>