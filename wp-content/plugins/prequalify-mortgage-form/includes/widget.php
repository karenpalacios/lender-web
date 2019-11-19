<?php
class Mortgage_Step_Form_Widget extends WP_Widget {
    // class constructor
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'mortgage_step_form_widget',
            'description' => 'A plugin for Mortgage Lenders',
        );
        parent::__construct( 'mortgage_step_form_widget', 'Mortgage Pre-Qualification Step Form', $widget_ops );
    }
    
    // output the widget content on the front-end
    public function widget( $args, $instance ) {
        $images_path =  plugins_url('/dist/images/', __DIR__);
        include_once plugin_dir_path( __DIR__ )  . 'templates/form.php';
    }

    // output the option form field in admin Widgets screen
    public function form( $instance ) {


    }

    // save options
    public function update( $new_instance, $old_instance ) {

        
    }
}