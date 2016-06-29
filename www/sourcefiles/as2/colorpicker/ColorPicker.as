//
//  ColorPicker
//
//  Created by Harry Kunz on 2008-07-10.
//  Copyright (c) 2010 hkunz. All rights reserved.
//

class ColorPicker
{
   public static var SWATCH_SIZE:Number = 10;
	
   private var _mcContainer:MovieClip; //Holds all the parts of the object
   private var _mcPalette:MovieClip; //Contains only the Color Swatches (each act as button)
   private var _mcColorBtn:MovieClip; //Color Selection Button
   private var _mcActiveColor:MovieClip; //Active or Temporary Color Preview (acts as button)
   private var _mcTransBtn:MovieClip; //Button or Transparent Swatch to set null color
   private var _dtHexValue:TextField; //Dynamic Text Field holds the active or temporary colors hex value
   private var _tfHexFormat:TextFormat; //Text Formatting Object for the _dtHexValue Text Field
   private var _mcActiveSwatch:MovieClip; //Highlight for Color hovered
   private var _oListener:Object; //"onColorPick" & "onColorDisplay" & "onColorHover" & "onColorRollOut"
   private var _nCurrentColor:Number; //Holds the value for the Previously Selected Color
   private var _nActiveColor:Number;
   private var _nQuadrantPosition:Number;

   public function ColorPicker(mcContainer:MovieClip, nPosX:Number, nPosY:Number, nDefaultColor:Number, oListener:Object)
   {
      _mcContainer = mcContainer;
      _mcColorBtn = _mcContainer.createEmptyMovieClip("_mcColorBtn", 0);
      _nCurrentColor = nDefaultColor;
      _oListener = oListener;
      _mcColorBtn.onPress = functionProxy(this, onColorPickPress);
      setQuadrant(2);
      setPosition(nPosX, nPosY);
      drawColorPickButton(_nCurrentColor);
   }

   private function createColorPalette(Void):Void
   {
      var nDepth:Number = 252; //After Swatches Future Value
      _mcPalette = _mcContainer.createEmptyMovieClip("_mcPalette", 1);
      _mcActiveColor = _mcPalette.createEmptyMovieClip("_mcActiveColor", nDepth++);
      _mcTransBtn = _mcPalette.createEmptyMovieClip("_mcTransBtn", nDepth++);
      _dtHexValue = _mcPalette.createTextField("_dtHexValue", nDepth++, SWATCH_SIZE * 5.5, SWATCH_SIZE * 0.9, SWATCH_SIZE * 10, SWATCH_SIZE * 1.8);
      _mcActiveSwatch = _mcPalette.createEmptyMovieClip("_mcActiveSwatch", nDepth++);
      _mcTransBtn.onPress = functionProxy(this, onTransBtnPress);
      _mcTransBtn.onRollOver = functionProxy(this, onTransBtnRollOver);
      _mcTransBtn.onRollOut = functionProxy(this, onTransBtnRollOut);
      _mcActiveColor.onPress = functionProxy(this, removeColorPalette);
      _mcColorBtn.onPress = functionProxy(this, removeColorPalette);
      drawColorPaletteBackground(0xEDEDED);
      drawColorPalette3Columns();//Draw first 3 Columns of Color Palette
      drawColorPalette(0x000000, 0);//Draw Upper Color Palette after Column 3
      drawColorPalette(0x990000, 1);//Draw Lower Color Palette after Column 3
      drawActiveColor(_nCurrentColor, 100);
      drawTransSetterBtn();
      createTextHexValue(SWATCH_SIZE - 10);
      setColorText(decToHex(_nCurrentColor.toString()));
      setQuadrant(_nQuadrantPosition);
   }

   private function removeColorPalette(Void):Void
   {
      delete _mcTransBtn.onPress;
      delete _mcTransBtn.onRollOver;
      delete _mcTransBtn.onRollOut;
      delete _mcActiveColor.onPress;
      _mcPalette.removeMovieClip();
      _mcColorBtn.onPress = functionProxy(this, onColorPickPress);
      drawColorPickButton(_nCurrentColor);
   }

