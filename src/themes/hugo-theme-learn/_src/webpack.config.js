const path = require('path');

const PATHS = {
  'static': path.join(__dirname, "..", "static"),
  sass: path.join(__dirname, "sass"),
  js: path.join(__dirname, "js"),
};

const ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = () => {
  return {
    entry: {
      main: path.join(PATHS.js, 'theme.js')
    },
    output: {
      path: path.join(PATHS.static, 'js'),
        filename: "[name].js"
    },
    watch: true,
      devServer: {
      inline: true
    },
    module: {
      loaders: [
        {
          test:/\.scss$/,
          use: ExtractTextPlugin.extract({
            fallback: 'style-loader',
            use: [
              {
                loader: "css-loader",
                options: {
                  url: false
                }
              },
              'sass-loader'
            ]
          })
        }
      ]
    },
    plugins: [
      new ExtractTextPlugin({
        // path is relative to output path
        filename: '../css/style.css',
        disable: false,
        allChunks: true
      })
    ]
  };
};
