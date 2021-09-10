(function ($, root, undefined) {
  $(function () {
    $('.js-tab-link').click(function(event) {
      event.preventDefault();
      const target = $(this).attr('href')
      $('.tab-content').addClass('hidden').filter(target).removeClass('hidden');
      $('.js-tab-link').removeClass('bg-primary text-white').filter($(this)).addClass('bg-primary text-white');
    })
    $('.image-viewer-item').click(function(event) {
      event.preventDefault();
      const self = $(this)
      $('.image-viewer img').attr('src', self.attr('data-src')).attr('alt', self.attr('data-alt'));
      $('.image-viewer-item').removeClass('border-primary').filter($(this)).addClass('border-primary');
    })
  });
    
})(jQuery, this);