   private function drawColorPickButton(nSelectedColor:Number):Void
   {
      var fTrans:Boolean = false;
      var nSize:Number = 1;
      if(isNaN(nSelectedColor)) fTrans = true;
      if(fTrans) nSelectedColor = 0xFFFFFF;//IF TRANSPARENT THEN WHITE COLOR BACKGROUND
      //LAYER 1 OR OUTER OUTLINE                                                                  
      _mcColorBtn.clear();
      _mcColorBtn.lineStyle(1 * nSize,0xFFFFFF,100);
      _mcColorBtn.moveTo(0,0);
      _mcColorBtn.beginFill(0xFFFFFF,100);
      _mcColorBtn.lineTo(0,17 * nSize);
      _mcColorBtn.moveTo(0,0);
      _mcColorBtn.lineTo(20 * nSize,0);
      _mcColorBtn.lineTo(20 * nSize,17 * nSize);
      _mcColorBtn.lineTo(0,17 * nSize);
      _mcColorBtn.endFill();
      _mcColorBtn.lineStyle(1 * nSize,0xA0A0A0,100);
      _mcColorBtn.lineTo(20 * nSize,17 * nSize);
      _mcColorBtn.lineTo(20 * nSize,0);
      //LAYER 2 OR MIDDLE OUTLINE
      _mcColorBtn.lineStyle(1 * nSize,0xEDEDED,100);
      _mcColorBtn.moveTo(1 * nSize,1 * nSize);
      _mcColorBtn.beginFill(0xEDEDED,100);
      _mcColorBtn.lineTo(1 * nSize,16 * nSize);
      _mcColorBtn.lineTo(19 * nSize,16 * nSize);
      _mcColorBtn.lineTo(19 * nSize,1 * nSize);
      _mcColorBtn.lineTo(1 * nSize,1 * nSize);
      _mcColorBtn.endFill();
      //LAYER 3 OR INNER OUTLINE
      _mcColorBtn.lineStyle(1 * nSize,0xA0A0A0,100);
      _mcColorBtn.moveTo(2 * nSize,2 * nSize);
      _mcColorBtn.beginFill(nSelectedColor,100);
      _mcColorBtn.lineTo(2 * nSize,15 * nSize);
      _mcColorBtn.lineTo(12 * nSize,15 * nSize);
      _mcColorBtn.lineTo(12 * nSize,11 * nSize);
      _mcColorBtn.lineTo(18 * nSize,11 * nSize);
      _mcColorBtn.lineTo(18 * nSize,2 * nSize);
      _mcColorBtn.lineTo(2 * nSize,2 * nSize);
      _mcColorBtn.endFill();
      _mcColorBtn.lineStyle(1 * nSize,0xFFFFFF,100);
      _mcColorBtn.moveTo(2 * nSize,15 * nSize);
      _mcColorBtn.lineTo(12 * nSize,15 * nSize);
      _mcColorBtn.lineTo(12 * nSize,11 * nSize);
      _mcColorBtn.lineTo(18 * nSize,11 * nSize);
      _mcColorBtn.lineTo(18 * nSize,2 * nSize);
      //BLACK ARROW ON LOWER RIGHT CORNER
      _mcColorBtn.lineStyle(1 * nSize,0x000000,100);
      _mcColorBtn.moveTo(14 * nSize,13 * nSize);
      _mcColorBtn.beginFill(0x000000,100);
      _mcColorBtn.lineTo(16 * nSize,15 * nSize);
      _mcColorBtn.lineTo(18 * nSize,13 * nSize);
      _mcColorBtn.lineTo(14 * nSize,13 * nSize);
      _mcColorBtn.endFill();
      _mcColorBtn.useHandCursor = false;
      if(true == fTrans)
      {
         //IF TRANSPARENCY BUTTON IS PRESSED DRAW A RED DIAGONAL ON THE COLOR BUTTON
         _mcColorBtn.lineStyle(2 * nSize,0xCC0022,100);
         _mcColorBtn.moveTo(4 * nSize, _mcColorBtn._height - nSize * 4);
         _mcColorBtn.lineTo(_mcColorBtn._width - nSize * 4,3 * nSize);
      }
   }

