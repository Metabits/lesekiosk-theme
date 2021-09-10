<?php /* Template Name: Forside */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<section class="border border-theme">
    <h1 class="mb-2"><?php the_title(); ?></h1>
    <div class="wp-content text-lg">
      <?php if ( has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('large', array('class' => 'w-full h-auto block mb-4')); ?>
      <?php endif; ?>
      <?php the_content(); ?>
    </div>
  </section>
  <div class="border border-t-0 border-theme">
    <h2 class="text-center mb-0! h3"><?php the_field('kioskTitle') ?> (<a href="<?php the_field('kioskLink') ?>" class="link-simple-underline">Se alle</a>)</h2>
  </div>
  <?php 
    $allPosts = get_posts(array(
      'numberposts' => 6,
      'post_type' => 'lesekiosk',
      'orderby' => 'date',
      'order' => 'ASC',
      'meta_query' => array(
        array(
            'key' => 'langLat',
            'value'   => array(''),
            'compare' => 'NOT IN'
        )
      )
    ));
  ?>
  <div class="mb-4">
    <section class="kiosk-item-grid">
      <?php foreach($allPosts as $post): ?>
        <?php setup_postdata($post); ?>
        <?php get_template_part( 'content-lesekiosk' ); ?>
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
    </section>
    <?php if(get_field('newsTitle')): ?>
      <div class="border border-theme">
        <h2 class="text-center mb-0! h3"><?php the_field('newsTitle') ?></h2>
      </div>
      <?php 
          $allPosts = get_posts(array(
            'numberposts' => 6
          ));
        ?>
        <?php foreach($allPosts as $post): ?>
          <?php setup_postdata($post); ?>
          <?php get_template_part( 'content' ); ?>
        <?php endforeach; ?>
        <?php wp_reset_query(); ?>
    <?php endif; ?>
  </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
