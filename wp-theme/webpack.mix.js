const mix = require('laravel-mix');
const fs = require('fs');

mix.options({ processCssUrls: false });
mix.setPublicPath('./')
mix.js('assets/main.js', './js/scripts.js')
    .postCss('assets/style.css', './', [
    require('tailwindcss'),
  ]).browserSync({
    proxy: 'localhost:8000',
	   files: [
      'style.css',
		  'js/scripts.js',
		  'assets/**/*',
		  '**/*.php',
	  ]
  })
if (mix.inProduction()) {
  mix.then((stats) => {
    const content = `<?php $bundle_hash = '${stats.compilation.hash}';`
    fs.writeFileSync('./version-hash.php', content);
  });
}
