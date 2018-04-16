<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
    <!-- If home page, remove the description, only the blog title -->
    <title><?php if(is_front_page()) echo get_bloginfo( 'name' ); else wp_title(' - ',true,'right'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".user-icon").hover(function() {
                $(".user-menu").css("display","block");
            }, function() {
                $(".user-menu").css("display","none");
            });
            $(".user-menu").hover(function() {
                $(this).css('display','block');
            }, function() {
                $(this).css('display','none')
            })
        });
    </script>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<div class="home-link">
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/Logo.png"><?php bloginfo( 'name' ); ?>
                        </a>
                    </h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></button>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
					<?php get_search_form(); ?>
                    <div class="user">
                        <div class="user-icon"></div>
                        <div class="user-menu">
                            <div class="user-info">
                                <a href="<?php echo home_url() . '/wp-admin/profile.php' ?>">
                                    <div class="user-img">
                                        <?php global $current_user; wp_get_current_user(); echo get_avatar( $current_user->ID, 64 ); ?>
                                    </div>
                                    <div class="user-name">
                                            <?php echo $current_user->display_name.'<br>'; echo $current_user->user_login; ?>
                                    </div>
                                </a>
                            </div>
                            <div class="user-action">
	                            <?php if ( is_user_logged_in() ) : ?>
		                            <?php if ( in_array('administrator', $current_user->roles)) : ?>
                                        <p><a href="<?php echo home_url() . '/wp-admin/post-new.php' ?>">写文章</a></p>
		                            <?php endif; ?>
                                    <p><a href="<?php echo wp_logout_url(home_url()); ?>">退出</a></p>
	                            <?php else : ?>
                                    <p><a href="<?php echo home_url() . '/wp-login.php' ?>">登录</a></p>
                                    <p><a href="<?php echo home_url() . '/wp-login.php?action=register' ?>">注册</a></p>
	                            <?php endif; ?>
                                <?php
/*                                    if ( is_user_logged_in() ) :
                                        if ( in_array('administrator', $current_user->roles)) :
                                            echo "写文章";
                                        endif;
                                        echo '退出';
                                    else :
                                        echo '登录';
                                        echo '注册';
                                    endif;
                                */?>
<!--                                <p>写文章</p>-->
<!--                                <p>注册</p>-->
<!--                                <p>登录</p>-->
<!--                                <p>退出</p>-->
                            </div>
                        </div>
                    </div>

				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->

		<div id="main" class="site-main">
