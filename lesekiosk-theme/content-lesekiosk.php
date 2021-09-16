<?php
  $link = get_permalink();
  $langLat = get_field('langLat');
  $name = $langLat['name'] ? $langLat['name'] : get_the_title();
?>
<article class="kiosk-item padding-theme">
  <a href="<?php echo $link ?>">
    <?php the_post_thumbnail('medium_crop', array('class' => 'w-full h-auto mb-3')); ?>
  </a>
  <h3 class="px-1">
    <a href="<?php echo $link ?>" class="link-simple flex items-center">
      <span class="flex-1">NR <?php echo get_field('kioskNumber') ?> <?php echo $name ?> </span>
      <?php get_template_part('icons/arrow-right-solid'); ?>
    </a>
  </h3>
</article>
