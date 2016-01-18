var elixir = require('laravel-elixir');

var paths = {
    'jquery': 'bower_components/jquery/',
    'bootstrap': 'bower_components/bootstrap-sass-official/assets/'
};

elixir(function(mix) {
    mix.sass('app.scss') // app.scssをコンパイルして、public/css/app.css に出力
 
       // Bootstrapのフォントを public/fonts/bootstrapディレクトリにコピー
       .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap')
 
       // jquery.jsと bootstrap.jsを結合して、public/js/app.jsに出力
       .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js"
        ], 'public/js/app.js', './');  // ①
});

require('laravel-elixir-browser-sync');

elixir(function(mix) {
  mix.browserSync([
    'app/**/*',
    'public/**/*',
    'resources/views/**/*'
  ], {
    proxy: '157.7.236.208',
    reloadDelay: 2000
  });
});


