<article class="border-l border-r border-b border-theme">
  <div class="md:flex items-center">
    <?php if ( has_post_thumbnail()) : ?>
      <a href="<?php the_permalink(); ?>" class="md:w-1/4 block mb-2 md:mb-0 mr-4">
        <?php the_post_thumbnail('medium', array('class' => 'block w-full')); ?>
      </a>
    <?php endif; ?>
    <div class="flex-1">
      <h3 class="max-w-prose">
        <a href="<?php the_permalink(); ?>" class="link-simple">
          <?php the_title(); ?>
        </a>
      </h3>
      <div class="max-w-prose">
        <?php html5wp_excerpt('html5wp_index'); ?>
      </div>
    </div>
  </div>
</article>
