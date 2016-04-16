var elixir = require('laravel-elixir');
require('laravel-elixir-stylus');
elixir.config.publicPath='compiled';
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

 elixir(function(mix) {
 	mix.copy('bower_components/open-sans/fonts/','compiled/fonts/')
 	.copy('bower_components/bootstrap-sass/assets/fonts/','compiled/fonts/')
 	.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.js','resources/assets/js')
 	.copy('bower_components/jquery/dist/jquery.js','resources/assets/js')
 	.sass('sass.scss', 'resources/css',
 	{
 		includePaths:[
 		__dirname + '/bower_components',
 		]

 	})
 	.stylus('app.styl','resources/css')
 	.styles(['sass.css','app.css'],null,'resources/css')
 	.scripts(['jquery.js','bootstrap.js','main.js'])
 	.version(['css/all.css','js/all.js']);
 });

