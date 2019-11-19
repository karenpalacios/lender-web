<?php
/**
 * The front-page template file.
 *
 * @package Acme Themes
 * @subpackage Axial Business
 * @since Axial Business 1.0.0
 */
get_header();

/**
 * construction_field_action_front_page hook
 * @since Axial Business 1.0.0
 *
 * @hooked construction_field_featured_slider -  10
 * @hooked construction_field_front_page -  20
 */
do_action( 'construction_field_action_front_page' );

get_footer();