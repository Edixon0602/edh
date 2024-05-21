<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skinjectables
 */
$section['section'] = $section['section'] ? $section['section'] : [];
foreach ( $section['section'] as $column ) : ?>
  <div class="col-xl-<?php echo esc_attr( $column['column_size'] . ' ' . $column['column_class'] ) ?>">
    <?php 
    $components = $column['column'] ? $column['column'] : [];
    foreach ( $components as $component ) :
      include( locate_template( 'template-parts/components/component-' . $component['acf_fc_layout'] . '.php', false, false ) );
    endforeach; ?>
  </div>
<?php endforeach ?>