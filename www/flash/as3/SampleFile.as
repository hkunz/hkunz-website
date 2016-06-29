//
//  ToggleButton
//
//  Created by Harry Kunz on 2010-10-16.
//  Copyright (c) 2010 hkunz. All rights reserved.
//

package com.hkunz.components{

	import com.hkunz.components.Button;
	import com.hkunz.components.UIComponent;
	import com.hkunz.events.ButtonEvent;
	
	import flash.display.Sprite;
	import flash.display.DisplayObject;
	import flash.events.MouseEvent;
	
	/*
	ToggleButton() Parameters:
		[1] upState
		[2] downState
		[3] overState
		[4] disableState
		[5] toggleState
		[6] hitArea
		[7] cacheAsBitmap
		
	Simple Example:
		import com.hkunz.components.ToggleButton;
		import com.hkunz.display.utils.createRoundRect;
		import com.hkunz.events.ButtonEvent;
		import flash.display.Sprite;
		
		var buttonWidth:uint = 200;
		var buttonHeight:uint = 40;
		var upState:Sprite = createRoundRect(buttonWidth, buttonHeight, {radius:15, fillColor:0x99DDFF});
		var downState:Sprite = createRoundRect(buttonWidth, buttonHeight, {radius:15, fillColor:0xFFFF00});
		var disableState:Sprite = createRoundRect(buttonWidth, buttonHeight, {radius:15, fillColor:0xCCCCCC});
		var toggleState:Sprite = createRoundRect(buttonWidth, buttonHeight, {radius:15, fillColor:0x000000});
		var hitArea:Sprite = createRoundRect(buttonWidth, buttonHeight, {fillColor:0});
		
		var toggleButton:ToggleButton = new ToggleButton(upState, downState, null, disableState, toggleState);
		toggleButton.value = true;
		toggleButton.addEventListener(ButtonEvent.RELEASE, function(event:ButtonEvent):void{
			trace("Toggle State: " + (event.target as ToggleButton).value);
		});
		addChild(toggleButton);
	*/
	
	public class ToggleButton extends Button{

		//================================================================== 
		// PUBLIC PROPERTIES

		//================================================================== 
		// PRIVATE PROPERTIES
		
		protected var _toggleState:DisplayObject;
		
		//================================================================== 
		// CONSTRUCTOR

		public function ToggleButton(upState:DisplayObject = null, downState:DisplayObject = null, overState:DisplayObject = null, disableState:DisplayObject = null, toggleState:DisplayObject = null, hitArea:Sprite = null, cacheAsBitmap:Boolean = true){
			super(upState, downState, overState, disableState, hitArea, cacheAsBitmap);
			this.toggleState = toggleState;
			initialise(this);
		}

		//================================================================== 
		// PUBLIC METHODS
		
		public override function destroy():void{
			super.destroy();
			this.toggleState = null;
		}
		
		//================================================================== 
		// PROTECTED METHODS
		
		protected override function initialise(target:UIComponent):void{
			super.initialise(target);
			_value = false;
		}
		
		protected override function enable(upState:Boolean, downState:Boolean, overState:Boolean, disableState:Boolean):void{
			super.enable(upState, downState, overState, disableState);
			if(_toggleState){
				_toggleState.visible = _value && !((overState && _overState) || (downState && _downState)) && _enabled;
				if(_toggleState.visible){
					_upState.visible = false;
				}
			}
		}
		
		protected override function onMouseUpHandler(event:MouseEvent):void{
			if(_pressDispatched){
				var buttonEvent:String;
				_value = !_value;
				_value ? buttonEvent = ButtonEvent.TOGGLE_ON : buttonEvent = ButtonEvent.TOGGLE_OFF;
				dispatchEvent(new ButtonEvent(buttonEvent));
			}
			super.onMouseUpHandler(event);
		}
		
		//================================================================== 
		// PRIVATE METHODS

		//================================================================== 
		// SET METHODS

		public function set toggleState(value:DisplayObject):void{
			if(_toggleState){
				removeChild(_toggleState);
			}
			if(value){
				_toggleState = value;
				_toggleState.visible = !enabled;
				_toggleState.cacheAsBitmap = _cacheAsBitmap;
				addChildAt(_toggleState,0);
			}
		}
		
		public override function set value(value:Boolean):void{
			_value = value;
			enable(true, false, false, false);
		}
		
		//================================================================== 
		// GET METHODS
		
		public function get toggleState():DisplayObject{
			return _toggleState;
		}
	}
}