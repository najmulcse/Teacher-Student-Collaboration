var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')

        .styles([

            'form-elements.css',
            'style.css',
            'bootstrap.css',
            'bootstrap.min.css',
            'bootstrap-theme.css',
            'bootstrap-theme.min.css',
            'font-awesome.css',
            'font-awesome.min.css',
            'SidebarNav.min.css'



    ],'./public/css/libs.css')

        .scripts([
            'bootstrap.js',
            'bootstrap.min.js',
            'jquery-1.11.1.js',
            'jquery.backstretch.min.js',
            'jquery-1.11.1.min.js',
            'npm.js',
            'scripts.js',
            'placeholder.js',
            'SidebarNav.min.js'

        ],'./public/js/libs.js')
});
