  </main>
  <footer class="footer pb-4">
    <div class="md:grid grid-cols-3">
      <div class="border-t border-l border-r md:border border-theme flex items-center justify-center">
        <div>
          <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
        </div>
      </div>
      <div class="border md:border-l-0 md:border-r-0 border-theme flex items-center justify-center">
        <div>
          <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
        </div>
      </div>
      <div class="border-l border-r md:border border-theme flex items-center justify-center">
        <div>
          <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-3')) ?>
        </div>
      </div>
    </div>
    <div class="border md:border-t-0 border-theme">
      <p class="text-sm text-gray-600 text-center">
      <?php echo date('Y'); ?> &copy; <?php bloginfo('name'); ?>
    </p>
    </div>
  </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
