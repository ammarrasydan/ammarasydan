<?php
/**
 * Social media functions.
 *
 * @package ThinkUpThemes
 */


 /* ----------------------------------------------------------------------------------
	PRE HEADER STYLE
---------------------------------------------------------------------------------- */
function thinkup_input_headerstylepre($classes) {

// Get theme options values.
$thinkup_header_styleswitchpre = thinkup_var ( 'thinkup_header_styleswitchpre' );

	// Check which header style should be output
	if ( empty( $thinkup_header_styleswitchpre ) or $thinkup_header_styleswitchpre == 'option1' ) {
		$classes[] = 'pre-header-style1';
	} else if ( $thinkup_header_styleswitchpre == 'option2' ) {
		$classes[] = 'pre-header-style2';
	}

	return $classes;
}
add_action( 'body_class', 'thinkup_input_headerstylepre');


/* ----------------------------------------------------------------------------------
	HEADER STYLE
---------------------------------------------------------------------------------- */
function thinkup_input_headerstyle($classes) {

// Get theme options values.
$thinkup_header_styleswitch    = thinkup_var ( 'thinkup_header_styleswitch' );
$thinkup_header_locationswitch = thinkup_var ( 'thinkup_header_locationswitch' );

	// Check which header style should be output
	if ( $thinkup_header_styleswitch == 'option2' ) {
		$classes[] = 'header-style1';

			// Check whether header should be output above or below header
			if ( $thinkup_header_locationswitch == 'option2' ) {
				$classes[] = 'header-below';
			}

	} else if ( empty( $thinkup_header_styleswitch ) or $thinkup_header_styleswitch == 'option1' ) {	
		$classes[] = 'header-style2';
	}

	return $classes;
}
add_action( 'body_class', 'thinkup_input_headerstyle');


/* ----------------------------------------------------------------------------------
	SEARCH - DISABLE SEARCH (PRE HEADER)
---------------------------------------------------------------------------------- */
function thinkup_input_preheadersearch() {

// Get theme options values.
$thinkup_header_searchswitchpre = thinkup_var ( 'thinkup_header_searchswitchpre' );

	if ( $thinkup_header_searchswitchpre == '1' ) {
		echo '<div id="pre-header-search">',
			 '<div class="fa fa-search"></div>',
		     get_search_form(),
		     '</div>';
	}
}

/* ----------------------------------------------------------------------------------
	SEARCH - DISABLE SEARCH (HEADER)
---------------------------------------------------------------------------------- */
function thinkup_input_headersearch() {

// Get theme options values.
$thinkup_header_searchswitch = thinkup_var ( 'thinkup_header_searchswitch' );

	if ( $thinkup_header_searchswitch == '1' ) {
		echo '<div id="header-search">',
			 '<a><div class="fa fa-search"></div></a>',
		     get_search_form(),
		     '</div>';
	}
}

/* ----------------------------------------------------------------------------------
	SOCIAL MEDIA - DISPLAY MESSAGE
---------------------------------------------------------------------------------- */

/* Message Settings */
function thinkup_input_socialmessage(){

// Get theme options values.
$thinkup_header_socialmessage   = thinkup_var ( 'thinkup_header_socialmessage' );
$thinkup_header_facebookswitch  = thinkup_var ( 'thinkup_header_facebookswitch' );
$thinkup_header_twitterswitch   = thinkup_var ( 'thinkup_header_twitterswitch' );
$thinkup_header_googleswitch    = thinkup_var ( 'thinkup_header_googleswitch' );
$thinkup_header_linkedinswitch  = thinkup_var ( 'thinkup_header_linkedinswitch' );
$thinkup_header_flickrswitch    = thinkup_var ( 'thinkup_header_flickrswitch' );
$thinkup_header_pinterestswitch = thinkup_var ( 'thinkup_header_pinterestswitch' );
$thinkup_header_youtubeswitch   = thinkup_var ( 'thinkup_header_youtubeswitch' );
$thinkup_header_rssswitch       = thinkup_var ( 'thinkup_header_rssswitch' );

	if ( empty( $thinkup_header_facebookswitch ) 
		and empty( $thinkup_header_twitterswitch ) 
		and empty( $thinkup_header_googleswitch ) 
		and empty( $thinkup_header_linkedinswitch ) 
		and empty( $thinkup_header_flickrswitch ) 
		and empty( $thinkup_header_pinterestswitch ) 
		and empty( $thinkup_header_youtubeswitch ) 
		and empty( $thinkup_header_rssswitch ) ) {	
		return '';
	} else if ( ! empty( $thinkup_header_socialmessage ) ) {	
		return esc_html( $thinkup_header_socialmessage );
	} else if ( empty( $thinkup_header_socialmessage ) ) {
		return '';
	}
}


