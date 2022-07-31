const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

mix.copy('node_modules/intl-tel-input/build/js/utils.js', 'public/vendor/intl-tel-input/build/js');