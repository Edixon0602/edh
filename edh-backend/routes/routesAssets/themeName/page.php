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

get_header();
while ( have_posts() ) : the_post(); ?>
  <!-- #page -->
    <!-- #page-content -->
    <div id="page-content">
    
      <?php
      $sections = get_field( 'page_content' ) ? get_field( 'page_content' ) : [];
      foreach ( $sections as $section ) :
        $sid = $section['section_id'] ? $section['section_id'] : 'section-' . random_string();
        $background = $section['background'];
        $margins = $section['margin'];
        $paddings = $section['padding'];
        $width = $section['full_width'] ? 'container-fluid' : 'container';
      ?>
        <section id="<?php echo esc_html( $sid ) ?>" class="section <?php echo esc_attr( $section['columns_horizontal_alignment'] . ' ' . $section['columns_vertical_alignment'] . ' ' . $section['section_class'] ) ?>">
			<?php if ( $background['video'] ) : ?>
        <video autoplay muted loop class="bg-video">
          <source src="<?php echo esc_attr( $background['video'] ) ?>" type="video/mp4">
        </video>
        <?php endif; ?>
        <div class="row position-relative <?php echo esc_attr( $width . ' ' . $section['columns_horizontal_alignment'] . ' ' . $section['columns_vertical_alignment'] ); if ($section['invert_columns_mobile']) : ?> mobile-col-reverse<?php endif ?>">
              <?php 
              $section['section'] = $section['section'] ? $section['section'] : [];
              foreach ( $section['section'] as $column ) : ?>
                <div class="col-xl-<?php echo esc_attr( $column['column_size'] . ' ' . $column['column_class'] ) ?>">
                  <?php 
                  $components = $column['column'] ? $column['column'] : [];
                  foreach ( $components as $component ) :
                    include( locate_template( 'template-parts/components/component-' . $component['acf_fc_layout'] . '.php', false, false ) );
                  endforeach; ?>
                </div>
              <?php endforeach;
              ?>
            </div>
        </section>

        <style media="screen">
        #<?php echo esc_html($sid); ?> {
          <?php if ( $background['color'] ) : ?> background-color: <?php echo esc_html( $background['color'] ) ?>; <?php endif ?>
          <?php if ( $background['image'] ) : ?>
          background-image: url(<?php echo esc_html( $background['image'] ) ?>);
          background-position: <?php echo esc_html( $background['position'] ) ?>;
          background-size: <?php echo esc_html( $background['size'] ) ?>;
          background-repeat: <?php echo esc_html( $background['repeat'] ) ?>;
          <?php endif ?>
          margin-top: <?php echo esc_html( $margins['top'] . 'px' ) ?>;
          margin-right: <?php echo esc_html( $margins['right'] . 'px' ) ?>;
          margin-bottom: <?php echo esc_html( $margins['bottom'] . 'px' ) ?>;
          margin-left: <?php echo esc_html( $margins['left'] . 'px' ) ?>;
          padding-top: <?php echo esc_html( $paddings['top'] . 'px' ) ?>;
          padding-right: <?php echo esc_html( $paddings['right'] . 'px' ) ?>;
          padding-bottom: <?php echo esc_html( $paddings['bottom'] . 'px' ) ?>;
          padding-left: <?php echo esc_html( $paddings['left'] . 'px' ) ?>;
        }
      </style>
      <?php endforeach; ?>
    </div>
    <!-- /#page-content -->

  </section>
  <!-- /#page -->

<?php
endwhile;

get_footer();