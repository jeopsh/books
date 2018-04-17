<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php
    $num_post = 7;  // Number of page display and category name

    function home_page_post_display($category, $num_post) {
//        query_posts( array( 'category_name'  => $category, 'posts_per_page' => $num_post ) );

	    query_posts('category_name=' . $category . ', &showposts=' . $num_post);
//	    $wp_query->is_archive = true; $wp_query->is_home = false;

		if ( have_posts() ) :
			/* The loop */
			while ( have_posts() ) :  the_post() ;
				get_template_part( 'content', get_post_format() );
			endwhile; wp_reset_query();
		else :
			get_template_part( 'content', 'none' );
		endif;
    }
?>

<div class="home">
    <div class="left">
        <!-- Recommend -->
        <div>
            <h3 class="category-title"><a href="<?php echo home_url().'/category/recommend/' ?>">图书推荐</a></h3>
            <?php home_page_post_display('recommend', $num_post) ?>
        </div>

        <!-- Daily -->
        <div>
            <h3 class="category-title"><a href="<?php echo home_url().'/category/daily/' ?>">每日一文</a></h3>
    		<?php home_page_post_display('daily', $num_post) ?>
        </div>
    </div>

    <div class="right">
        <!-- Poem -->
        <div>
            <h3 class="category-title" id="right-top"><a href="<?php echo home_url().'/category/discuss/' ?>">漫谈读书</a></h3>
            <?php home_page_post_display('discuss', $num_post) ?>
        </div>

        <!-- Discuss -->
        <div>
            <h3 class="category-title"><a href="<?php echo home_url().'/category/poem/' ?>">诗词经典</a></h3>
            <?php home_page_post_display('poem', $num_post) ?>
        </div>
    </div>
</div>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
