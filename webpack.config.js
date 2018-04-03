const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");


module.exports = {
    mode: "development",
    entry: {
        "./js/index": "./resources/assets/js/index.js",
        "./css/main": "./resources/assets/scss/main.scss"
    },
    output: {
        path: path.resolve(__dirname, "public")
    },
    plugins: [
        new MiniCssExtractPlugin()
    ],
    module: {
        rules: [
            {
                test: /\.js$/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: {
                            presets: ['es2015']
                        }
                    }
                ]
            },
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: "css-loader"
                    },
                    {
                        loader: "sass-loader"
                    }
                ]
            }
        ]
    }
};
