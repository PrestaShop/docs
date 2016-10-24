****************
Asset Management
****************

PrestaShop 1.7 has significantly improved the way assets (CSS, JavaScript and image files) are managed. This is due to the fact that PrestaShop ships with some configuration files that will help you set up your Webpack task runner.

Modules can add CSS and JavaScript files the same way they did in PrestaShop 1.6.

Every module loads the following files:

1. theme.css
2. custom.css
3. rtl.css (if a right-to-left language is detected)
4. core.js
5. theme.js
6. custom.js



The Starter Theme contains the development files in the _dev folder. Install the dependencies using npm: ``cd _dev + npm install``.

Now the dependencies are installed and correctly set up, you can customise theses files.

If you need to add image files, you can create and /img folder in the /_dev folder.

Since stylesheets and JavaScript files are compiled and minified, you should use npm to build new version of theses files after your modifications: it will check for any file change, and will update the production version used by PrestaShop (localized in your assets folder).

To watch your file changes with npm, type this: ``npm run watch``.

Note: You should probably start by removing all existing styles.



About Webpack
=========================

	`Webpack <https://webpack.github.io/>`_ is a module bundler.
	Webpack takes modules with dependencies and generates static assets representing those modules.

The main interest in using Webpack is that it will compile all your styles - which we advise you to write using `Sass <http://sass-lang.com/>`_ - into a single CSS file.
This way, your theme will make only one HTTP request for this single file, and since your browser will cache it for later re-use, it will even donwload this file only once.

The same goes with your JavaScript code. Instead of loading jQuery along with its community plugins, your own custom plugins and any extra code you might need,
Webpack compiles and minifies all this JavaScript code into a single file, which will be loaded once - and cached.

// TODO IMG


[NOTE]
PrestaShop's Combine, Compress and Cache feature (CCC) hasn't yet been updated to take this into account. Don't worry, it should be redone soon.


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

The `Webpack configuration file for PrestaShop <https://github.com/PrestaShop/PrestaShop/blob/develop/themes/webpack.config.js>`_ is thus:

1. All CSS rules go to the `assets/css/theme.css` file.
2. All JavaScript code go to the `assets/js/theme.js` file.

It provides proper configuration for compile your Sass files into a single CSS file. JavaScript code is written in ES6, and compiled to ES5 with Babel.

// TODO PNG ? svg ?


If you want to use Stylus or Less, simply edit the command line under the "scripts" section.

.. code-block:: javascript

	var webpack = require('webpack');

	var plugins = [];

	var production = false;

	if (production) {
	    plugins.push(
	        new webpack.optimize.UglifyJsPlugin({
	            compress: {
	                warnings: false
	            }
	        })
	    );
	}

	module.exports = {
	    entry: [
	      './js/theme.js'
	    ],
	    output: {
	        path: '../assets/js',
	        filename: 'theme.js'
	    },
	    module: {
	        loaders: [
	            {test: /\.js$/, loaders: ['babel-loader']},
	        ]
	    },
	    externals: {
	        prestashop: 'prestashop'
	    },
	    devtool: 'source-map',
	    plugins: plugins
	};




Adding Assets
=================


With Webpack (theme-wide)
----------------------------

// TODO


Without Webpack (theme-wide)
-----------------------------

[NOTE]
This is not recommended, please use Webpack.

All of PrestaShop 1.7's themes have a `assets/css/custom.css` file, which is empty by default.
We advise you to add your custome CSS rules in this file if you need to make small modifications to the default theme, like changing the color of the text and such. It's loaded after the `theme.css` file.

Also if you don't want to use Webpack, you can import other CSS files in `custom.css`, for instance:

.. code-block:: CSS

	@import './other-css-file.css';

The same way goes with custom JavaScript code, with the `assets/js/custom.js` file.


With HTML (page-specific)
---------------------------

There might situation when you need to load a very custom CSS file on some specific pages (but on all of the site's pages). If you have 1 MB of CSS dedicated to a widget/infographic/map/advanced section for example, you may not want to add it to Webpack.

In such cases, open the `templates/_partials/head.tpl` template file, and add something similar to the following code:

.. code-block:: Smarty

	{if $page.page_name == 'index'}
		<link rel="stylesheet" href="themes/YOUR_THEME_NAME/assets/css/very-custom.css" type="text/css" media="all" />
	{/if}

or for if you need to add a huge custom JavaScript file:

.. code-block:: Smarty

	{if $page.page_name == 'index'}
		<script type="text/javascript" src="themes/YOUR_THEME_NAME/assets/js/very-custom.js"></script>
	{/if}

Note: these examples target the homepage. You should adapt them to your needs.



With Modules
--------------

When developing a PrestaShop module, you may want to add specific styles for your templates. The way of adding assets for modules didn't change.

With a front controller
^^^^^^^^^^^^^^^^^^^^^^^^

If you develop a front controller, simply extend the `setMedia()` method. For instance:

.. code-block:: php


	public function setMedia()
	{
			$this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/bubble-popup.css');
			$this->addJS(_MODULE_DIR_.$this->module->name.'/js/bubble-popup.js');

			return parent::setMedia();
	}


Without a front controller
^^^^^^^^^^^^^^^^^^^^^^^^^^^^

If you only have your module's class, register your code on the `actionFrontControllerSetMedia` hook and add your asset on the go inside the hook:

.. code-block:: php

	public function hookActionFrontControllerSetMedia($params)
	{
		$this->context->controller->addCSS($this->_path.'css/custom-style-in-module.css', 'all');
		$this->context->controller->addJS($this->_path.'js/custom-style-in-module.js');
	}

// TODO This needs proper testing
