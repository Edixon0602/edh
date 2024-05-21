<?php

/**
 * Carousel Component Template.
 */

$key  = $component['acf_fc_layout']; // content
$id   = str_replace('_', '-', $key) . '-' . random_string();

// Load fields
$slides = $component["{$key}_slides"];
?>

<!-- #<?php echo $id; ?> -->
<div id="<?php echo esc_attr( $id ) ?>" class="carousel slide" data-bs-ride="carousel">
  <?php if ( $component["{$key}_controls"]["dots"] ) : ?>
    <div class="carousel-indicators">
      <?php foreach ( $slides as $i => $slide ) : ?>
        <button type="button" data-bs-target="#<?php echo esc_attr( $id ) ?>" data-bs-slide-to="<?php echo esc_attr( $i ) ?>" <?php if ( $i === 0 ) : ?>class="active" aria-current="true" <?php endif ?> aria-label="Slide <?php echo esc_attr( $i + 1 ) ?>"></button>
      <?php endforeach ?>
    </div>
  <?php endif ?>
  <div class="carousel-inner py-5">
    <?php foreach ( $slides as $i => $slide ) : ?>
      <div class="carousel-item <?php if ( $i === 0 ) : ?>active<?php endif ?>">
        <?php echo $slide['content'] ?>
      </div>
    <?php endforeach ?>
  </div>
  <?php if ( $component["{$key}_controls"]["arrows"] ) : ?>
    <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo esc_attr( $id ) ?>" data-bs-slide="prev">
      <i class="bi bi-arrow-left-circle"></i>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#<?php echo esc_attr( $id ) ?>" data-bs-slide="next">
      <i class="bi bi-arrow-right-circle"></i>
      <span class="visually-hidden">Next</span>
    </button>
  <?php endif ?>
  
</div>
<!-- /#<?php echo $id; ?> -->