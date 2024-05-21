<?php

/**
 * Single Image Component Template.
 */

$key  = $component['acf_fc_layout']; // content
$id   = str_replace('_', '-', $key) . '-' . random_string();

// Load fields
$source = $component["{$key}_source"];
$single_image_margins = $component["{$key}_component_margin"];
?>

<!-- #<?php echo $id; ?> -->
<div class="d-flex <?php echo esc_attr( $component["{$key}_alignment"] ) ?>">
  <?php if ( $component["{$key}_image_link"] ) : ?>
  <a href="<?php echo esc_url( $component["{$key}_image_link"]['url'] ) ?>" <?php if ( $component["{$key}_image_link"]['target'] ) : ?>target="<?php echo esc_attr( $component["{$key}_image_link"]['target'] ) ?>" <?php endif ?>>
  <?php endif ?>
  <img src="<?php echo esc_url( $source['url'] ) ?>" alt="<?php echo esc_attr( $source['title'] ) ?>" class="img-fluid <?php if ( $component["{$key}_classes"] ) : echo esc_attr( $component["{$key}_classes"] ); endif ?> " id="<?php echo esc_attr( $id ) ?>">
  <?php if ( $component["{$key}_image_link"] ) : ?>
  </a>
  <?php endif ?>
</div>
<!-- /#<?php echo $id; ?> -->

<style media="screen">
  #<?php echo esc_html($id); ?> {
    margin-top: <?php echo esc_html( $single_image_margins['top'] . 'px' ) ?>;
    margin-right: <?php echo esc_html( $single_image_margins['right'] . 'px' ) ?>;
    margin-bottom: <?php echo esc_html( $single_image_margins['bottom'] . 'px' ) ?>;
    margin-left: <?php echo esc_html( $single_image_margins['left'] . 'px' ) ?>;
  }
</style>