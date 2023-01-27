---
title: Webpack
---

# About Webpack

>	[Webpack](https://webpack.github.io/) is a module bundler.
	Webpack takes modules with dependencies and generates static assets representing those modules.

The main interest of using Webpack is that it will compile all your styles - which we advise you to write using [Sass ](https://sass-lang.com/) - into a single CSS file.
This way, your theme will make only one HTTP request for this single file, and since your browser will cache it for later re-use, it will even download this file only once.

The same goes with your JavaScript code. Instead of loading jQuery along with its community plugins, your own custom plugins and any extra code you might need,
Webpack compiles and minifies all this JavaScript code into a single file, which will be loaded once - and cached.


{{% notice note %}}
  Webpack is not at all required by PrestaShop, you are free to use your favorite tool!
  The documentation explains Webpack since it's the tool we chose for the Classic theme.
{{% /notice %}}

![Webpack](../img/webpack.png)


## Installing webpack

If you want to compile your assets using Webpack (and we advise you to), follow these steps:

1. Download and install [Node.js](https://nodejs.org/), which contains the npm tool.
2. In your command line tool, open the `_dev` folder.
3. Install npm: `npm install`.
4. You then have a choice:
  - To build your assets once, type `npm run build`.
  - To rebuild your assets every time you change a file in the _dev folder, type `npm run watch`.

## Webpack configuration

The [Webpack configuration file for Classic Theme](https://github.com/PrestaShop/classic-theme/blob/develop/_dev/webpack.config.js) is thus:

1. All CSS rules go to the `assets/css/theme.css` file.
2. All JavaScript code go to the `assets/js/theme.js` file.

It provides proper configuration for compile your Sass or CSS files into a single CSS file.

JavaScript code is written in ES6, and compiled to ES5 with [esbuild](https://github.com/privatenumber/esbuild-loader).
