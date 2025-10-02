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

    // Compilação do AdminLTE com todas as dependências
    .addEntry('adminlte', './Resources/assets/admin-lte.js')
    // Compilação do AdminLTE sem dependências, para facilitar integração na aplicação
    //.addEntry('adminlte-core', './Resources/assets/admin-lte-core.js')
    // Consolidação do AdminLTE original
    //.addEntry('adminlte-dist', './Resources/assets/admin-lte-dist.js')

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
    .copyFiles({
        from: './node_modules/admin-lte/dist',
        pattern: /^(?!.*AdminLTE\.)(?!.*\.html$).*$/,
        to: 'dist/[path][name].[ext]',
        context: './node_modules/admin-lte/dist',
    })
;

module.exports = Encore.getWebpackConfig();
