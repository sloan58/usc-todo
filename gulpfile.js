var elixir = require('laravel-elixir');
require('laravel-elixir-angular');

var bowerPath = './vendor/bower_components';
var paths = {
    'jquery': bowerPath + '/jquery-legacy/dist',
    'bootstrap': bowerPath + '/bootstrap-sass/assets',
    'fontawesome': bowerPath + '/font-awesome',
    'dataTables': bowerPath + '/datatables/media',
    'angularjs': bowerPath + '/angular',
    'dataTablesBootstrap3Plugin': bowerPath + '/datatables-bootstrap3-plugin/media'
};


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

elixir(function (mix) {
    //mix.less('app.less');

    // copy css for sass import
    mix.copy(paths.dataTablesBootstrap3Plugin + '/css/datatables-bootstrap3.css', 'resources/assets/sass/dataTables-bootstrap3.scss');

    mix.sass(['app.scss','custom.scss'], 'public/css', {
        includePaths: [
            paths.bootstrap + '/stylesheets/',
            paths.fontawesome + '/scss/',
            'custom.scss',
        ]
    });

    // copy fonts
    mix.copy(paths.bootstrap + '/fonts/bootstrap/**', 'public/fonts');
    mix.copy(paths.fontawesome + '/fonts/**', 'public/fonts');

    // copy scripts
    mix.copy(paths.jquery + '/jquery.min.js', 'public/js/vendor/jquery.js');
    mix.copy(paths.angularjs + '/angular.min.js', 'public/js/vendor/angular.js');
    mix.copy(paths.bootstrap + '/javascripts/bootstrap.min.js', 'public/js/vendor/bootstrap.js');
    mix.copy(paths.dataTables + '/js/jquery.dataTables.min.js', 'public/js/vendor/dataTables.js');
    mix.copy(paths.dataTablesBootstrap3Plugin + '/js/datatables-bootstrap3.min.js', 'public/js/vendor/dataTables-bootstrap3.js');
    mix.copy('resources/assets/js/custom-datatable.js','public/assets/site/js/custom-datatable.js');
    mix.copy('resources/assets/js/bootstrap-datepicker.js','public/assets/site/js/bootstrap-datepicker.js');
    mix.copy('resources/assets/js/todo-datepicker.js','public/assets/site/js/todo-datepicker.js');


    // Wasn't able to use scripts or scriptsIn!
    //mix.scripts([
    //        'vendor/jquery.js',
    //        'vendor/bootstrap.js'
    //    ], 'public/js/vendor.js','public/js');

    //mix.scripts([
    //    paths.jquery + '/jquery.js',
    //    paths.bootstrap + '/javascripts/bootstrap.js'
    //], 'public/js/vendor.js', './');

    //mix.scripts([
    //    'jquery-legacy/dist/jquery.js',
    //    'bootstrap-sass-official/assets/javascripts/bootstrap.js'
    //], 'public/js/app.min.js', 'vendor/bower_components');

    //Mix Angular files
    mix.angular();
    // Cache-bust app.css
    mix.version(['public/css/app.css','public/css/custom.css', 'public/css/datepicker.css']);
});

