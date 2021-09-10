<?php get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <article>
      <div class="flex align-items">
        <div class="border border-r-0 border-b-0 border-theme">
          <span class="uppercase md:text-lg">Nr <?php the_field('kioskNumber'); ?></span>
        </div>
        <?php if (get_field('quote')): ?>
          <div class="border border-r-0 border-b-0 border-theme">
            <span class="uppercase md:text-lg"><?php the_field('opprettet'); ?></span>
          </div>
        <?php endif; ?>
        <?php if (get_field('langLat')): ?>
          <div class="border border-theme border-b-0 flex-1">
            <?php
              $map_field = get_field('langLat');
              $map_query = sprintf('%s,%s,%s', $map_field['address'], $map_field['lat'], $map_field['lng']);
            ?>
            <a href="<?php echo sprintf('https://www.google.com/maps/search/?api=1&query=%s&query_place_id=%s', $map_query, $map_field['place_id']); ?>" target="blank" class="uppercase link-simple flex items-center">
              <span class="mr-2 md:text-lg">Åpne i kart</span>
              <?php get_template_part('icons/external-link-alt-solid'); ?>
            </a>
          </div>
        <?php endif; ?>
      </div>
      <div class="border border-b-0 border-theme">
        <div class="max-w-prose mx-auto">
          <h1 class="mb-2 mt-2"><?php the_title(); ?></h1>
          <?php if (get_field('quote')): ?>
            <blockquote class="">
              <p class="italic mb-2 text-lg">
                <?php the_field('quote'); ?>
              </p>
              <cite class="block mb-4 not-italic font-bold text-right">
                <?php the_field('author'); ?>
              </cite>
            </blockquote>
          <?php endif; ?>
        </div>
      </div>
      <div class="border border-b-0 border-theme">
        <div class="mx-auto mb-2 mt-2 image-viewer" style="max-width: 900px;">
          <?php the_post_thumbnail('large'); ?>
        </div>
        <?php if (get_field('gallery')): ?>
          <nav class="flex items-center justify-center mb-2">
            <?php $img_id = get_post_thumbnail_id() ?>
            <button class="border-2 border-white border-primary block mx-1 image-viewer-item" data-alt="<?php echo get_post_meta($img_id, '_wp_attachment_image_alt', TRUE) ?>" data-src="<?php echo wp_get_attachment_image_src($img_id, 'large') ?>">
              <?php the_post_thumbnail('small'); ?>
            </button>
            <?php foreach(get_field('gallery') as $item): ?>
              <?php $img = $item['image']; ?>
              <button class="border-2 border-white block mx-1 image-viewer-item" data-alt="<?php echo $img['alt'] ?>" data-src="<?php echo $img['sizes']['large'] ?>">
                <?php echo wp_get_attachment_image($img['id'], 'small'); ?>
              </button>
              <?php endforeach; ?>
          </nav>
        <?php endif; ?>
      </div>
      <div class="border border-theme-no-padding border-b-0">
        <nav class="flex items-center justify-center md:text-lg">
          <a class="js-tab-link block border-theme bg-primary text-white border-r border-l tab-link-selected" href="#info">
            Lesekiosken
          </a>
          <?php if (get_field('authorInfo')): ?>
            <a class="js-tab-link block border-theme border-r hover:underline" href="#forfatter">
              Forfatteren
            </a>
          <?php endif; ?>
          <?php if (get_field('ownerInfo')): ?>
            <a class="js-tab-link block border-theme border-r hover:underline" href="#faddere">
              Fadderne
            </a>
          <?php endif; ?>
        </nav>
      </div>
      <div class="border border-theme border-b-0">
        <div class="max-w-prose mx-auto wp-content my-2">
          <div class="tab-content" id="info">
            <?php the_content(); ?>
          </div>
          <div class="tab-content hidden" id="forfatter">
            <?php the_field('authorInfo'); ?>
          </div>
          <div class="tab-content hidden" id="faddere">
          <?php the_field('ownerInfo'); ?>
          </div>
        </div>
      </div>
      <?php
        $current = (int) get_field('kioskNumber');
        $prevPosts = get_posts(array(
          'numberposts'   => 1,
          'post_type'     => 'lesekiosk',
          'meta_key'      => 'kioskNumber',
          'meta_value'    => sprintf('%s', $current - 1)
        ));
        $nextPosts = get_posts(array(
          'numberposts'   => 1,
          'post_type'     => 'lesekiosk',
          'meta_key'      => 'kioskNumber',
          'meta_value'    => sprintf('%s', $current + 1)
        ));
      ?>
      <div class="border border-theme-no-padding mb-4 flex items-center justify-between">
        <?php if(count($prevPosts) > 0): ?>
          <a class="block border-theme border-r text-lg link-simple flex items-center" href="<?php echo get_permalink($prevPosts[0]->ID) ?>">
            <?php get_template_part('icons/arrow-left-solid'); ?>
            <span class="ml-2">Lesekiosk <?php echo get_field('kioskNumber', $prevPosts[0]->ID) ?></span>
          </a>
        <?php else: ?>
          <span>&nbsp;</span>
        <?php endif; ?>
        <?php if(count($nextPosts) > 0): ?>
          <a class="block border-theme border-l text-lg link-simple flex items-center" href="<?php echo get_permalink($nextPosts[0]->ID) ?>">
            <span class="mr-2">Lesekiosk <?php echo get_field('kioskNumber', $nextPosts[0]->ID) ?></span>
            <?php get_template_part('icons/arrow-right-solid'); ?>
          </a>
          <?php endif; ?>
      </div>
    </article>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>