<?php
//
//  ColorActionscriptText
//
//  Created by Harry Kunz on 2010-11-18.
//  Copyright (c) 2010 hkunz. All rights reserved.
//
	
	//http://www.phpf1.com/tutorial/php-regular-expression.html
	//include('../../lib/php/FirePHPCore/fb.php');
	//require('ColorTextPattern.class.php');

	class ColorActionscriptText extends ColorTextPattern{
		
		public function ColorActionscriptText($code, $type = "actionscript"){
			$code = str_replace('\"', chr(34), $code); //If code comes from TextInput/TextArea it returns \" for "
			$code = str_replace("\'", chr(39), $code);
			$code = str_replace('\\\\', chr(92), $code);
			ColorTextPattern::ColorTextPattern($code, $type);
			
			//$this->CLASS_NAMES = array("Factory", "Text", "JSONLoader", "int", "Boolean", "String","void");
			//$this->COMMON_NAMES = array("this", "addChild", "removeChild");
		}
		
		public function format(){
			//All pattern chars can be written as is except: [\^$.|?*+()
			//Ex using ? operator: [^\s]*q(?!werty)[^\s]*
			
			/*
			Bugs:
				1. Using words with appostrophe like word color's inside line comments causes strings not to color code
				2. Using comments like /****** * does not work
			*/
			
			
			$code = $this->_code;
			$constants = "([_A-Z]+[A-Z0-9_]*)|(true|false|null|undefined|(v|V)oid)";
			$special = "((public\s+(" . $this->CLASS_KEYWORD . "|interface))|(" . $this->CLASS_KEYWORD . "|interface))" . "|public|extends";
			$specialChar = "*"; //special because it is used as both comment and multiply operator
			$reserved = "and|or|not|namespace|include|package|final|new|for|each|while|do|else|if|import|static|const|var|private|protected|override|function|return|to|native|is|in|as|try|catch|switch|case|break|default";
			$futureReserved = "abstract|boolean|byte|cast|char|debugger|double|enum|export|float|goto|intrinsic|long|prototype|short|synchronized|throws|transient|virtual|volatile";
			$commonMethods = "type|typeof|addChild|removeChild|addListener|addEventListener|removeEventListener|addChildAt|removeChildAt|dispatchEvent|destroy|isNaN|clear|lineTo|moveTo|lineStyle|beginFill|endFill|onPress|onRelease|onReleaseOutside|onDragIn|onDragOut|onRollOver|onRollOut|createEmptyMovieClip|attachMovie|removeMovieClip|createTextField|toString|parseInt|useHandCursor|delete|call|apply|setTextFormat|defaultTextFormat|sin|cos|tan|cot|atan|acot|acos|asin|getCamera";
			$properties = "id|_xmouse|mouseX|_ymouse|mouseY|name|_name|rotation|_rotation|x|_x|y|_y|alpha|_alpha|visible|_visible|enabled|_enabled|height|_height|width|_width|scale|scaleX|scaleY|_xscale|_yscale|font|bold|size|align|selectable|text|target|frameRate|backgroundColor|minimum|maximum|stage|stageWidth|stageHeight";
			$commonKeywords = $properties . "|set|dynamic|this|super|source|trace|throw|cacheAsBitmap|color|graphics";
			$types = "Boolean|Class|String|Number|int|Object|Array|Button|DisplayObject|Sprite|MovieClip|TextField|TextFormat|Function|Math|Event|MouseEvent|ButtonEvent|Slider|Label|TextInput|Bitmap|BitmapData|Shape|Camera|Video|ColorMatrixFilter"; //|[A-Z][a-zA-Z0-9_]*";
			$operators = "[+-]|\?|\||%|!|(&#42;)|(&#47;)|(&#60;)|(&#61;)|(&#62;)|(&#38;)|(&#91;)|(&#93;)|Embed|SWF|Bindable";
			
			//ORDER IS CRUCIAL
			$code = ColorTextPattern::replaceSpecials($code); //replace special characters

			$code = ColorTextPattern::replaceInPattern($code, "/\W(package|import)\s+\w(\w|\.)*/", ".", "&#46;"); //replace all dots with ascii value so it won't interfere with dot operator
			$code = ColorTextPattern::replaceInPattern($code, "/(([^\W])(\/)([^\W])|((\s|\d|\w|=)(\/)(\s|\d|\w|=)))/", "/", "&#47;"); //need to replace single / to distinguish this from line comments //
			$code = ColorTextPattern::replaceInPattern($code, "/[^\/]\*[^\/]([^\/]\*[^\/])*\*?/", "*", "&#42;"); //need to replace * to distinguish from block comments /* */
			$code = ColorTextPattern::replaceInPattern($code, "/((&#34;)(.*?)(&#34;))|((&#39;)(.*?)(&#39;))/", "/", "&#47;"); //replace comments in strings
			
			$code = ColorTextPattern::colorCodePattern($code, "/[^#|^\w]\d+([\dA-Fa-fxX])*/", $this->NUMBER, 1);
			$code = ColorTextPattern::colorCodePattern($code, "/(\W)(" . $this->getRepeatPattern($types) . ")(\W)/", $this->DATA_TYPE, 1, 1);
			$code = ColorTextPattern::colorCodePattern($code, "/(\W)(" . $this->getRepeatPattern($reserved) . ")(\W)/", $this->RESERVED, 1, 1);
			$code = ColorTextPattern::colorCodePattern($code, "/(\W)(" . $this->getRepeatPattern($futureReserved) . ")(\W)/", $this->RESERVED, 1, 1);
			$code = ColorTextPattern::colorCodePattern($code, "/\Wpackage<\/span>\s+.*?{/", $this->FUNCTION, 16, 1); //span gets appended when reserved words like package are colored
			$code = ColorTextPattern::colorCodePattern($code, "/\Winterface\s+.*?{/", $this->FUNCTION, 11, 1);
			$code = ColorTextPattern::colorCodePattern($code, "/\W" . $this->CLASS_KEYWORD . "\s+.*?{/", $this->FUNCTION, 10, 1); //need to check no line feed
			$code = ColorTextPattern::colorCodePattern($code, "/(\W)import<\/span>\s+.*?(&#59;|&#10;)/", $this->COMMON, 15, 5);
			$code = ColorTextPattern::colorCodePattern($code, "/(\W)(" . $this->getRepeatPattern($constants) . ")(\W)/", $this->CONSTANT, 1, 1);
			$code = ColorTextPattern::colorCodePattern($code, "/(\W)(" . $this->getRepeatPattern($commonMethods) . ")(\W)/", $this->COMMON, 1, 1);
			$code = ColorTextPattern::colorCodePattern($code, "/(\W)(" . $this->getRepeatPattern($commonKeywords) . ")(\W)/", $this->COMMON, 1, 1);
			$code = ColorTextPattern::colorCodePattern($code, "/\Wfunction<\/span>\s+.*?\(/", $this->FUNCTION, 17, 1);
			$code = ColorTextPattern::colorCodePattern($code, "/(\W)(" . $special . ")(\W)/", $this->RESERVED, 1, 1);
			$code = ColorTextPattern::colorCodePattern($code, "/" . $this->getRepeatPattern($operators) . "/", $this->OPERATOR);
			$code = ColorTextPattern::colorCodePattern($code, "/(&#58;)|(&#59;)|\./", $this->PUNCTUATION); //";", ":", etc
			$code = ColorTextPattern::colorCodePattern($code, "/([^\\\\](&#34;)[^\\\\]*?(&#34;))|([^\\\\](&#39;)[^\\\\]*?(&#39;))/", $this->STRING, 1); //Need to disable comments inside strings
			$code = ColorTextPattern::colorCodePattern($code, "/((&#92;)(\w|\s|\d|(&#34;)|(&#39;)))/", $this->CHAR_ESCAPE);
			$code = ColorTextPattern::colorCodePattern($code, "/(\/\*[^*]*(\*\/)+((\*\/)+)*)|((\/\/).*?(&#10;){1})|((\/\/).*$)/", $this->COMMENT);
			
			$this->_code = $code;
		}
	}
?>