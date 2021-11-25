<?php /* Template Name: Liste */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<section class="border border-b-0 border-theme">
  <h1 class="page-title"><?php the_title(); ?></h1>
  <div class="text-lg">
    <?php html5wp_excerpt('html5wp_index'); ?>
  </div>
</section>
<?php
  $allPosts = get_posts(array(
    'numberposts' => 200,
    'post_type' => 'lesekiosk',
    'orderby' => 'title',
    'order' => 'ASC',
    'meta_query' => array(
      array(
          'key' => 'langLat',
          'value'   => array(''),
          'compare' => 'NOT IN'
      )
    )
  ));
  $groups = array();
  foreach($allPosts as $item) {
    $langLat = get_field('langLat', $item->ID);
    if ($langLat && $langLat['state']) {
      $state = $langLat['state'];
      $groups[$state] = array(
        'name' => $state,
        'items' => array()
      );
    }
  }
  $sortedGroups = wp_list_sort($groups, 'name', 'ASC');
  foreach($sortedGroups as $key => $group) {
    foreach($allPosts as $item) {
      $langLat = get_field('langLat', $item->ID);
      if ($langLat && $langLat['state'] && $langLat['state'] == $group['name']) {
        $sortedGroups[$key]['items'][] = $item;
      }
    }    
  }
?>
<div class="mb-4">
  <?php foreach($sortedGroups as $group): ?>
    <div class="border border-theme">
      <h2 class="text-center mb-0! h3"><?php echo $group['name'] ?></h2>
    </div>
    <section class="kiosk-item-grid">
      <?php foreach($group['items'] as $post): ?>
				<?php setup_postdata($post); ?>
        <?php get_template_part( 'content-lesekiosk' ); ?>
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
    </section>
  <?php endforeach; ?>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