   private function drawColorPaletteBackground(nColorBg:Number):Void
   {
      _mcPalette.clear();
      _mcPalette.lineStyle(1,0x000000,100);
      _mcPalette.moveTo(0,0);
      _mcPalette.beginFill(nColorBg,100);
      _mcPalette.lineTo(0,SWATCH_SIZE * 16);
      _mcPalette.lineTo(SWATCH_SIZE * 23,SWATCH_SIZE * 16);
      _mcPalette.lineTo(SWATCH_SIZE * 23,0);
      _mcPalette.lineTo(0,0);
      _mcPalette.endFill();
      _mcPalette.lineStyle(2,0x000000,100);
      _mcPalette.moveTo(SWATCH_SIZE,SWATCH_SIZE * 3);
      _mcPalette.lineTo(SWATCH_SIZE,SWATCH_SIZE * 15);
      _mcPalette.lineTo(SWATCH_SIZE * 22,SWATCH_SIZE * 15);
      _mcPalette.lineTo(SWATCH_SIZE * 22,SWATCH_SIZE * 3);
      _mcPalette.lineTo(SWATCH_SIZE,SWATCH_SIZE * 3);
   }

   private function drawActiveColor(nActiveColor:Number, nTrans:Number):Void
   {
      _mcActiveColor.clear();
      _mcActiveColor.lineStyle(1,0x000000,100);
      _mcActiveColor.moveTo(SWATCH_SIZE,SWATCH_SIZE * 0.8);
      _mcActiveColor.beginFill(nActiveColor, nTrans);
      _mcActiveColor.lineTo(SWATCH_SIZE,SWATCH_SIZE * 2.5);
      _mcActiveColor.lineTo(SWATCH_SIZE * 5,SWATCH_SIZE * 2.5);
      _mcActiveColor.lineTo(SWATCH_SIZE * 5,SWATCH_SIZE * 0.8);
      _mcActiveColor.lineTo(SWATCH_SIZE,SWATCH_SIZE * 0.8);
      _mcActiveColor.endFill();
      _mcActiveColor.useHandCursor = false;
      _nActiveColor = nActiveColor;
   }

   private function drawTransSetterBtn(Void):Void
   {
      _mcTransBtn.clear();
      _mcTransBtn.lineStyle(1,0xA0A0A0,100);
      _mcTransBtn.moveTo(SWATCH_SIZE * 20,SWATCH_SIZE * 0.8);
      _mcTransBtn.beginFill(0xFFFFFF,100);
      _mcTransBtn.lineTo(SWATCH_SIZE * 20,SWATCH_SIZE * 2.5);
      _mcTransBtn.lineTo(SWATCH_SIZE * 22,SWATCH_SIZE * 2.5);
      _mcTransBtn.lineTo(SWATCH_SIZE * 22,SWATCH_SIZE * 0.8);
      _mcTransBtn.lineTo(SWATCH_SIZE * 20,SWATCH_SIZE * 0.8);
      _mcTransBtn.moveTo(SWATCH_SIZE * 20,SWATCH_SIZE * 2.5);
      _mcTransBtn.lineTo(SWATCH_SIZE * 22,SWATCH_SIZE * 0.8);
      _mcTransBtn.endFill();
      _mcTransBtn.useHandCursor = false;
   }

   private function drawSwatchHoverSelection(nIncX:Number, nIncYy:Number):Void
   {
      _mcActiveSwatch.clear();
      _mcActiveSwatch.lineStyle(2,0xFFFFFF,100);
      _mcActiveSwatch.moveTo(nIncX, nIncYy);
      _mcActiveSwatch.lineTo(nIncX, nIncYy + SWATCH_SIZE);
      _mcActiveSwatch.lineTo(nIncX + SWATCH_SIZE, nIncYy + SWATCH_SIZE);
      _mcActiveSwatch.lineTo(nIncX + SWATCH_SIZE, nIncYy);
      _mcActiveSwatch.lineTo(nIncX, nIncYy);
   }

   private function createTextHexValue(size:Number):Void
   {
      _dtHexValue.width = SWATCH_SIZE * 10;
      _dtHexValue.height = SWATCH_SIZE * 1.8;
      _dtHexValue.type = "dynamic";
      _dtHexValue.selectable = false;
      _tfHexFormat = new TextFormat();
      _tfHexFormat.font = "Arial";
      _tfHexFormat.bold = true;
      _tfHexFormat.size = 12 + size;
      _tfHexFormat.color = 0x000000;
      _tfHexFormat.align = "left";
   }

