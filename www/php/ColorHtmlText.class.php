<?php
//
//  ColorHtmlText
//
//  Created by Harry Kunz on 2010-11-29.
//  Copyright (c) 2010 hkunz. All rights reserved.
//
	
	//include('../../lib/php/FirePHPCore/fb.php');
	//require('ColorTextPattern.class.php');

	class ColorHtmlText extends ColorTextPattern{
		
		public static $CLASS_NAME;
		public static $TAG_NAME;
		
		public function ColorHtmlText($code, $type = "html"){
			
			$this->CLASS_NAME = "className";
			$this->TAG = "tag";
			
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
			
			$code = $this->_code;
			$special = "span"; //span is a special tag because it is used to separate keyword colors
			$specialChar = "*"; //special because it is used as both comment and multiply operator
			$reserved = "@import|px|em|pt|%";
			$tags = "html|body|div|object|h1|h2|h3|h4|h5|h6|p|iframe|blockquote|q|pre|a|abbr|acronym|address|big|cite|code|del|dfn|em|img|ins|kbd|samp|small|strike|strong|sub|sup|tt|var|b|i|u|dd|dl|dt|ol|ul|li|form|fieldset|hr|label|legend|caption|table|thead|tbody|tfoot|tr|th|td";
			$commonMethods = "type|typeof|addChild|removeChild|addEventListener|removeEventListener|addChildAt|removeChildAt|destroy";
			$properties = "-|outline|vertical|width|min|max|height|color|background|padding|left|right|top|bottom|font|weight|size|text|align|style|line|overflow|margin|float|family|border|white|space|adjust";
			$commonKeywords = $properties . "|set|this|source|auto|normal|pre|solid|dashed|dotted";
			$operators = "\?|\||%|!|(&#42;)|(&#47;)|(&#60;)|(&#61;)|(&#62;)|(&#38;)|(&#91;)|(&#93;)|Embed";
			
			//ORDER IS CRUCIAL
			$code = ColorTextPattern::replaceSpecials($code); //replace special characters
			
			$code = ColorTextPattern::replaceInPattern($code, "/(([^\W])(\/)([^\W])|((\s|\d|\w|=)(\/)(\s|\d|\w|=)))/", "/", "&#47;"); //need to replace single / to distinguish this from line comments //
			$code = ColorTextPattern::replaceInPattern($code, "/[^\/]\*[^\/]([^\/]\*[^\/])*\*?/", "*", "&#42;"); //need to replace * to distinguish from block comments /* */
			//$code = ColorTextPattern::replaceInPattern($code, "/((&#34;)(.*?)(&#34;))|((&#39;)(.*?)(&#39;))/", "/", "&#47;"); //replace comments in strings

			//$code = ColorTextPattern::colorCodePattern($code, "/#[\da-fA-F]{3,6}/", $this->CONSTANT);
			//$code = ColorTextPattern::colorCodePattern($code, "/[^#|^\w]\d\d*/", $this->NUMBER, 1);
			//$code = ColorTextPattern::colorCodePattern($code, "/(\W):#\d+([\dA-Fa-fxX])*/", $this->NUMBER, 1);
			//$code = ColorTextPattern::colorCodePattern($code, "/(\W)(" . $this->getRepeatPattern($reserved) . ")(\W)/", $this->RESERVED, 1, 1);
			//$code = ColorTextPattern::colorCodePattern($code, "/(\W)(" . $this->getRepeatPattern($commonMethods) . ")(\W)/", $this->COMMON, 1, 1);
			//$code = ColorTextPattern::colorCodePattern($code, "/(\W)(" . $this->getRepeatPattern($commonKeywords, '(\s|-)+') . ")(\W)/", $this->COMMON, 1, 1);
			$code = ColorTextPattern::colorCodePattern($code, "/(&#60;).*?(&#62;)/", $this->TAG);
			$code = ColorTextPattern::colorCodePattern($code, "/([^\\\\](&#34;)[^\\\\]*?(&#34;))|([^\\\\](&#39;)[^\\\\]*?(&#39;))/", $this->STRING, 1); //Need to disable comments inside strings
			$code = ColorTextPattern::colorCodePattern($code, "/((&#92;)(\w|\s|\d|(&#34;)|(&#39;)))/", $this->CHAR_ESCAPE);
			$code = ColorTextPattern::colorCodePattern($code, "/(&#60;)!--.*?--(&#62;)/", $this->COMMENT);
			
			$this->_code = $code;
		}
	}
?>