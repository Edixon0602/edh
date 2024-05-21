<?php

/**
 * Posts Grid Component Template.
 */

$key  = $component['acf_fc_layout']; // content
$id   = str_replace('_', '-', $key) . '-' . random_string();

// Load fields
if ( $component["{$key}_fixed_posts"] ) {
  $posts = $component["{$key}_posts"];
} else {
  $args = array (
    'numberposts' => $component["{$key}_pagination"],
  );
  $posts = get_posts( $args );
}
if ( isset( $_GET['search'] ) ) {
  $args = array (
    's' => $_GET['search'],
    'numberposts' => -1,
  );
  $posts = get_posts( $args );
}
?>

<!-- #<?php echo $id; ?> -->
<div class="posts-grid-container" id="<?php echo esc_attr( $id ) ?>" data-offset="<?php echo esc_attr( $component["{$key}_pagination"] ) ?>">
  <?php if ( $component["{$key}_search"] ) : ?>
  <div class="search mb-5 px-4 px-md-0">
    <form action="">
      <label for="search">Search</label>
      <input type="search" name="search" id="search-posts" <?php if ( isset( $_GET['search'] ) ) : ?> value="<?php echo esc_attr( $_GET['search'] ) ?>" <?php endif ?>>
      <button type="submit"><i class="bi bi-search"></i></button>
    </form>
    <?php if ( isset( $_GET['search'] ) ) : ?>
      <p class="mt-4 text-secondary text-center"><strong><?php echo esc_html( count( $posts ) ) ?> resources</strong> matched your search term</p>
    <?php endif ?>
  </div>
  <?php endif ?>
  <div class="row">
    <?php foreach ( $posts as $post ) : ?>
      <article class="item my-4 col-xl-4">
        <div class="thumbnail">
          <a href="<?php echo esc_url( get_permalink( $post->ID ) ) ?>">
            <img src="<?php echo esc_attr( get_the_post_thumbnail_url( $post->ID ) ) ?>" alt="<?php echo esc_attr( $post->post_title ) ?>">
          </a>
        </div>
        <div class="content mt-4">
          <h4 class="title mb-3"><?php echo esc_html( $post->post_title ) ?></h4>
          <p class="excerpt"><?php echo esc_html( $post->post_excerpt ) ?></p>
          <a href="<?php echo esc_url( get_permalink( $post->ID ) ) ?>" class="read-more">Read More</a>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
  <?php if ( !$component["{$key}_fixed_posts"] && !isset( $_GET['search'] ) ) : ?>
  <div class="load-more">
    <div class="divider">
      <div class="line"></div>
      <img src="/wp-content/uploads/2022/06/before-load-more-icon.png" class="img-fluid mx-4">
      <div class="line"></div>
    </div>
    <p class="mt-4"><a href="#" class="load-more-btn">Load More</a></p>
  </div>
  <?php endif ?>
  <?php if ( isset( $_GET['search'] ) ) : ?>
  <div class="go-back">
    <div class="divider">
      <div class="line"></div>
      <img src="/wp-content/uploads/2022/06/before-load-more-icon.png" class="img-fluid mx-4">
      <div class="line"></div>
    </div>
    <p class="mt-4"><a href="/resources" class="go-back-btn">Go back</a></p>
  </div>
  <?php endif ?>
</div>
<!-- /#<?php echo $id; ?> -->