   private function onButtonRollOut(Void):Void
   {
      var sTextValue:String = null;
      if(isNaN(_nCurrentColor)) {
         sTextValue = "TRANSPARENT";
         drawActiveColor(0,0);
      } else {
         sTextValue = decToHex(_nCurrentColor.toString());
         drawActiveColor(_nCurrentColor,100);
      }
      setColorText(sTextValue);
	  _oListener.onColorRollOut.call(this);
   }

   private function onColorPickPress(Void):Void
   {
      createColorPalette();
      onButtonRollOut();
      _oListener.onColorDisplay.call(this);
   }

   private function onSwatchPress(nSelectedColor:Number):Void
   {
      _nCurrentColor = nSelectedColor;
      removeColorPalette();
      _oListener.onColorPick.call(this);
   }

   private function onSwatchRollOut()
   {
      if(_mcPalette._xmouse <= SWATCH_SIZE ||
         _mcPalette._xmouse >= SWATCH_SIZE * 22 ||
         _mcPalette._ymouse <= SWATCH_SIZE * 3 ||
         _mcPalette._ymouse >= SWATCH_SIZE * 12) {
         _mcActiveSwatch._visible = false;
      }
      onButtonRollOut();
   }

   private function onSwatchRollOver(mcSwatch:MovieClip):Void
   {
      var sName:String = mcSwatch._name;
      var nDetectedColor:Number = parseInt(sName.substr(sName.lastIndexOf("_") + 1));
      drawSwatchHoverSelection(mcSwatch._x, mcSwatch._y);
      drawActiveColor(nDetectedColor, 100);
      setColorText(decToHex(nDetectedColor.toString()));
      _oListener.onColorHover.call(this);
      _mcActiveSwatch._visible = true;
   }

   private function onTransBtnPress(Void):Void
   {
      _mcActiveSwatch._visible = false;
      _nCurrentColor = null;
      _oListener.onColorPick.call(this);
      setColorText("TRANSPARENT");
      removeColorPalette();
   }

   private function onTransBtnRollOver(Void):Void
   {
      drawActiveColor(0,0);
	  _nActiveColor = null;
      setColorText("TRANSPARENT");
	  _oListener.onColorHover.call(this);
   }

   private function onTransBtnRollOut(Void):Void
   {
      onButtonRollOut();
   }

   private function setColorText(sTextValue:String):Void
   {
      _dtHexValue.text = sTextValue;
      _dtHexValue.setTextFormat(_tfHexFormat);
   }

   private function drawColorPalette3Columns(Void):Void
   {
      var PrimColors:Array = new Array(0xFF0000, 0x00FF00, 0x0000FF, 0xFFFF00, 0x00FFFF, 0xFF00FF);
      var gColor:Number = 0x000000;
      var i:Number = 0;
      //COLUMN 1 - 1ST SET OF BLACK SWATCHES
      for(i = 0; i < 12; i++) {
         drawSwatch(gColor,i,0,0);
         if(i >= 6) drawSwatch(gColor,i,0,1);
      }
      //COLUMN 2 - UPPER HALF GRAYSCALE SWATCHES
      for(i = 12; i < 18; i++) {
         drawSwatch(gColor,i,1,0);
         gColor += 0x333333;
      }
      //Column 2 - LOWER HALF PRIMARY COLOR SWATCHES
      for(i = 18; i < 24; i++) drawSwatch(PrimColors[i - 18],i,1,1);
      //COLUMN 3 - 2ND SET OF BLACK SWATCHES
      for(i = 24; i < 36; i++) {
         drawSwatch(0x000000,i,2,0);
         if(i >= 30) drawSwatch(0x000000,i,2,1);
      }
   }

   private function drawColorPalette(nSwatchColor:Number, Set:Number):Void
   {
      var limit:Number = 36;
      var column:Number = 3;
      if(Set != 0) limit = 144;
      for(var i:Number = limit; i < (limit + 108); i++) {
         drawSwatch(nSwatchColor,i,column,Set);
         if((i - limit) % 6 == 5) {
            column++;
            nSwatchColor &= 0xFFFF00;
            if((i - limit) % 36 == 35) {
               nSwatchColor += 0x330000;
               nSwatchColor &= 0xFF00FF;
            }
            else nSwatchColor += 0x003300;
         }
         else nSwatchColor += 0x000033;
      }
   }

