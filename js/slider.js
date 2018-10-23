jssor_1_slider_init = function () {

	var jssor_1_SlideshowTransitions = [{
		$Duration: 800,
		x: -0.3,
		$During: {
			$Left: [0.3, 0.7]
		},
		$Easing: {
			$Left: $Jease$.$InCubic,
			$Opacity: $Jease$.$Linear
		},
		$Opacity: 2,
		$Outside: true
	}, {
		$Duration: 1500,
		x: 0.2,
		y: -0.1,
		$Delay: 80,
		$Cols: 10,
		$Rows: 5,
		$Opacity: 2,
		$Clip: 15,
		$During: {
			$Left: [0.2, 0.8],
			$Top: [0.2, 0.8]
		},
		$ChessMode: {
			$Column: 15,
			$Row: 15
		},
		$Easing: {
			$Left: $Jease$.$InWave,
			$Top: $Jease$.$InWave,
			$Clip: $Jease$.$Linear
		},
		$Round: {
			$Left: 0.8,
			$Top: 2.5
		}
	}, {
		$Duration: 1200,
		x: 0.3,
		y: -0.3,
		$Delay: 40,
		$Cols: 10,
		$Rows: 5,
		$Opacity: 2,
		$Clip: 15,
		$During: {
			$Left: [0.2, 0.8],
			$Top: [0.2, 0.8]
		},
		$SlideOut: true,
		$Assembly: 260,
		$Easing: {
			$Left: $Jease$.$InJump,
			$Top: $Jease$.$InJump,
			$Clip: $Jease$.$Swing
		},
		$Round: {
			$Left: 0.8,
			$Top: 0.8
		}
	}, {
		$Duration: 1200,
		x: 1,
		$Delay: 20,
		$Cols: 10,
		$Rows: 5,
		$Opacity: 2,
		$Clip: 15,
		$During: {
			$Left: [0.3, 0.7]
		},
		$Formation: $JssorSlideshowFormations$.$FormationStraightStairs,
		$Assembly: 260,
		$Easing: {
			$Left: $Jease$.$InOutExpo,
			$Clip: $Jease$.$InOutQuad
		},
		$Round: {
			$Top: 0.8
		}
	}, {
		$Duration: 400,
		$Delay: 40,
		$Cols: 16,
		$Formation: $JssorSlideshowFormations$.$FormationStraight,
		$Opacity: 2,
		$Assembly: 260
	}, {
		$Duration: 500,
		$Delay: 40,
		$Cols: 10,
		$Rows: 5,
		$Opacity: 2,
		$Clip: 15,
		$Easing: $Jease$.$InSine
	}, {
		$Duration: 600,
		$Delay: 60,
		$Cols: 8,
		$Rows: 4,
		$Opacity: 2
	}];

	var jssor_1_options = {
		$AutoPlay: 1,
		$SlideEasing: $Jease$.$Early,
		$FillMode: 2,
		$Loop: 2,
		$PauseOnHover: 3,
		$SlideshowOptions: {
			$Class: $JssorSlideshowRunner$,
			$Transitions: jssor_1_SlideshowTransitions
		},
		$ArrowNavigatorOptions: {
			$Class: $JssorArrowNavigator$,
			$ChanceToShow: 1
		},
		$ThumbnailNavigatorOptions: {
			$Class: $JssorThumbnailNavigator$,
			$SpacingX: 5,
			$SpacingY: 5,
			$ActionMode: 2,
			$ChanceToShow: 1,
			$NoDrag: true
		}
	};

	var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

	/*#region responsive code begin*/

	var MAX_WIDTH = 1100;

	function ScaleSlider() {
		var containerElement = jssor_1_slider.$Elmt.parentNode;
		var containerWidth = containerElement.clientWidth;

		if (containerWidth) {

			var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

			jssor_1_slider.$ScaleWidth(expectedWidth);
		} else {
			window.setTimeout(ScaleSlider, 30);
		}
	}

	ScaleSlider();

	$Jssor$.$AddEvent(window, "load", ScaleSlider);
	$Jssor$.$AddEvent(window, "resize", ScaleSlider);
	$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
	/*#endregion responsive code end*/
};
jssor_1_slider_init();
