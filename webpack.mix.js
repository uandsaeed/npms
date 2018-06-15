let mix = require('laravel-mix');

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

/**
 * Admin
 */

mix.autoload({
        jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
    })
    .js([
        'public/vendor/adminlte/vendor/jquery/dist/jquery.js',
        'public/vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.js',
        'public/vendor/adminlte/dist/js/adminlte.js',
        'node_modules/fine-uploader/jquery.fine-uploader/jquery.fine-uploader.js',
        'resources/assets/admin/js/ajax.js',
        'resources/assets/admin/js/import.js',
        'resources/assets/admin/js/label.js',
        'resources/assets/admin/js/product_pending.js'

        ],
    'public/admin/js/vendor.js')
    .sass('resources/assets/sass/app.scss',
        'public/admin/css/app.css')
    .version();

/**
 *
 * Admin App
 */

mix.autoload({
        jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
    })
    .js([
        'resources/assets/admin/js/index.js',
    ], 'public/admin/js/app.js')
    .version();;


mix.webpackConfig({
    module: {
        rules: [{
            test: /\.js?$/,
            exclude: /(node_modules|bower_components)/,
            use: [{
                loader: 'babel-loader',
                options: mix.config.babel()
            }]
        }]
    }
});