   private function drawSwatch(nSwatchColor:Number, nDepth:Number, nTableColumn:Number, nSet:Number):Void
   {
      var sSwatchName:String = "Sw";
      var mcSwatch:MovieClip = _mcPalette.createEmptyMovieClip(sSwatchName + nDepth + "_" + nSwatchColor, nDepth);
      mcSwatch.lineStyle(1,0x000000,0);
      mcSwatch.moveTo(0,0);
      mcSwatch.beginFill(nSwatchColor,100);
      mcSwatch.lineTo(0,SWATCH_SIZE);
      mcSwatch.lineTo(SWATCH_SIZE,SWATCH_SIZE);
      mcSwatch.lineTo(SWATCH_SIZE,0);
      mcSwatch.endFill();
      mcSwatch._x = SWATCH_SIZE + (SWATCH_SIZE * nTableColumn);
      mcSwatch._y = SWATCH_SIZE * (3 + (nDepth % 6) + (6 * nSet));
      mcSwatch.onPress = functionProxy(this, onSwatchPress, [nSwatchColor]);
      mcSwatch.onRollOver = functionProxy(this, onSwatchRollOver, [mcSwatch]);
      mcSwatch.onRollOut = functionProxy(this, onSwatchRollOut);
      mcSwatch.useHandCursor = false;
   }

   private function decToHex(dec:String):String
   {
      dec = Number(dec).toString(16).toUpperCase();
      while(dec.length < 6) dec = "0" + dec;
      return("#" + dec);
   }

   private function functionProxy(oTarget:Object, pfFunc:Function, aParams:Array):Function
   {
      var pfFuncWrapper:Function = function() {
         var oTargetCallee:Object = arguments.callee.target;
         var pfCallee:Function = arguments.callee.func;
         var nParamLength:Number = aParams.length;
         for(var i:Number = 0; i < nParamLength; i++) arguments[i] = aParams[i];
         pfCallee.apply(oTargetCallee, arguments);
      };
      pfFuncWrapper.target = oTarget;
      pfFuncWrapper.func = pfFunc;
      return pfFuncWrapper;
   }

   public function setPosition(nPosX:Number, nPosY:Number):Void
   {
      if(!(isNaN(nPosX)) && !(isNaN(nPosY)))
      {
         _mcContainer._x = nPosX;            
         _mcContainer._y = nPosY;
      }
   }

   public function setColor(newColor:Number):Void
   {
      _nCurrentColor = newColor;
      drawColorPickButton(_nCurrentColor);
   }

   public function setQuadrant(nQuadPos:Number):Void
   {
      if(nQuadPos >= 4 and not isNaN(nQuadPos)) _nQuadrantPosition = 4;
      else if(nQuadPos < 1 or isNaN(nQuadPos)) _nQuadrantPosition = 1;
      else _nQuadrantPosition = nQuadPos;
      if(_mcPalette)
      {
         if(nQuadPos <= 1 or isNaN(nQuadPos) or nQuadPos >= 4) _mcPalette._y = -_mcPalette._height;
         else _mcPalette._y = _mcColorBtn._height;
         if(nQuadPos >= 3 and not isNaN(nQuadPos)) _mcPalette._x = -_mcPalette._width + _mcColorBtn._width;
         else _mcPalette._x = 0;
      }
   }
   
   public function get _x():Number {return _mcContainer._x;}
   public function get _y():Number {return _mcContainer._y;}
   public function getColor(Void):Number {return _nCurrentColor;}
   public function addListener(oListener:Object):Void {_oListener = oListener;}
   public function getQuadrant(Void):Number {return _nQuadrantPosition;}
   public function getContainer(Void):MovieClip {return _mcContainer;}
   public function showColorPalette(Void):Void {createColorPalette();}
   public function hideColorPalette(Void):Void {removeColorPalette();}
   public function getHoveredColor(Void):Number {return _nActiveColor;}
   
   public function destroy(Void):Void
   {
      _mcContainer.removeMovieClip();
      delete _oListener;
   }
}