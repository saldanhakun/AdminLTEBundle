const Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('Resources/public/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/bundles/adminlte/')

    // make sure the manifest prefix matches the structure in the real application
    .setManifestKeyPrefix('bundles/adminlte/')

    // delete old files before creating them
    .cleanupOutputBeforeBuild()

    // add debug data in development
    .enableSourceMaps(true)

    // uncomment to create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(true)

    // generate only two files: app.js and app.css
    .addEntry('adminlte', './Resources/assets/admin-lte.js')

    // show OS notifications when builds finish/fail
    //.enableBuildNotifications()

    // don't use a runtime.js
    .disableSingleRuntimeChunk()

    // because we need $/jQuery as a global variable
    .autoProvidejQuery()

    // enable sass/scss parser
    // see https://symfony.com/doc/current/frontend/encore/bootstrap.html
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: false
    })

    // add hash after file name
    .configureImageRule({
        filename: 'images/[name].[hash:8][ext]',
    })
    .configureFontRule({
        filename: 'webfonts/[name].[hash:8][ext]'
    })
    .configureFilenames({
        js: '[name].[chunkhash].js',
        css: '[name].[contenthash].css'
    })
;

module.exports = Encore.getWebpackConfig();
