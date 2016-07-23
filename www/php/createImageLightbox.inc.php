<?php
	function createImageLightbox($ipath, $initwidth) {
		$r = rand();
		$light_ = "light_" . $r;
		$fade = "fade_" . $r;
		$func = "lightbox_open(" . $light_ . "," . $fade . ");";
		echo '<a href="#" onclick="' . $func . '">';
		echo '<div class="showTell">';
		echo '<img class="" src="' . $ipath . '" width="' . $initwidth . '"/>';
		echo '</div>';
		echo '</a>';
        	echo '<div class="light" id="' . $light_ . '"><img src="' . $ipath . '"/></div>';
        	echo '<div class="fade" id="' . $fade . '" onClick="lightbox_close(' . $light_ . ", " . $fade . ');"></div>';
        	echo '<p class="block"></p>';
	}
	function createYoutubeVideo($id) {
		echo '<br/><div class=".block"><iframe width="100%" height="400" src="http://www.youtube.com/embed/' . $id . '" allowfullscreen="allowfullscreen" data-link="http://www.youtube.com/watch?v=' . $id . '"></iframe></div>';
	}
?>
