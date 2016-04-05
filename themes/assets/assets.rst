****************
Asset Management
****************

PrestaShop 1.7 has significantly improved the way assets are managed. Especially because PrestaShop
ships with some configuration files taht we will help you setup your talk runner (webpack).

Modules can add css and js files the same was as PrestaShop 1.6.

Load:

1. theme.css
1. custom.css
1. rtl.css (if rtl language detected)

1. core.js
1. theme.js
1. custom.js

Webpack
=========================

	webpack is a module bundler.
	webpack takes modules with dependencies and generates static assets representing those modules.

The point is that you will compile all your styles - probably written in Sass - into one single CSS file.
Then your theme style will make only on HTTP request and because your browser will cache it,
you will even donwload this file only once.

The same goes with your JavaScript. Instead of loading jQuery + community plugins + custom plugin + extra code,
you will compile (and minify) all JavaScript code into a single file.

IMG


[NOTE]
CCC as you know in PrestaShop hasnt changed yet, it should be redone tho.


Installing webpack
-----------------------

If you want to use it (and you should), follow these steps:Copyright (c) 2015 Copyright Holder All Rights Reserved.

* install nodejs
* go in the `_dev` folder
* run `npm install`
* then use `npm run watch` or `npm run build` to build your assets once or on change.


webpack configuration
---------------------------------

1. All styles goes to `assets/css/theme.css`
1. All js goes to `assets/js/theme.js`

We provide configuration for sass compilation for styles, Javascript is written in ES6 and compile to ES5 with babel.

PNG ? svg ?

There are 2 custom commands you can run `npm run build` and `npm run watch`, to build your assets once or on change.

If you want to use stylus or less, simple edit the command line under the "scripts" section.

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
	            {test: /\.js$/     , loaders: ['babel-loader']},
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


With webpack (theme-wide)
----------------------------

todo


Without webpack (theme-wide)
-----------------------------

All PrestaShop 1.7 themes have an empty by default `assets/css/custom.css` file.

If you need to make small modifications, like change the color of the text and such, you
can add your style in this file. It's loaded after `theme.css`. Also if you don't want to
use webpack you can import other css files in this one like

.. code-block:: CSS

	@import './other-css-file.css';

[NOTE]
This is not recommended, please use webpack

The same way goes wit JavaScript, see `assets/js/custom.js`


With HTML (page-specific)
---------------------------

Maybe you need to load a very custom css file on some pages. If you have a 1Mo of CSS dedicated to a widget/infography/map/section for example, you may not want to add it to webpack.

Then open `templates/_partials/head.tpl` and add something similar to the following code. (example given for home page)

.. code-block:: Smarty

	{if $page.page_name == 'index'}
		<link rel="stylesheet" href="themes/YOUR_THEME_NAME/assets/css/very-custom.css" type="text/css" media="all" />
	{/if}

or for JavaScript

.. code-block:: Smarty

	{if $page.page_name == 'index'}
		<script type="text/javascript" src="themes/YOUR_THEME_NAME/assets/js/very-custom.js"></script>
	{/if}



With Modules
--------------

When developing a module, you may want to add specific styles for your templates. The way of adding assets for modules didnt change

With a front controller
^^^^^^^^^^^^^^^^^^^^^^^^

If you develop a front controller, simply extend the `setMedia()` method like

.. code-block:: php


	public function setMedia()
	{
			$this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/bubble-popup.css');
			$this->addJS(_MODULE_DIR_.$this->module->name.'/js/bubble-popup.js');

			return parent::setMedia();
	}


Without a front controller
^^^^^^^^^^^^^^^^^^^^^^^^^^^^

If you only have your module class, register on actionFrontControllerSetMedia and add ur asset on the go inside the hook

.. code-block:: php

	public function hookActionFrontControllerSetMedia($params)
	{
		$this->context->controller->addCSS($this->_path.'css/custom-style-in-module.css', 'all');
		$this->context->controller->addJS($this->_path.'js/custom-style-in-module.js');
	}

[NOTE] A tester lol
