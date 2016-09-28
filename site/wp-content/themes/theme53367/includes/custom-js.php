<?php
	/**
	 * How to enqueue script?
	 *
	 *  http://codex.wordpress.org/Function_Reference/wp_enqueue_script
	 */
	add_action( 'wp_enqueue_scripts', 'cherry_child_custom_scripts' );
	function cherry_child_custom_scripts() {
		wp_enqueue_script( 'mousewheel', get_stylesheet_directory_uri() . '/js/jquery.mousewheel-3.0.4.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'cv_script', CHILD_URL . '/js/cv_script.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'chart-min', get_stylesheet_directory_uri() . '/js/chart.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'scroll-showtime', get_stylesheet_directory_uri() . '/js/scrollShowTime.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'themeScripts', CHILD_URL . '/js/themeScripts.js', array( 'jquery' ), '1.0', true ); 
	}
 ?>