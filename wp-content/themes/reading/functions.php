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

/* Page Navigation */
function numeric_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php wp_pagenavi(); ?>

			<!--			--><?php //if ( get_next_posts_link() ) : ?>
			<!--			<div class="nav-previous">--><?php //next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) ); ?><!--</div>-->
			<!--			--><?php //endif; ?>
			<!---->
			<!--			--><?php //if ( get_previous_posts_link() ) : ?>
			<!--			<div class="nav-next">--><?php //previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?><!--</div>-->
			<!--			--><?php //endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}