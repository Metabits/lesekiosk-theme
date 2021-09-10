<?php get_header(); ?>
<div class="border border-theme">
  <h2 class="text-center mb-0! h3"><?php echo get_the_archive_title() ?></h2>
</div>
<section class="mb-4">
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php get_template_part('content'); ?>
  <?php endwhile; endif; ?>
  <?php $nav = html5wp_pagination(); ?>
  <?php if($nav): ?>
    <div class="border border-theme border-t-0 text-lg text-center">
  <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
