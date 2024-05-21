<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Skinjectables
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found my-5 text-center">
			<header class="page-header">
				<h1 class="page-title pt-5"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'skinjectables' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'skinjectables' ); ?></p>
        <a href="<?php echo esc_url( get_home_url() ) ?>" class="text-primary text-decoration-none"><?php esc_html_e('Go to Home page', 'skinjectables') ?></a>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();