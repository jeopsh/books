<?php

/**
 * Enqueue the Twenty Thirteen theme.
 */
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {

	$parent_style = 'parent-style'; // This is 'twentythirteen-style' for the Twenty Thirteen theme.

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);
}


//function new_excerpt_more($more) {
//	global $post;
//	return '… [<a href="'. get_permalink($post->ID) . '">阅读全文</a>]';
//}
//add_filter('twentythirteen_excerpt_more', 'new_excerpt_more');

//
//function excerpt_read_more_link($output) {
//    global $post;
//    $output = mb_substr($output,0, 200);
//    return $output . '<span><a href="'. get_permalink($post->ID).'">阅读全文...</a></span>';
//}
//add_action('the_excerpt', 'excerpt_read_more_link');