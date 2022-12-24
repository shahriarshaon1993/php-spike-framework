const path = require('path')

module.exports = {
    entry: './resources/js/main.js',
    output: {
        path: path.resolve(__dirname, './public/js'),
        filename: 'index.js',
        clean: true,
    },
    devtool: 'source-map',
    devServer: {
        static: path.resolve(__dirname, './resources/views/layouts'),
        port: 8080,
        hot: true
    },
    module: {
        rules: [
            {
                test: /\.(scss)$/,
                use: [
                    {
                        loader: 'style-loader'
                    },
                    {
                        loader: 'css-loader'
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                plugins: () => [
                                    require('autoprefixer')
                                ]
                            }
                        }
                    },
                    {
                        loader: 'sass-loader'
                    }
                ]
            }
        ]
    }
}