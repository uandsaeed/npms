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
// mix.js([
//         'resources/assets/admin/js/index.js'
//     ],
//     'public/admin/js/app.js')
//    .sass('resources/assets/sass/app.scss', 'public/admin/css/app.css');


mix.js([
        'resources/assets/admin/js/index.js'
    ],
    'public/admin/js/vendor.js')
    .sass('resources/assets/sass/app.scss', 'public/admin/css/app.css');

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