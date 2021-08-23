<?php
//// Shortcodes

// Returns current year
function currentYear() {
	echo date("Y");
}
add_shortcode( 'current_year', 'currentYear' );