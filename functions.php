<?php


/**
 * So we can add classes to the elements
 */
add_theme_support( 'avia_template_builder_custom_css' );


/**
 * Remove the Import dummy data button
 */
add_theme_support( 'avia_disable_dummy_import' );


/**
 * Deactivate LayerSlider
 */
add_theme_support( 'deactivate_layerslider' );


/**
 * Activate debug mode
 */
function tws_builder_mode() {
	return 'debug';
}
//add_action( 'avia_builder_mode', 'tws_builder_mode' );


/**
 * Remove backlink to Enfold in the footer, sorry Kriesi
 */
function tws_kriesi_backlink() {

    return ' ';

}
add_filter( 'kriesi_backlink', 'tws_kriesi_backlink' );


function remove_enfold_features() {

    // remove Portfolio
    remove_action( 'init', 'portfolio_register' );

}
add_action( 'after_setup_theme', 'remove_enfold_features' );


function tws_avf_google_heading_font($fonts) {
    $fonts['Ubuntu Mono'] = 'Ubuntu Mono';

    return $fonts;
}
add_filter( 'avf_google_heading_font',  'tws_avf_google_heading_font');


function tws_avf_google_content_font($fonts) {
    $fonts['Ubuntu Mono'] = 'Ubuntu Mono';

    return $fonts;
}
add_filter( 'avf_google_content_font',  'tws_avf_google_content_font');


/**
 * Simple shortcode to display current year
 * useful for the Copyright message
 */
function tws_year_shortcode() {
    $year = date( 'Y' );

    return $year;
}
add_shortcode( 'year', 'tws_year_shortcode' );


?>
