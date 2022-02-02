<?php get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <article>
      <div class="border border-b-0 border-theme">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="text-lg">
          <?php html5wp_excerpt('html5wp_index'); ?>
        </div>
      </div>
      
      <div class="border border-theme mb-4">
        <div class="content-column wp-content text-lg mb-4">
          <?php if ( has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large_crop', array('class' => 'w-full block mb-4')); ?>
          <?php endif; ?>
          <?php the_content(); ?>
        </div>
      </div>
    </article>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>
