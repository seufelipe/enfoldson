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


function avf_text_logo_final_output( $logo ) {

    $link = home_url('/');
    $headline_type = "span";

    if( $logo = avia_get_option('logo') )
    {
         $logo = apply_filters('avf_logo', $logo);
         if(is_numeric($logo)){ $logo = wp_get_attachment_image_src($logo, 'full'); $logo = $logo[0]; }
         $logo = "<img {$dimension} src='{$logo}' alt='{$alt}' />";
         $logo = "<$headline_type class='logo'><a href='".$link."'>".$logo."</a></$headline_type>";
    }
    else
    {
        $logo = get_bloginfo('name');
        $logo = "<$headline_type class='logo'><a href='".$link."'>".$logo."</a></$headline_type>";
    }

    return $logo;
}
add_filter( 'avf_logo_final_output', 'avf_text_logo_final_output' );


?>
