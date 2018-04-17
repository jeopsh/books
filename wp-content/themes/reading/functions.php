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

/**
 * Page Navigation
 */
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

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/**
 * Include Custom JavaScript
 */
add_action('wp_enqueue_scripts', 'load_my_scripts');

function load_my_scripts(){
	wp_enqueue_script('jquery');

	wp_enqueue_script('my_second_script', get_stylesheet_directory_uri() . '/js/main.js');
}


/**
 * Redirect Login To Home Page
 */
function my_login_redirect($redirect_to, $request){
	if( empty( $redirect_to ) || $redirect_to == 'wp-admin/' || $redirect_to == admin_url() )
		return home_url("/wp-admin/edit.php");
	else
		return $redirect_to = home_url();
}
add_filter("login_redirect", "my_login_redirect", 10, 3);


/**
 * Custom Login Page
 */

// Login Logo
function custom_login_logo() {
	echo '<style type="text/css">
        .login h1 a {
            background-image:url("' . get_stylesheet_directory_uri() . '/images/Logo-Login.png") !important;
        }
    </style>';
}
add_action('login_head', 'custom_login_logo');

// Login Logo URL
function custom_loginlogo_url($url) {
	return get_bloginfo('url'); //修改URL地址
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );

//Login Logo Description
function custom_loginlogo_desc($url) {
	return '新语图书'; //修改文本信息
}
add_filter( 'login_headertitle', 'custom_loginlogo_desc' );


///* function to add classes to active menu entries */
//function add_active_class_to_custom_posts($classes = array(), $menu_item = false){
//	global $wp_query;
//	$post_name = $menu_item->post_name;
//	$post_type = get_post_type();
//
//	/* Highlight the current menu item if the category-parent of the current posts' category equals to the menu name.
//	 * This is usually the case when you set a category as custom menu item and use wp_nav_menu() to display that */
//	$query_var = get_query_var('cat');
//	if ($query_var) {
//		$current_category = get_category($query_var);
//		$root_categoryObj = get_category($current_category->parent, false);
//		$root_categoryName = strtolower(($root_categoryObj->name));
//		if (strcasecmp($post_name, $root_categoryName) == 0) $classes[] = 'current-menu-item';
//	}
//
//	/* assign 'current-menu-item' to regular posts; that's the default behaviour we just copy here */
//	if(in_array('current-menu-item', $menu_item->classes)){
//		$classes[] = 'current-menu-item';
//	}
//	else {
//		/* assign the 'current-menu-item' class to all custom posts */
//		if ($post_name == $post_type) {
//			$classes[] = 'current-menu-item';
//		}
//	}
//	return $classes;
//}
//add_filter( 'nav_menu_css_class', 'add_active_class_to_custom_posts', 10, 2 );


/**
 * Current Category Nav For Single Page
 */
function single_nav_category($classes, $item) {
	if (
		is_single()
		&& 'category' === $item->object
		&& in_array( $item->object_id, wp_get_post_categories( $GLOBALS['post']->ID ) )
	) {
		$classes[] = 'current-menu-item';
	}

	return $classes;
}
add_filter('nav_menu_css_class', 'single_nav_category', 10, 2);


///**
// * Custom The Back End User List Page
// */
//add_filter('manage_users_columns', 'add_user_nickname_column');
//function add_user_nickname_column($columns) {
//	$columns['user_nickname'] = '昵称';
//	unset($columns['name']);
//	return $columns;
//}
//
//add_action('manage_users_custom_column',  'show_user_nickname_column_content', 20, 3);
//function show_user_nickname_column_content($value, $column_name, $user_id) {
//	$user = get_userdata( $user_id );
//	$user_nickname = $user->nickname;
//	if ( 'user_nickname' == $column_name )
//		return $user_nickname;
//	return $value;
//}


/**
 * Custom The Back End User Info Edit Page
 */
//add_action('show_user_profile','wpjam_edit_user_profile');
//add_action('edit_user_profile','wpjam_edit_user_profile');
//function wpjam_edit_user_profile($user){
//	?>
<!--    <script>-->
<!--        jQuery(document).ready(function($) {-->
<!--            $('#first_name').parent().parent().hide();-->
<!--            $('#last_name').parent().parent().hide();-->
<!--            $('#display_name').parent().parent().hide();-->
<!--            $('.show-admin-bar').hide();-->
<!--        });-->
<!--    </script>-->
<!--	--><?php
//}
//
//// Focused On User Nickname
//add_action('personal_options_update','wpjam_edit_user_profile_update');
//add_action('edit_user_profile_update','wpjam_edit_user_profile_update');
//function wpjam_edit_user_profile_update($user_id){
//	if (!current_user_can('edit_user', $user_id))
//		return false;
//	$user = get_userdata($user_id);
//	$_POST['nickname'] = ($_POST['nickname'])?:$user->user_login;
//	$_POST['display_name']	= $_POST['nickname'];
//	$_POST['first_name']	= '';
//	$_POST['last_name']		= '';
//}


/**
 * Temp Change Site's Domain
 */
//update_option('siteurl','http://localhost/books');
//update_option('home','http://localhost/books');



