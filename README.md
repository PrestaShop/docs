# PrestaShop Technical Documentation

[![Build Status](https://travis-ci.com/PrestaShop/docs.svg?branch=master)](https://travis-ci.com/PrestaShop/docs)

This documentation is available at https://devdocs.prestashop.com/

## Contributing

Contributions are more than welcome! [Find out how](https://devdocs.prestashop.com/1.7/contribute/documentation/how/).

## Rendering the site locally

### Prerequisites

#### [Hugo](https://gohugo.io/)

TL;DR:

* **Linux**: `./bin/installHugo.sh`
* **Mac**: `brew install hugo`
* **Windows**: Grab the [release binary](https://github.com/gohugoio/hugo/releases)

Or read the [Official install guide](https://gohugo.io/getting-started/installing).

#### Node.js and NPM

> This is only needed if you want to customize the style.

[Download Node here](https://nodejs.org/en/)

### Clone the repository somewhere on your system

```
git clone https://github.com/PrestaShop/docs.git
```

### Launching the site

1. Switch to the `src` directory:
    ```
    cd /path/to/docs/src
    ```

2. Launch Hugo:
    ```
    hugo server
    ```
    > You may need to change the path to the `hugo` binary depending on where it is on your system

3. Done! You can open up the site on your browser.

    > It's usually available at http://localhost:1313
    
    Any change you perform on your data will be updated almost instantly.

## Customizing the style

We use Sass for styling and Webpack for bundling.

Source files for the main css are in this directory:
```
src/themes/hugo-theme-learn/_src/sass
```

### How to build the theme

1. Switch to the theme's `_src` folder
    ```
    cd src/themes/hugo-theme-learn/_src
    ```

2. Install NPM dependencies (only the first time)
    ```
    npm install
    ```
    
3. Launch build
    ```
    npm run build
    ```

## License

Content from this documentation is licensed under the [Creative Commons Attribution-ShareAlike 4.0 International License](https://creativecommons.org/licenses/by-sa/4.0/).
