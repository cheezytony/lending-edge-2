const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.browserSync('lending-edge.test');

mix
  .js('resources/js/app.js', 'public/js')
  .vue();

mix.sass('resources/scss/style.scss', 'public/css');
// .options({
//   processUrls: false,
// });

// mix.sass('resources/css/app.scss', 'public/css')
//   .options({
//     processUrls: false,
//     postCss: [require('tailwindcss')]
//   });

mix
  .copy('resources/js/custom.js', 'public/js')
  .copyDirectory('resources/images', 'public/images')
  .copyDirectory('resources/js/libs', 'public/js/plugins');

mix.sourceMaps();
