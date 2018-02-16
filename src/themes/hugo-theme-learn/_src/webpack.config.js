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
    devtool: "source-map",
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
                  sourceMap: true,
                  // avoid verifying url() sources
                  url: false
                }
              },
              {
                loader: 'sass-loader',
                options: {
                  sourceMap: true
                }
              }
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
