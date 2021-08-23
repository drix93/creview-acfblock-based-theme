<?php

// Random Color Hex
function randHexColor() {
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $randomColor = $rand[rand(0, 15)].$rand[rand(0, 15)].$rand[rand(0, 15)].$rand[rand(0, 15)].$rand[rand(0, 15)].$rand[rand(0, 15)];
    return $randomColor;
}

// Trim content words
function trim_words($content, $length, $readmore = '') {

    $trimmed_words = str_replace("<p>", "startptag", $content);
    $trimmed_words = str_replace("</p>", "endptag", $trimmed_words);
    $trimmed_words = wp_trim_words($trimmed_words, $length);
    $trimmed_words = str_replace("startptag", "<p>", $trimmed_words);
    $trimmed_words = str_replace("endptag", "</p>", $trimmed_words);

    if($readmore != '') {
        $trimmed_words .= $readmore;
    }

    return $trimmed_words;
}

// Custom content length/excerpt and readmore by characters function
function trim_char($content, $start, $char_num, $readmore = '')
{

    $trimmed_words = strip_tags($content);
    $trimmed_words = mb_strimwidth($trimmed_words, $start, $char_num, $readmore);

    return $trimmed_words;
}

// Change search form placeholder text
function replaceSearchPlaceholder( $html ) {

    $html = str_replace( 'placeholder=', 'placeholder="" remove=', $html );

    return $html;
}
add_filter( 'get_search_form', 'replaceSearchPlaceholder' );

// Get attachment image alt
function get_imgAlt( $attachment_ID ) {
 
	// Get ALT
	$thumb_alt = get_post_meta( $attachment_ID, '_wp_attachment_image_alt', true );
	
	// No ALT supplied get attachment info
	if ( empty( $thumb_alt ) )
		$attachment = get_post( $attachment_ID );
		
	// Use title if ALT supplied
	if ( empty( $thumb_alt ) )
		$thumb_alt = $attachment->post_title;
 
	// Return ALT
	return esc_attr( trim( strip_tags( $thumb_alt ) ) );
 
}