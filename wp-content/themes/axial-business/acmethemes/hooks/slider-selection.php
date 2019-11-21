<?php
/**
 * Display default slider
 *
 * @since Axial Business 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('construction_field_default_slider') ) :
    function construction_field_default_slider(){
        global $construction_field_customizer_all_values;
        $bg_image_style = '';
        if ( get_header_image() ) :
            $bg_image_style .= 'background-image:url(' . esc_url( get_header_image() ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
        else:
            $bg_image_style .= 'background-image:url(' . esc_url( get_template_directory_uri()."/assets/img/default-image.jpg" ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
        endif; // End header image check.

        $text_align = 'text-left';
        $animation1 = 'init-animate';
        $animation2 = 'init-animate';
        ?>
        <div class="image-slider-wrapper home-fullscreen ">
            <div class="featured-slider">
                <div class="item" style="<?php echo $bg_image_style; ?>">
                    <div class="slider-content <?php echo $text_align;?>">
                        <div class="container">
                            <div class="banner-title <?php echo $animation1;?>">
                                <?php esc_html_e('Axial Business','construction-field' );?>
                            </div>
                            <div class="image-slider-caption <?php echo $animation2;?>">
                                <?php esc_html_e('Building the World Together','construction-field' );?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
endif;

function construction_field_slider_from_page(){
    
    global $construction_field_customizer_all_values;

?>
            <div class="image-slider-wrapper home-fullscreen full-screen-bg">
                <div class="featured-slider slick-initialized slick-slider" style="display: block;">
                    <div class="slick-list draggable" style="height: 379px;">
                        <div class="slick-track" style="width: 100%">
                            <div class="static-image item slick-slide slick-current slick-active">
                                <div class="slider-content text-left">
                                    <?php the_widget( 'Mortgage_Step_Form_Widget' ); ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $construction_field_feature_info_display_options = $construction_field_customizer_all_values['construction-field-feature-info-display-options'];
                if( 'absolute' == $construction_field_feature_info_display_options ){
                    echo "<div class='container primary-bg at-absolute-feature-icon'>";
                    do_action( 'construction_field_action_feature_info' );
                    echo "</div>";
                }
                ?>           
            </div>
<?php
}

/**
 * Featured Slider display
 *
 * @since Axial Business 1.0.0
 *
 * @param null
 * @return void
 */

if ( ! function_exists( 'construction_field_feature_slider' ) ) :

    function construction_field_feature_slider( ){
	    construction_field_slider_from_page();
    }
endif;
add_action( 'construction_field_action_feature_slider', 'construction_field_feature_slider', 0 );