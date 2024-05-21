<?php

/**
 * Buttons Component Template.
 */

$key  = $component['acf_fc_layout']; // content
$id   = str_replace('_', '-', $key) . '-' . random_string();
$button_id = 'button' . '-' . random_string();

// Load fields
$buttons = $component["{$key}_{$key}_buttons"];
$buttons_layout = $component["{$key}_{$key}_layout"];
$buttons_horizontal_alignment = $component["{$key}_{$key}_horizontal_alignment"];
$buttons_margins = $component["{$key}_component_margin"];
?>

<div id="<?php echo esc_attr( $id ) ?>" class="d-flex <?php echo esc_attr( $buttons_layout ); if ( 'flex-lg-row' === $buttons_layout ) : echo esc_attr( ' ' .  $buttons_horizontal_alignment ); endif; echo esc_attr( ' ' .  $component["{$key}_component_class"] ); ?>">
  <?php 
  foreach ( $buttons as $button ) :
  ?>
  <a href="<?php echo esc_url( $button['link']['url'] ) ?>" class="btn <?php echo esc_attr( $button['classes'] ) ?>" <?php if ( $button['link']['target'] ) : ?> target="_blank" <?php endif ?> id="<?php echo esc_attr( $button_id ) ?>">
    <?php echo esc_html( $button['link']['title'] ) ?>
  </a>

  <style media="screen">
    #<?php echo esc_html($button_id); ?> {
      background-color: <?php echo esc_html( $button['background_color'] ) ?>;
      <?php if ( $button['border_color'] ) : ?>border-color: <?php echo esc_html( $button['border_color'] ) ?>;<?php endif ?>
      <?php if ( $button['border_radius'] ) : ?>border-radius: <?php echo esc_html( $button['border_radius'] . 'px' ) ?>;<?php endif ?>
      color: <?php echo esc_html( $button['text_color'] ) ?>;
    }
  </style>
  <?php endforeach ?>
</div>

<style media="screen">
  #<?php echo esc_html($id); ?> {
    margin-top: <?php echo esc_html( $buttons_margins['top'] . 'px' ) ?>;
    margin-right: <?php echo esc_html( $buttons_margins['right'] . 'px' ) ?>;
    margin-bottom: <?php echo esc_html( $buttons_margins['bottom'] . 'px' ) ?>;
    margin-left: <?php echo esc_html( $buttons_margins['left'] . 'px' ) ?>;
  }
</style>