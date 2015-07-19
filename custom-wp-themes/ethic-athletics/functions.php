<?php 

function custom_setup() {
	add_theme_support( 'post-thumbnails');
	add_theme_support( 'menus');
	add_theme_support( 'widgets');
	add_theme_support( 'html5');
}
add_action( 'after_setup_theme', 'custom_setup' );

   
 /**
 * Enqueue scripts
 */
	


	function ethic_athletics_scripts() {

		wp_enqueue_script( 'custom-js',  get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), false, true);
		wp_enqueue_script( 'bootstrap-js',  get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), false, true);


		wp_enqueue_style( 'bootstrap-css',  get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style( 'main-styles',  get_template_directory_uri() . '/style.css');	
		wp_enqueue_style( 'animate-css',  get_template_directory_uri() . '/css/animate.css');
		wp_enqueue_style( 'font-awesome-css',  get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');

	}

	add_action( 'wp_enqueue_scripts', 'ethic_athletics_scripts' );


function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );