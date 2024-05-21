<?php

/**
 * Content Component Template.
 */

$key  = $component['acf_fc_layout']; // content
$id   = str_replace('_', '-', $key) . '-' . random_string();

// Load fields
$editor = $component["{$key}_{$key}_editor"];
$content_margins = $component["{$key}_component_margin"];
?>

<!-- #<?php echo $id; ?> -->
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $key . ' ' . $component["{$key}_component_class"] ); ?>">
  <?php echo $editor; ?>
</div>
<!-- /#<?php echo $id; ?> -->

<style media="screen">
  #<?php echo esc_html($id); ?> {
    margin-top: <?php echo esc_html( $content_margins['top'] . 'px' ) ?>;
    margin-right: <?php echo esc_html( $content_margins['right'] . 'px' ) ?>;
    margin-bottom: <?php echo esc_html( $content_margins['bottom'] . 'px' ) ?>;
    margin-left: <?php echo esc_html( $content_margins['left'] . 'px' ) ?>;
  }
</style>