//
//  Polygon (AS3.0)
//
//  Created by Harry Kunz on 2008-07-10.
//  Copyright (c) 2010 hkunz. All rights reserved.
//

package com.hkunz.display.utils{
	
	import flash.display.Sprite;

	public class Polygon extends Sprite{
		
		public static const REVOLUTION:int = 360;
		
		protected var _radius:int;
		protected var _sides:int;
		protected var _strokeThickness:int;
		protected var _strokeColor:int;
		protected var _fillColor:int;
		protected var _strokeAlpha:Number;
		protected var _fillAlpha:Number;
		protected var _angle:int = 0;
		
		public function Polygon(sides:Number = 5, radius:Number = 50, properties:Object = null){
			
			if(!properties) properties = {};
			
			_radius = radius;
			_sides = sides;
			
			_fillColor = (properties.fillColor != null) ? properties.fillColor : -1;
			_fillAlpha = (properties.fillAlpha != null) ? properties.fillAlpha : 1;
			_strokeColor = (properties.strokeColor != null) ? properties.strokeColor : -1;
			_strokeAlpha = (properties.strokeAlpha != null) ? properties.strokeAlpha : 1;
			_strokeThickness = (properties.strokeThickness != null) ? properties.strokeThickness : 1;
			_angle = (properties.angle != null) ? properties.angle : REVOLUTION;
			
			draw();
		}
	
		protected function draw():void{
			var angle:Number = 0;
			var angleInc:Number = (REVOLUTION / _sides);
			var xpos:Number = 0;
			var ypos:Number = 0;
			
			graphics.clear();
			if(_strokeColor > -1) graphics.lineStyle(_strokeThickness, _strokeColor, _strokeAlpha);
			graphics.moveTo(xpos, ypos);
			graphics.beginFill(_fillColor, _fillAlpha);
		
			while(angle <= _angle){
				xpos = getAngleX(_radius, angle);
				ypos = getAngleY(_radius, angle);
				angle += angleInc;
				graphics.lineTo(xpos,ypos);
			}

			graphics.endFill();
			
			function getAngleX(r:Number, Angle:Number):Number {return (r * Math.cos((90 - Angle) * Math.PI / 180));}
			function getAngleY(r:Number, Angle:Number):Number {return (-r * Math.sin((90 - Angle) * Math.PI / 180));}
		}
		
		public function set sides(value:int):void{
			_sides = value;
			draw();
		}
		
		public function set radius(value:int):void{
			_radius = value;
			draw();
		}
		
		public function set strokeThickness(value:int):void{
			_strokeThickness = value;
			draw();
		}
		
		public function set strokeColor(value:int):void{
			_strokeColor = value;
			draw();
		}
		
		public function set strokeAlpha(value:Number):void{
			_strokeAlpha = value;
			draw();
		}
		
		public function set fillAlpha(value:Number):void{
			_fillAlpha = value;
			draw();
		}
		
		public function set fillColor(value:Number):void{
			_fillColor = value;
			draw();
		}
		
		public function set angle(value:int):void{
			_angle = value;
			draw();
		}
	}
}