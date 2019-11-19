<?php
/**
 * Axial Business functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Acme Themes
 * @subpackage Axial Business
 */

/**
 * Require init.
 */
require trailingslashit( get_template_directory() ).'acmethemes/init.php';

//Site Reviews
add_filter('site-reviews/config/inline-styles', function ($config) {
    $config[':star-empty'] = get_template_directory_uri() . '/assets/img/star-empty.svg';
    $config[':star-error'] = get_template_directory_uri() . '/assets/img/star-error.svg';
    $config[':star-full'] = get_template_directory_uri() . '/assets/img/star-full.svg';
    $config[':star-half'] = get_template_directory_uri() . '/assets/img/star-half.svg';
    return $config;
});