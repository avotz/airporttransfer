const mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

mix.js('resources/js/app.js', 'js')
    .sass('resources/sass/style.scss', './')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
        
    })
    .setPublicPath('./');

if (mix.inProduction()) {
    mix.version();
}