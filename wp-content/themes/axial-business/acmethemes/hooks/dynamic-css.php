<?php
/**
 * Dynamic css
 * @since Axial Business 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'construction_field_dynamic_css' ) ) :

    function construction_field_dynamic_css() {

        global $construction_field_customizer_all_values;
        /*Color options */
        $construction_field_header_height = esc_attr( $construction_field_customizer_all_values['construction-field-header-height'] );
        $construction_field_primary_color = esc_attr( $construction_field_customizer_all_values['construction-field-primary-color'] );
        $construction_field_header_top_bg_color = esc_attr( $construction_field_customizer_all_values['construction-field-header-top-bg-color'] );
        $construction_field_footer_bg_color = esc_attr( $construction_field_customizer_all_values['construction-field-footer-bg-color'] );
        $construction_field_footer_bottom_bg_color = esc_attr( $construction_field_customizer_all_values['construction-field-footer-bottom-bg-color'] );

        /*animation*/
        $construction_field_enable_animation = $construction_field_customizer_all_values['construction-field-enable-animation'];

	    $custom_css = '';

        /*animation*/
        if( 1 == $construction_field_enable_animation ){
            $custom_css .= "
             .init-animate {
                visibility: visible !important;
             }
             ";
        }
        /*background*/
	    $construction_field_header_image_display = esc_attr( $construction_field_customizer_all_values['construction-field-header-image-display'] );
	    if( 'bg-image' == $construction_field_header_image_display || 'hide' == $construction_field_header_image_display ){
		    $bg_image_url ='';
		    if( get_header_image() && 'bg-image' == $construction_field_header_image_display ){
			    $bg_image_url = esc_url( get_header_image() );
		    }
		    $custom_css .= "
              .inner-main-title {
                background-image:url('{$bg_image_url}');
                background-repeat:no-repeat;
                background-size:cover;
                background-attachment:fixed;
                background-position: center; 
                height: {$construction_field_header_height}px;
            }";
	    }

        /*color*/
        $custom_css .= "
            .top-header{
                background-color: {$construction_field_header_top_bg_color};
            }";
        $custom_css .= "
            .site-footer{
                background-color: {$construction_field_footer_bg_color};
            }";
        $custom_css .= "
            .copy-right{
                background-color: {$construction_field_footer_bottom_bg_color};
            }";
        $custom_css .= "
        .site-title,
	        .site-title a,
	        .site-description,
	        .site-description a,
            a:hover,
            a:active,
            a:focus,
            .widget li a:hover,
            .posted-on a:hover,
            .author.vcard a:hover,
            .cat-links a:hover,
            .comments-link a:hover,
            .edit-link a:hover,
            .tags-links a:hover,
            .byline a:hover,
            .main-navigation .acme-normal-page .current_page_item a,
            .main-navigation .acme-normal-page .current-menu-item a,
            .main-navigation .acme-normal-page .current_page_parent a,
            .main-navigation .active a,
            .main-navigation .navbar-nav >li a:hover,
            .news-notice-content .news-content a:hover,
			 .at-social .socials li a,
			 .primary-color,
			 article.post .entry-header .cat-links a,
			 #construction-field-breadcrumbs a:hover,
			i.slick-arrow:hover,
			.single-item .fa{
                color: {$construction_field_primary_color};
            }";

        /*background color*/
        $custom_css .= "
            .navbar .navbar-toggle:hover,
            .main-navigation .current_page_ancestor > a:before,
            .comment-form .form-submit input,
            .btn-primary,
            .wpcf7-form input.wpcf7-submit,
            .wpcf7-form input.wpcf7-submit:hover,
            .sm-up-container,
            .btn-primary.btn-reverse:before,
            #at-shortcode-bootstrap-modal .modal-header,
            .primary-bg,
            .schedule-title-wrapper .schedule-title.active a,
			.schedule-title-wrapper .schedule-title.active a i,
			.schedule-title-wrapper .schedule-title:hover a,
			.navigation.pagination .nav-links .page-numbers.current,
			.navigation.pagination .nav-links a.page-numbers:hover,
			 .navbar .cart-wrap .acme-cart-views a span,
			 .acme-gallery .read-more{
                background-color: {$construction_field_primary_color};
                color:#fff;
            }";

       $custom_css .= "
            .blog article.sticky{
                border-bottom: 2px solid {$construction_field_primary_color};
            }";
	    
        wp_add_inline_style( 'construction-field-style', $custom_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'construction_field_dynamic_css', 99 );