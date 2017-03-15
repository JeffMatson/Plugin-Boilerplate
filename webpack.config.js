var path = require('path')
var webpack = require('webpack')

module.exports = {
    entry: './assets/js/main.js',
    output: {
        path: path.resolve(__dirname, './js/dist'),
        publicPath: '/js/',
        filename: 'build.js'
    },
    module: {
        rules: [{
                    test: /\.vue$/,
                    loader: 'vue-loader',
                    options: {
                        // vue-loader options go here
                    }
                },
                {
                    test: /\.js$/,
                    loader: 'babel-loader',
                    exclude: /node_modules/
                },
                {
                    test: /\.(png|jpg|gif|svg)$/,
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]?[hash]'
                    }
                }
            ]
            // loaders: [{
            //     // test: require.resolve('tinymce/tinymce'),
            //     // loaders: ['imports?this=>window', 'exports?window.tinymce']
            // }, {
            //     // test: /tinymce\/(themes|plugins|skins)\//,
            //     // loaders: ['imports?this=>window']
            // }]
    },
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.common.js'
        }
    },
    devServer: {
        historyApiFallback: true,
        noInfo: true
    },
    devtool: '#eval-source-map'
}