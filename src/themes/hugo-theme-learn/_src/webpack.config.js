const path = require('path');

const PATHS = {
  'static': path.join(__dirname, '..', 'static'),
  sass: path.join(__dirname, 'sass'),
  js: path.join(__dirname, 'js'),
};

const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = () => {
  return {
    entry: {
      main: path.join(PATHS.js, 'theme.js')
    },
    output: {
      path: path.join(PATHS.static, 'js'),
      filename: '[name].js'
    },
    devtool: 'source-map',
    module: {
      rules: [
        {
          test: /\.(svg|woff|woff2|eot|ttf|otf)$/,
          loader: 'url-loader?limit=10000&mimetype=application/font-woff'
        },
        {
          test:/\.scss$/,
          use: [
            'style-loader',
            MiniCssExtractPlugin.loader,
            'css-loader',
            'sass-loader',
          ],
        },
      ]
    },
    plugins: [
      new MiniCssExtractPlugin({
        // path is relative to output path
        filename: '../css/style.css',
        disable: false,
        allChunks: true
      })
    ]
  };
};
