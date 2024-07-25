<?php
/*
Plugin Name: Demo Widget
Plugin URI: https://www.redoyit.com/demowidget
Description: Demo Widget
Version: 1.0
Author: Md. Redoy Islam
Author URI: https://redoyit.com
License: GPLv2 or later
Text Domain: demowidget
Domain Path: /languages/
*/

require_once plugin_dir_path(__FILE__)."widgets/class.demowidget.php";

function demowidget_load_textdomain() {
	load_plugin_textdomain( 'demowidget', false, plugin_dir_path( __FILE__ ) . "languages/" );
}

add_action( 'plugins_loaded', 'demowidget_load_textdomain' );


function demowidget_register(){
	register_widget('DemoWidget');
}
add_action('widgets_init','demowidget_register');



add_filter( 'gutenberg_use_widgets_block_editor', '__return_false');
add_filter( 'use_widgets_block_editor', '__return_false' );

function wpb_init_widgets($id) {
    register_sidebar(array(
        'name' => 'Main Sideber',
        'id'   => 'sidebar',
        'before_widget' => '<div class="sidebar-module">',
        'after_widget' => '</div>',
        'before_title' => '</h4>',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init','wpb_init_widgets');