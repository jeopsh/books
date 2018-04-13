<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Twenty Minutes
 */
?>
<div id="footer-wrapper">
    	<div class="container">
          <p><?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'twenty-minutes');?></p>
          <p><a href="<?php echo esc_url( __( 'https://zylothemes.com/', 'twenty-minutes' ) ); ?>"><?php printf( __( 'Powered by %s', 'twenty-minutes' ), 'WordPress' ); ?></a></p>
        </div><!--end .container-->
    </div><!--end .footer-wrapper-->
<?php wp_footer(); ?>
</body>
</html>