let mix = require('laravel-mix');

const path = require('path');
let directory = path.basename(path.resolve(__dirname));

const source = 'platform/plugins/' + directory;
const dist = 'public/vendor/core/plugins/' + directory;

mix
    .sass(source + '/resources/assets/sass/comments.scss', dist + '/css')
    .js(source + '/resources/assets/js/comments.js', dist + '/js')

    .sass(source + '/resources/assets/sass/comments-public.scss', dist + '/css')
    .js(source + '/resources/assets/js/comments-public.js', dist + '/js')

    .copyDirectory(dist + '/css', source + '/public/css')
    .copyDirectory(dist + '/js', source + '/public/js');