/* ----------------------------------------------------------------------------------
	SOCIAL MEDIA - CUSTOM ICONS
---------------------------------------------------------------------------------- */

/* Facebook - Custom Icon */
function thinkup_input_facebookicon(){

// Get theme options values.
$thinkup_header_facebookiconswitch = thinkup_var ( 'thinkup_header_facebookiconswitch' );
$thinkup_header_facebookcustomicon = thinkup_var ( 'thinkup_header_facebookcustomicon', 'url' );

	$output = NULL;

	if ( $thinkup_header_facebookiconswitch == '1' and ! empty( $thinkup_header_facebookcustomicon ) ) {
		$output .= '#pre-header-social li.facebook a,';
		$output .= '#pre-header-social li.facebook a:hover,';
		$output .= '#header-social li.facebook a,';
		$output .= '#header-social li.facebook a:hover {';
		$output .= 'background: url("' . esc_url( $thinkup_header_facebookcustomicon ) . '") no-repeat center;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.facebook i,';
		$output .= '#header-social li.facebook i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Twitter - Custom Icon */
function thinkup_input_twittericon(){

// Get theme options values.
$thinkup_header_twittericonswitch = thinkup_var ( 'thinkup_header_twittericonswitch' );
$thinkup_header_twittercustomicon = thinkup_var ( 'thinkup_header_twittercustomicon', 'url' );

	$output = NULL;

	if ( $thinkup_header_twittericonswitch == '1' and ! empty( $thinkup_header_twittercustomicon ) ) {
		$output .= '#pre-header-social li.twitter a,';
		$output .= '#pre-header-social li.twitter a:hover,';
		$output .= '#header-social li.twitter a,';
		$output .= '#header-social li.twitter a:hover {';
		$output .= 'background: url("' . esc_url( $thinkup_header_twittercustomicon ) . '") no-repeat center;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.twitter i,';
		$output .= '#header-social li.twitter i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Google+ - Custom Icon */
function thinkup_input_googleicon(){

// Get theme options values.
$thinkup_header_googleiconswitch = thinkup_var ( 'thinkup_header_googleiconswitch' );
$thinkup_header_googlecustomicon = thinkup_var ( 'thinkup_header_googlecustomicon', 'url' );

	$output = NULL;

	if ( $thinkup_header_googleiconswitch == '1' and ! empty( $thinkup_header_googlecustomicon ) ) {
		$output .= '#pre-header-social li.google-plus a,';
		$output .= '#pre-header-social li.google-plus a:hover,';
		$output .= '#header-social li.google-plus a,';
		$output .= '#header-social li.google-plus a:hover {';
		$output .= 'background: url("' . esc_url( $thinkup_header_googlecustomicon ) . '") no-repeat center;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.google-plus i,';
		$output .= '#header-social li.google-plus i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* LinkedIn - Custom Icon */
function thinkup_input_linkedinicon(){

// Get theme options values.
$thinkup_header_linkediniconswitch = thinkup_var ( 'thinkup_header_linkediniconswitch' );
$thinkup_header_linkedincustomicon = thinkup_var ( 'thinkup_header_linkedincustomicon', 'url' );

	$output = NULL;

	if ( $thinkup_header_linkediniconswitch == '1' and ! empty( $thinkup_header_linkedincustomicon ) ) {
		$output .= '#pre-header-social li.linkedin a,';
		$output .= '#pre-header-social li.linkedin a:hover,';
		$output .= '#header-social li.linkedin a,';
		$output .= '#header-social li.linkedin a:hover {';
		$output .= 'background: url("' . esc_url( $thinkup_header_linkedincustomicon ) . '") no-repeat center;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.linkedin i,';
		$output .= '#header-social li.linkedin i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Flickr - Custom Icon */
function thinkup_input_flickricon(){

// Get theme options values.
$thinkup_header_flickriconswitch = thinkup_var ( 'thinkup_header_flickriconswitch' );
$thinkup_header_flickrcustomicon = thinkup_var ( 'thinkup_header_flickrcustomicon', 'url' );

	$output = NULL;

	if ( $thinkup_header_flickriconswitch == '1' and ! empty( $thinkup_header_flickrcustomicon ) ) {
		$output .= '#pre-header-social li.flickr a,';
		$output .= '#pre-header-social li.flickr a:hover,';
		$output .= '#header-social li.flickr a,';
		$output .= '#header-social li.flickr a:hover {';
		$output .= 'background: url("' . esc_url( $thinkup_header_flickrcustomicon ) . '") no-repeat center;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.flickr i,';
		$output .= '#header-social li.flickr i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Pinterest - Custom Icon */
function thinkup_input_pinteresticon(){

// Get theme options values.
$thinkup_header_pinteresticonswitch = thinkup_var ( 'thinkup_header_pinteresticonswitch' );
$thinkup_header_pinterestcustomicon = thinkup_var ( 'thinkup_header_pinterestcustomicon', 'url' );

	$output = NULL;

	if ( $thinkup_header_pinteresticonswitch == '1' and ! empty( $thinkup_header_pinterestcustomicon ) ) {
		$output .= '#pre-header-social li.pinterest a,';
		$output .= '#pre-header-social li.pinterest a:hover,';
		$output .= '#header-social li.pinterest a,';
		$output .= '#header-social li.pinterest a:hover {';
		$output .= 'background: url("' . esc_url( $thinkup_header_pinterestcustomicon ) . '") no-repeat center;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.pinterest i,';
		$output .= '#header-social li.pinterest i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* YouTube - Custom Icon */
function thinkup_input_youtubeicon(){

// Get theme options values.
$thinkup_header_youtubeiconswitch = thinkup_var ( 'thinkup_header_youtubeiconswitch' );
$thinkup_header_youtubecustomicon = thinkup_var ( 'thinkup_header_youtubecustomicon', 'url' );

	$output = NULL;

	if ( $thinkup_header_youtubeiconswitch == '1' and ! empty( $thinkup_header_youtubecustomicon ) ) {
		$output .= '#pre-header-social li.youtube a,';
		$output .= '#pre-header-social li.youtube a:hover,';
		$output .= '#header-social li.youtube a,';
		$output .= '#header-social li.youtube a:hover {';
		$output .= 'background: url("' . esc_url( $thinkup_header_youtubecustomicon ) . '") no-repeat center;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.youtube i,';
		$output .= '#header-social li.youtube i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* RSS - Custom Icon */
function thinkup_input_rssicon(){

// Get theme options values.
$thinkup_header_rssiconswitch = thinkup_var ( 'thinkup_header_rssiconswitch' );
$thinkup_header_rsscustomicon = thinkup_var ( 'thinkup_header_rsscustomicon', 'url' );

	$output = NULL;

	if ( $thinkup_header_rssiconswitch == '1' and ! empty( $thinkup_header_rsscustomicon ) ) {
		$output .= '#pre-header-social li.rss a,';
		$output .= '#pre-header-social li.rss a:hover,';
		$output .= '#header-social li.rss a,';
		$output .= '#header-social li.rss a:hover {';
		$output .= 'background: url("' . esc_url( $thinkup_header_rsscustomicon ) . '") no-repeat center;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.rss i,';
		$output .= '#header-social li.rss i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Input Custom Social Media Icons */
function thinkup_input_socialicon(){

	$output = NULL;
	
	$output .= thinkup_input_facebookicon();
	$output .= thinkup_input_twittericon();
	$output .= thinkup_input_googleicon();
	$output .= thinkup_input_linkedinicon();
	$output .= thinkup_input_flickricon();
	$output .= thinkup_input_pinteresticon();
	$output .= thinkup_input_youtubeicon();
	$output .= thinkup_input_rssicon();

	if ( ! empty( $output ) ) {
		echo    '<style type="text/css">' . "\n" . $output . '</style>';
	}
}
add_action( 'wp_head', 'thinkup_input_socialicon', 13 );


/* ----------------------------------------------------------------------------------
	SOCIAL MEDIA - OUTPUT SOCIAL MEDIA SELECTIONS (PRE HEADER)
---------------------------------------------------------------------------------- */

function thinkup_input_socialmediaheaderpre() {

// Get theme options values.
$thinkup_header_socialswitchpre = thinkup_var ( 'thinkup_header_socialswitchpre' );
$thinkup_header_socialmessage   = thinkup_var ( 'thinkup_header_socialmessage' );
$thinkup_header_facebookswitch  = thinkup_var ( 'thinkup_header_facebookswitch' );
$thinkup_header_facebooklink    = thinkup_var ( 'thinkup_header_facebooklink' );
$thinkup_header_twitterswitch   = thinkup_var ( 'thinkup_header_twitterswitch' );
$thinkup_header_twitterlink     = thinkup_var ( 'thinkup_header_twitterlink' );
$thinkup_header_googleswitch    = thinkup_var ( 'thinkup_header_googleswitch' );
$thinkup_header_googlelink      = thinkup_var ( 'thinkup_header_googlelink' );
$thinkup_header_linkedinswitch  = thinkup_var ( 'thinkup_header_linkedinswitch' );
$thinkup_header_linkedinlink    = thinkup_var ( 'thinkup_header_linkedinlink' );
$thinkup_header_flickrswitch    = thinkup_var ( 'thinkup_header_flickrswitch' );
$thinkup_header_flickrlink      = thinkup_var ( 'thinkup_header_flickrlink' );
$thinkup_header_pinterestswitch = thinkup_var ( 'thinkup_header_pinterestswitch' );
$thinkup_header_pinterestlink   = thinkup_var ( 'thinkup_header_pinterestlink' );
$thinkup_header_youtubeswitch   = thinkup_var ( 'thinkup_header_youtubeswitch' );
$thinkup_header_youtubelink     = thinkup_var ( 'thinkup_header_youtubelink' );
$thinkup_header_rssswitch       = thinkup_var ( 'thinkup_header_rssswitch' );
$thinkup_header_rsslink         = thinkup_var ( 'thinkup_header_rsslink' );

// Reset count values used in foreach loop
$i = 0;
$j = 0;

	if ( $thinkup_header_socialswitchpre == '1' ) {

		// Assign social media link to an array
		$social_links = array( 
			array( 'social' => 'Facebook',  'icon' => 'facebook',     'toggle' => $thinkup_header_facebookswitch,  'link' => $thinkup_header_facebooklink ),
			array( 'social' => 'Twitter',   'icon' => 'twitter',      'toggle' => $thinkup_header_twitterswitch,   'link' => $thinkup_header_twitterlink ),
			array( 'social' => 'Google+',   'icon' => 'google-plus',  'toggle' => $thinkup_header_googleswitch,    'link' => $thinkup_header_googlelink ),
			array( 'social' => 'LinkedIn',  'icon' => 'linkedin',     'toggle' => $thinkup_header_linkedinswitch,  'link' => $thinkup_header_linkedinlink ),
			array( 'social' => 'Flickr',    'icon' => 'flickr',       'toggle' => $thinkup_header_flickrswitch,    'link' => $thinkup_header_flickrlink ),
			array( 'social' => 'Pinterest', 'icon' => 'pinterest',    'toggle' => $thinkup_header_pinterestswitch, 'link' => $thinkup_header_pinterestlink ),
			array( 'social' => 'YouTube',   'icon' => 'youtube',      'toggle' => $thinkup_header_youtubeswitch,   'link' => $thinkup_header_youtubelink ),
			array( 'social' => 'RSS',       'icon' => 'rss',          'toggle' => $thinkup_header_rssswitch,       'link' => $thinkup_header_rsslink ),
		);


		// Output social media links if any link is set
		foreach( $social_links as $social ) {	
			if ( ! empty( $social['link'] ) and $j == 0 ) {
				echo '<div id="pre-header-social"><ul>'; $j = 1;

				if ( ! empty ( $thinkup_header_socialmessage ) ) {
					echo '<li class="social message">' . thinkup_input_socialmessage() . '</li>';
				}
			}

			if ( ! empty( $social['link'] ) and $social['toggle'] == '1' ) {

			echo '<li class="social ' . esc_attr( $social['icon'] ) . '">',
				 '<a href="' . esc_url( $social['link'] ) . '" data-tip="bottom" data-original-title="' . esc_attr( $social['social'] ) . '" target="_blank">',
				 '<i class="fa fa-' . esc_attr( $social['icon'] ) . '"></i>',
				 '</a>',
				 '</li>';
			}
		}

		// Close list output of social media links if any link is set
		if ( $j !== 0 ) echo '</ul></div>';
	}
}


/* ----------------------------------------------------------------------------------
	SOCIAL MEDIA - OUTPUT SOCIAL MEDIA SELECTIONS (PRE HEADER)
---------------------------------------------------------------------------------- */

function thinkup_input_socialmediaheadermain() {

// Get theme options values.
$thinkup_header_socialswitchmain = thinkup_var ( 'thinkup_header_socialswitchmain' );
$thinkup_header_socialmessage    = thinkup_var ( 'thinkup_header_socialmessage' );
$thinkup_header_facebookswitch   = thinkup_var ( 'thinkup_header_facebookswitch' );
$thinkup_header_facebooklink     = thinkup_var ( 'thinkup_header_facebooklink' );
$thinkup_header_twitterswitch    = thinkup_var ( 'thinkup_header_twitterswitch' );
$thinkup_header_twitterlink      = thinkup_var ( 'thinkup_header_twitterlink' );
$thinkup_header_googleswitch     = thinkup_var ( 'thinkup_header_googleswitch' );
$thinkup_header_googlelink       = thinkup_var ( 'thinkup_header_googlelink' );
$thinkup_header_linkedinswitch   = thinkup_var ( 'thinkup_header_linkedinswitch' );
$thinkup_header_linkedinlink     = thinkup_var ( 'thinkup_header_linkedinlink' );
$thinkup_header_flickrswitch     = thinkup_var ( 'thinkup_header_flickrswitch' );
$thinkup_header_flickrlink       = thinkup_var ( 'thinkup_header_flickrlink' );
$thinkup_header_pinterestswitch  = thinkup_var ( 'thinkup_header_pinterestswitch' );
$thinkup_header_pinterestlink    = thinkup_var ( 'thinkup_header_pinterestlink' );
$thinkup_header_youtubeswitch    = thinkup_var ( 'thinkup_header_youtubeswitch' );
$thinkup_header_youtubelink      = thinkup_var ( 'thinkup_header_youtubelink' );
$thinkup_header_rssswitch        = thinkup_var ( 'thinkup_header_rssswitch' );
$thinkup_header_rsslink          = thinkup_var ( 'thinkup_header_rsslink' );

// Reset count values used in foreach loop
$i = 0;
$j = 0;

$output = NULL;

	if ( $thinkup_header_socialswitchmain == '1' ) {

		// Assign social media link to an array
		$social_links = array( 
			array( 'social' => 'Facebook',  'icon' => 'facebook',     'toggle' => $thinkup_header_facebookswitch,  'link' => $thinkup_header_facebooklink ),
			array( 'social' => 'Twitter',   'icon' => 'twitter',      'toggle' => $thinkup_header_twitterswitch,   'link' => $thinkup_header_twitterlink ),
			array( 'social' => 'Google+',   'icon' => 'google-plus',  'toggle' => $thinkup_header_googleswitch,    'link' => $thinkup_header_googlelink ),
			array( 'social' => 'LinkedIn',  'icon' => 'linkedin',     'toggle' => $thinkup_header_linkedinswitch,  'link' => $thinkup_header_linkedinlink ),
			array( 'social' => 'Flickr',    'icon' => 'flickr',       'toggle' => $thinkup_header_flickrswitch,    'link' => $thinkup_header_flickrlink ),
			array( 'social' => 'Pinterest', 'icon' => 'pinterest',    'toggle' => $thinkup_header_pinterestswitch, 'link' => $thinkup_header_pinterestlink ),
			array( 'social' => 'YouTube',   'icon' => 'youtube',      'toggle' => $thinkup_header_youtubeswitch,   'link' => $thinkup_header_youtubelink ),
			array( 'social' => 'RSS',       'icon' => 'rss',          'toggle' => $thinkup_header_rssswitch,       'link' => $thinkup_header_rsslink ),
		);


		// Output social media links if any link is set
		foreach( $social_links as $social ) {	
			if ( ! empty( $social['link'] ) and $j == 0 ) {
				$output .= '<div id="header-social"><ul>'; $j = 1;

				if ( ! empty ( $thinkup_header_socialmessage ) ) {
					$output .= '<li class="social message">' . thinkup_input_socialmessage() . '</li>';
				}
			}

			if ( ! empty( $social['link'] ) and $social['toggle'] == '1' ) {

			$output .= '<li class="social ' . esc_attr( $social['icon'] ) . '">';
			$output .= '<a href="' . esc_url( $social['link'] ) . '" data-tip="bottom" data-original-title="' . esc_attr( $social['social'] ) . '" target="_blank">';
			$output .= '<i class="fa fa-' . esc_attr( $social['icon'] ) . '"></i>';
			$output .= '</a>';
			$output .= '</li>';
			}
		}

		// Close list output of social media links if any link is set
		if ( $j !== 0 ) $output .= '</ul></div>';
	}

	if ( ! empty( $output ) ) {
		return $output;
	} else {
		return false;	
	}
}

?>