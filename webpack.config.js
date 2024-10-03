const path    = require( 'path' );
const webpack = require( 'webpack' );
const CopyPlugin = require("copy-webpack-plugin");

module.exports = ( env, options ) => {
    var runMode = options.mode ? options.mode : 'none';

    var config = {
        mode    : runMode,
        watch   : env.watch,
        devtool : false,

        entry   : {
            script: './assets/js/index.js'
        },

        output: {
            path    : path.join(__dirname),
            filename: '[name].js'
        },

        externals: {
        },

        resolve: {
        },

        plugins: [
            new CopyPlugin({
                patterns: [
                    {
                        from: 'uicons-@(brands|@(regular|solid|thin)-rounded-)*.@(eot|woff|woff2)',
                        to: path.join(__dirname, 'assets', 'fonts'),
                        context: path.join(__dirname, 'node_modules', '@flaticon', 'flaticon-uicons', 'css'),
                        toType: 'dir',
                        force: false
                    },
                ],
            }),
        ],
    };

    if (runMode === 'production') {
        config.externals['jquery'] = 'jQuery';
    }

    return config;
};
