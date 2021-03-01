const mix = require( 'laravel-mix' )

mix.postCss( 'resources/css/main.css', 'public/css', [
    require( 'postcss-import' ),
    require( 'tailwindcss' ),
] )
    .js( 'resources/js/app.js', 'public/js' )
    .webpackConfig( {
        output: {
            chunkFilename: mix.inProduction() ? 'js/[name].[chunkhash].js' : 'js/[name].js'
        }
    } )
// mix.dump();

// fontawesome
// mix.copyDirectory(
//     'node_modules/@fortawesome/fontawesome-free/webfonts',
//     'public/webfonts'
// )

// vendor
mix.styles( [
    'node_modules/@fortawesome/fontawesome-free/css/all.css',
    'node_modules/choices.js/public/assets/styles/choices.min.css',
    'node_modules/tippy.js/dist/tippy.css',
], 'public/css/vendor.css' )


if ( mix.inProduction() )
{
    mix.version()
}

// mix.browserSync({
//   proxy: 'http://127.0.0.1:8000',
//   // https://github.com/turbolinks/turbolinks/issues/147#issuecomment-236443089
//   snippetOptions: {
//     rule: {
//       match: /<\/head>/i,
//       fn: function (snippet, match) {
//         return snippet + match;
//       }
//     }
//   },
// });
