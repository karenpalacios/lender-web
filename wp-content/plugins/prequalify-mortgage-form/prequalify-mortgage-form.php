<?php
/*
Plugin Name: Mortgage Pre-Qualification Step Form
Plugin URI: http://axialmotion.com
Description: Mortgage Pre-Qualification Step Form 
Author: Karen Palacios
Version: 1.0
Author URI: http://karenpalacios.com/
*/

require_once __DIR__.'/includes/widget.php';


function pmf_proccess_form() {

    $values = array();
    parse_str($_POST['values'], $values);
    
    foreach( $values as $key => $value ) {
        $values[$key] = urldecode($value);
    }

    $content = '';

    $content.= '\nMortgage Type: ' . $values['loan_type'];
    $content.= '\nProperty Type: ' . $values['property_type'];
    $content.= '\nBudget: ' . $values['amount'];
    $content.= '\nCredit Score: ' . $values['credit_score'];

    $content.= '\nName: ' . $values['client_name'];
    $content.= '\nPhone: ' . $values['client_phone'];
    $content.= '\nEmail: ' . $values['client_email'];

    $headers = 'From:'.$email. "rn";
    $admin_email = get_option('admin_email');
    $subject = 'New Pre-Qualification Contact';
    

    if(wp_mail($admin_email, $subject, $content, $headers)) {
        $results = "Thanks for you mail.";
    } else {
        $results = "The mail could not be sent.";
    }
}

function wpb_load_widget() {
    register_widget( 'Mortgage_Step_Form_Widget' );
}

function add_css_files() {
    wp_enqueue_style('pmf_css_steps', plugins_url('/dist/styles/jquery.steps.css',__FILE__)); 
    wp_enqueue_style('pmf_css_main', plugins_url('/dist/styles/main.css',__FILE__));
}

function add_js_files() {
    wp_enqueue_script('pmf_js_steps', plugins_url('/dist/libraries/jquery.steps.min.js',__FILE__), array('jquery'), '1.9.0');
    wp_enqueue_script('pmf_js_ui', plugins_url('/dist/libraries/jquery-ui.min.js',__FILE__), array('jquery'), '1.1.0');
    wp_enqueue_script('pmf_js_main', plugins_url('/dist/scripts/main.js',__FILE__) );
    wp_localize_script('pmf_js_main', 'pmf_proccess_form', array( 'ajax_url' => admin_url('admin-ajax.php'), 'check_nonce' => wp_create_nonce('pmf-nonce')) );
}

add_action('widgets_init', 'wpb_load_widget');
add_action('wp_enqueue_scripts', 'add_css_files');
add_action('wp_enqueue_scripts', 'add_js_files');
add_action('wp_ajax_nopriv_pmf_proccess_form', 'pmf_proccess_form' );
add_action('wp_ajax_pmf_proccess_form', 'pmf_proccess_form' );
