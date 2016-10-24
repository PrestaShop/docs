About Webpack
=========================

	`Webpack <https://webpack.github.io/>`_ is a module bundler.
	Webpack takes modules with dependencies and generates static assets representing those modules.

The main interest of using Webpack is that it will compile all your styles - which we advise you to write using `Sass <http://sass-lang.com/>`_ - into a single CSS file.
This way, your theme will make only one HTTP request for this single file, and since your browser will cache it for later re-use, it will even donwload this file only once.

The same goes with your JavaScript code. Instead of loading jQuery along with its community plugins, your own custom plugins and any extra code you might need,
Webpack compiles and minifies all this JavaScript code into a single file, which will be loaded once - and cached.


.. note::

  Webpack is not at all required by PrestaShop, you are free to use your favorite tool!
  The documentation explains Webpack since it's the tool we chose for the Classic theme, and StarterTheme
  ships with a ready-to-use configuration file.




.. image:: img/webpack.png




Installing webpack
-----------------------

If you want to compile your assets using Webpack (and we advise you to), follow these steps:

1. Download and install `Node.js <https://nodejs.org/>`_, which contains the npm tool.
2. In your command line tool, open the `_dev` folder.
3. Install npm: `npm install`.
4. You then have a choice:

 - To build your assets once, type `npm run build`.
 - To rebuild your assets every time you change a file in the _dev folder, type `npm run watch`.


Webpack configuration
---------------------------------

The `Webpack configuration file for StarterTheme`_ is thus:

1. All CSS rules go to the `assets/css/theme.css` file.
2. All JavaScript code go to the `assets/js/theme.js` file.

It provides proper configuration for compile your Sass, Less, Stylus or CSS files into a single CSS file.

JavaScript code is written in ES6, and compiled to ES5 with Babel.



If you want to use Stylus or Less, simply edit the command line under the "scripts" section.

.. code-block:: javascript

  var webpack = require('webpack');
  var ExtractTextPlugin = require("extract-text-webpack-plugin");

  var plugins = [];

  plugins.push(
    new ExtractTextPlugin('../css/theme.css')
  );

  module.exports = [{
    // JavaScript
    entry: [
      './js/theme.js'
    ],
    output: {
      path: '../assets/js',
      filename: 'theme.js'
    },
    module: {
      loaders: [{
        test: /\.js$/,
        exclude: /node_modules/,
        loaders: ['babel-loader']
      }]
    },
    externals: {
      prestashop: 'prestashop'
    },
    plugins: plugins,
    resolve: {
      extensions: ['', '.js']
    }
  }, {
    // CSS
    entry: [
      './css/normalize.css',
      './css/example.less',
      './css/st/dev.styl',
      './css/theme.scss'
    ],
    output: {
      path: '../assets/js',
      filename: 'theme.js'
    },
    module: {
      loaders: [{
        test: /\.scss$/,
        loader: ExtractTextPlugin.extract(
          "style",
          "css-loader?sourceMap!postcss!sass-loader?sourceMap"
        )
      }, {
        test: /\.styl$/,
        loader: ExtractTextPlugin.extract(
          "style",
          "css-loader?sourceMap!postcss!stylus-loader?sourceMap"
        )
      }, {
        test: /\.less$/,
        loader: ExtractTextPlugin.extract(
          "style",
          "css-loader?sourceMap!postcss!less-loader?sourceMap"
        )
      }, {
        test: /\.css$/,
        loader: ExtractTextPlugin.extract(
          'style',
          'css-loader?sourceMap!postcss-loader'
        )
      }, {
        test: /.(png|woff(2)?|eot|ttf|svg)(\?[a-z0-9=\.]+)?$/,
        loader: 'file-loader?name=../css/[hash].[ext]'
      }]
    },
    plugins: plugins,
    resolve: {
      extensions: ['', '.scss', '.styl', '.less', '.css']
    }
  }];





.. _Webpack configuration file for StarterTheme: https://github.com/PrestaShop/StarterTheme/blob/master/_dev/webpack.config.js
