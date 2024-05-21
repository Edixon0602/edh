<?php

/**
 * Tabs Component Template.
 */

$key  = $component['acf_fc_layout']; // content
$tid   = str_replace('_', '-', $key) . '-' . random_string();

// Load fields
$tabs = $component["{$key}_tabs"];
$tabs_layout = $component["{$key}_layout"];
$tabs_margins = $component["{$key}_component_margin"];
?>

<!-- #<?php echo $tid; ?> -->
<?php if ( 'vertical' === $tabs_layout ) : ?>
<div class="vertical-tabs" id="<?php echo esc_attr( $tid ) ?>">
  <ul class="nav nav-pills flex-column flex-xl-row justify-content-center align-items-center mb-3 mx-0" role="tablist">
    <?php foreach ( $tabs as $i => $tab ) : ?>
      <li class="nav-item mx-3 mb-3 mb-xl-0" role="presentation">
        <button class="nav-link<?php if ( $i === 0 ) : ?> active<?php endif ?>" id="pills-<?php echo esc_attr( $tid . '-' .  $i ) ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo esc_attr( $tid . '-' .  $i ) ?>" type="button" role="tab" aria-controls="pills-<?php echo esc_attr( $tid . '-' .  $i ) ?>" <?php if ( $i === 0 ) : ?>aria-selected="true"<?php endif ?>><?php echo esc_html( $tab['tab_title'] ) ?></button>
      </li>
    <?php endforeach ?>
  </ul>
  <div class="tab-content">
    <?php foreach ( $tabs as $i => $tab ) : ?>
      <div class="tab-pane <?php if ( $i === 0 ) : ?>fade show active<?php endif ?>" id="pills-<?php echo esc_attr( $tid . '-' .  $i ) ?>" role="tabpanel" aria-labelledby="pills-<?php echo esc_attr( $tid . '-' .  $i ) ?>-tab">
        <?php 
        $components = $tab['content'] ? $tab['content'] : [];
        foreach ( $components as $component ) :
          include( locate_template( 'template-parts/components/component-' . $component['acf_fc_layout'] . '.php', false, false ) );
        endforeach;  
        ?>
      </div>
    <?php endforeach ?>
  </div>
</div>

<?php elseif ( 'horizontal' === $tabs_layout ) : ?>
<div class="horizontal-tabs px-4 px-xl-0" id="<?php echo esc_attr( $tid ) ?>">
  <div class="d-flex flex-wrap flex-xl-nowrap">
    <div class="nav flex-column nav-pills me-3" role="tablist" aria-orientation="vertical">
    <?php foreach ( $tabs as $i => $tab ) : ?>
      <button class="nav-link mb-3<?php if ( $i === 0 ) : ?> active<?php endif ?>" id="pills-<?php echo esc_attr( $tid . '-' .  $i ) ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo esc_attr( $tid . '-' .  $i ) ?>" type="button" role="tab" aria-controls="pills-<?php echo esc_attr( $tid . '-' .  $i ) ?>" <?php if ( $i === 0 ) : ?>aria-selected="true"<?php endif ?>><?php echo esc_html( $tab['tab_title'] ) ?></button>
    <?php endforeach ?>
    </div>
    <div class="tab-content p-0 p-xl-5 d-flex align-items-center justify-content-center">
    <?php foreach ( $tabs as $i => $tab ) : ?>
      <div class="tab-pane <?php if ( $i === 0 ) : ?>fade show active<?php endif ?>" id="pills-<?php echo esc_attr( $tid . '-' .  $i ) ?>" role="tabpanel" aria-labelledby="pills-<?php echo esc_attr( $tid . '-' .  $i ) ?>-tab">
        <?php 
        $components = $tab['content'] ? $tab['content'] : [];
        foreach ( $components as $component ) :
          include( locate_template( 'template-parts/components/component-' . $component['acf_fc_layout'] . '.php', false, false ) );
        endforeach;  
        ?>
      </div>
    <?php endforeach ?>
    </div>
  </div>
</div>
<?php endif ?>
<!-- /#<?php echo $tid; ?> -->

<style media="screen">
  #<?php echo esc_html($tid); ?> {
    margin-top: <?php echo esc_html( $tabs_margins['top'] . 'px' ) ?>;
    margin-right: <?php echo esc_html( $tabs_margins['right'] . 'px' ) ?>;
    margin-bottom: <?php echo esc_html( $tabs_margins['bottom'] . 'px' ) ?>;
    margin-left: <?php echo esc_html( $tabs_margins['left'] . 'px' ) ?>;
  }
</style>