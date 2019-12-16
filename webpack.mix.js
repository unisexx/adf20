const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');


// mix.js([
//    'resources/js/font_awesome.js'
// ], 'public/js').version();

mix.js([
   'resources/js/app.js',
   'resources/js/font_awesome.js'
], 'public/js/all.js').version()
.sass(
   'resources/sass/app.scss', 'public/css'
);

mix.styles([
      'resources/css/template.css'
   ], 'public/css/template.css');

mix.styles([
      'public/css/template.css',
      'public/css/app.css'
   ], 'public/css/all.css');