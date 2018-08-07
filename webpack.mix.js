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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css')
//    .sass('resources/assets/sass/main.scss', 'public/css');


// mix.styles([
// 	'resources/assets/css/main.css',
// 	'resources/assets/css/main2.css'
// 	], 'public/css/all.css');

mix.babel('resources/assets/admin/css/adminlte.css','public/admin/css/adminlte.css');
mix.babel('resources/assets/admin/css/dataTable.css','public/admin/css/dataTable.css');
mix.babel('resources/assets/admin/js/adminlte.js','public/admin/js/adminlte.js');
mix.babel('resources/assets/admin/js/demo.js','public/admin/js/demo.js');
mix.babel('resources/assets/admin/js/jquery.dataTable.js','public/admin/js/jquery.dataTable.js');
mix.babel('resources/assets/admin/js/jquery.dataTable.bootstrap4.js','public/admin/js/jquery.dataTable.bootstrap4.js');
// mix.babel('resources/assets/admin/js/adm_list.js','public/admin/js/adm_list.js');
// mix.babel('resources/assets/admin/js/adm_user.js','public/admin/js/adm_user.js');
mix.js('resources/assets/admin/js/adm_list.js','public/admin/js/adm_list.js')
	.js('resources/assets/admin/js/adm_user.js','public/admin/js/adm_user.js');


if (mix.inProduction()) {
	mix.version();
}