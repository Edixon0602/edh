<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skinjectables
 */

?>

	<footer id="colophon" class="site-footer">
      <div class="row">
      <?php if ( is_active_sidebar('footer-1') ) : ?>
        <div class="col-12 col-xl-3">
          <div class="widget-area">
            <?php dynamic_sidebar( 'footer-1' ); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ( is_active_sidebar('footer-2') ) : ?>
        <div class="col-12 col-xl-3">
          <div class="widget-area">
            <?php dynamic_sidebar( 'footer-2' ); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ( is_active_sidebar('footer-3') ) : ?>
        <div class="col-12 col-xl-6">
          <div class="widget-area">
            <?php dynamic_sidebar( 'footer-3' ); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ( is_active_sidebar('footer-4') ) : ?>
        <div class="col-12 mobile-footer">
          <div class="widget-area">
            <?php dynamic_sidebar( 'footer-4' ); ?>
          </div>
        </div>
      <?php endif; ?>
      </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>