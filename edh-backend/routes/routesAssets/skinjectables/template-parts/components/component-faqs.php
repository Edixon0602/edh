<?php

/**
 * Content Component Template.
 */

$key  = $component['acf_fc_layout']; // content
$id   = str_replace('_', '-', $key) . '-' . random_string();

// Load fields
$faqs_items = $component["{$key}_items"];
$faqs_layout = $component["{$key}_layout"];
$faqs_margins = $component["{$key}_component_margin"];
?>

<!-- #<?php echo $id; ?> -->
<div id="<?php echo esc_attr( $id ); ?>" class="faqs <?php echo esc_attr( $faqs_layout ) ?>">
  <?php foreach ( $faqs_items as $i => $item ) : ?>
    <?php if ( 'faq' === $item['item_type'] ) : ?>
    <article id="item-<?php echo esc_attr ( $i ) ?>" class="faq p-5">
      <div class="card-title">
        <div class="content">
          <?php echo $item['item_title'] ?>
        </div>
        <i class="bi bi-plus-circle"></i>
      </div>
      <div class="card-content hidden">
        <?php echo $item['item_content'] ?>
      </div>
    </article>
    <?php elseif ( 'spacer' === $item['item_type'] ) : ?>
    <article id="item-<?php echo esc_attr ( $i ) ?>" class="spacer p-5">
    </article>
    <?php elseif ( 'image' === $item['item_type'] ) : ?>
    <article id="item-<?php echo esc_attr ( $i ) ?>" class="image p-5">
    </article>
    <?php endif ?>

    <style media="screen">
    <?php $border_radius = $item["border_radius"]; ?>
    #<?php echo esc_html( $id . ' ' . '#item-' . $i ) ?> {
      border-radius: <?php echo esc_html( $border_radius['top'] . 'px' . ' ' . $border_radius['right'] . 'px' . ' ' . $border_radius['bottom'] . 'px' . ' ' . $border_radius['left'] . 'px' . ' ' ) ?>;
    }
    <?php if ( 'faq' === $item['item_type'] ) : ?>
    #<?php echo esc_html( $id . ' ' . '#item-' . $i ) ?> {
      background-color: <?php echo esc_html( $item['background_color'] ) ?>;
      <?php if ( $item['background_image'] ) : ?>
      background-image: url(<?php echo esc_html( $item['background_image'] ) ?>);
      <?php if ( 'custom position' !== $item['background']['position'] ) : ?>
      background-position: <?php echo esc_html( $item['background']['position'] ) ?>;
      <?php elseif ( 'custom position' === $item['background']['position'] ) : ?>
      background-position: <?php echo esc_html( $item['background']['custom_position']['x_axis'] . 'px ' . $item['background']['custom_position']['y_axis'] . 'px' ) ?>;
      <?php endif ?>
      background-size: <?php echo esc_html( $item['background']['size'] ) ?>;
      background-repeat: <?php echo esc_html( $item['background']['repeat'] ) ?>;
      <?php endif ?>
      color: <?php echo esc_html( $item['text_color'] ) ?>;
    }
    <?php elseif ( 'spacer' === $item['item_type'] ) : ?>
    #<?php echo esc_html( $id . ' ' . '#item-' . $i ) ?> {
      background-color: <?php echo esc_html( $item['background_color'] ) ?>;
      min-height: <?php echo esc_html( $item['min_height'] . 'px' ) ?>;
    }
    <?php elseif ( 'image' === $item['item_type'] ) : ?>
    #<?php echo esc_html( $id . ' ' . '#item-' . $i ) ?> {
      background-image: url(<?php echo esc_html( $item['background_image'] ) ?>);
      min-height: <?php echo esc_html( $item['min_height'] . 'px' ) ?>;
    }
    <?php endif ?>
    </style>
  <?php endforeach ?>
</div>
<!-- /#<?php echo $id; ?> -->
<style media="screen">
  #<?php echo esc_html($id); ?> {
    margin-top: <?php echo esc_html( $faqs_margins['top'] . 'px' ) ?>;
    margin-right: <?php echo esc_html( $faqs_margins['right'] . 'px' ) ?>;
    margin-bottom: <?php echo esc_html( $faqs_margins['bottom'] . 'px' ) ?>;
    margin-left: <?php echo esc_html( $faqs_margins['left'] . 'px' ) ?>;
  }
</style>