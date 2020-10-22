const mix = require('laravel-mix');
require( 'laravel-mix-stylelint' );
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your WordPress application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/scss/style.scss', 'public/css')
    .options({
        postCss: [
            require('autoprefixer')(),
            require('cssnano')
        ]
    })
    .js('resources/js/app.js', 'public/js')
    .copyDirectory('resources/images/**', 'public/img')
    .copyDirectory('resources/fonts/**', 'public/fonts')
    .setPublicPath('./public')
    .disableNotifications()
    .stylelint()
    .version();
