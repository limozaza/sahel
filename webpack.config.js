var Encore = require('@symfony/webpack-encore');
const CopyWebpackPlugin = require('copy-webpack-plugin')

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    .addEntry('global', './assets/global/js/app.js')

    // uncomment if you use Sass/SCSS files
     .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
     .autoProvidejQuery()

    .enableBuildNotifications()
    .enableReactPreset()
    .addPlugin(
        new CopyWebpackPlugin(
            [
                {from: './assets/static', to: 'static'}
            ]
        )
    )
    .configureBabel(function(babelConfig) {
        // add additional presets
        //babelConfig.presets.push('es2015');
        babelConfig.plugins.push('transform-class-properties');
        // no plugins are added by default, but you can add some
        // babelConfig.plugins.push('styled-jsx/babel');
    })
;

module.exports = Encore.getWebpackConfig();
