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

// compile app.js as a ReactJS project and output to public/js/app.js
mix.js('resources/js/app.js', 'public/js')
   .react();

mix.js('resources/js/view-transitions.js', 'public/js');
mix.js('resources/js/guided-use.js', 'public/js');
mix.js('resources/js/back-button.js', 'public/js');