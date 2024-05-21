<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skinjectables
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TQSJ3KD');</script>
<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQSJ3KD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'skinjectables' ); ?></a>

	<header id="masthead" class="site-header">
    <?php $promo_bar = get_field( 'promo_bar', 'option' ) ?>
    <div class="promo-bar text-center" style="background-color: <?php echo esc_attr( $promo_bar['promo_bar_background_color'] ) ?>;">
      <p><?php echo $promo_bar['promo_bar_text'] ?></p>
    </div>
    <div class="main-header py-2">
      <div class="site-branding">
			  <div class="logo">
          <a href="<?php echo esc_url( home_url() ) ?>">
            <img src="<?php echo esc_url ( the_field ( 'logo', 'option' ) ) ?>" alt="<?php bloginfo( ) ?>">
          </a>
        </div>
		  </div><!-- .site-branding -->

      <nav id="site-navigation" class="main-navigation">
        <button id="menu-toggler" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
          <span></span>
        </button>
        <div class="menu-container">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
          )
        );
        ?>
        </div>
      </nav><!-- #site-navigation -->
    </div>
    <?php if ( !is_front_page() ) : ?>
      <div class="quick-links d-none d-xl-block">
        <?php
          wp_nav_menu(
            array(
              'menu' => 4,
            )
          );
        ?>
      </div>
    <?php endif ?>
	</header><!-- #masthead -->