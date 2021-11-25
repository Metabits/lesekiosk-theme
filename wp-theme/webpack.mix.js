let mix = require('laravel-mix');

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
