****************
Asset Management
****************

PrestaShop 1.7 has significantly improved the way assets (CSS, JavaScript and image file) are managed. This is due to the fact that PrestaShop
ships with some configuration files that we will help you set up your Webpack task runner.

Modules can add CSS and JavaScript files the same way they did in PrestaShop 1.6.

Every module loads the following files:

1. theme.css
2. custom.css
3. rtl.css (if a right-to-left language is detected)
4. core.js
5. theme.js
6. custom.js


About Webpack
=========================

	Webpack is a module bundler.
	Webpack takes modules with dependencies and generates static assets representing those modules.

The main interest in using Webpack is that it will compile all your styles - which you probably have written in Sass - into one single CSS file.
This way, your theme will make only one HTTP request for this single file, and since your browser will cache it for later re-use,
it will even donwload this file only once.

The same goes with your JavaScript. Instead of loading jQuery along with its community plugins, you own custom plugins and any extra code you might need,
Webpack will compile and minify all this JavaScript code into a single file, which will be loaded once.

// TODO IMG


[NOTE]
PrestaShop's Combine, Compress and Cache feature (CCC) hasn't yet been update to take this into account. Don't worry, it should be redone soon.


Installing webpack
-----------------------

If you want to use Webpack (and we advise you to), follow these steps:

* Install Node.js
* Go in the `_dev` folder
* Run `npm install`
* Use `npm run watch` to build your assets once, `npm run build` to build them automatically with each change


Webpack configuration
---------------------------------

1. All CSS rules go to the `assets/css/theme.css` file.
2. All JavaScript code go to the `assets/js/theme.js` file.

We provide configuration for Sass compilation for styles. JavaScript code is written in ES6, and compiled to ES5 with Babel.

// TODO PNG ? svg ?

There are 2 custom commands you can run to build your assets once or everytime something changes: `npm run build` and `npm run watch`.

If you want to use Stylus or Less, simply edit the command line under the "scripts" section.

.. code-block:: json

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
This is not recommended, please use webpack

All of PrestaShop 1.7's themes have a `assets/css/custom.css` file, which is empty by default.
We advise you to add your custome CSSrules in this file if you need to make small modifications, like changing the color of the text and such. It's loaded after the `theme.css` file. 

Also if you don't want to use Webpack, you can import other CSS files in `custom.css`, for instance:

.. code-block:: CSS

	@import './other-css-file.css';

The same way goes with custom JavaScript code, with the `assets/js/custom.js` file.


With HTML (page-specific)
---------------------------

There might situation when you need to load a very custom CSS file on some specific pages (but on all of the site's pages). If you have 1 Mb of CSS dedicated to a widget/infographic/map/advanced section for example, you may not want to add it to Webpack.

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
    
Note: these examples target the homepage. Adapt them to your needs.



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
