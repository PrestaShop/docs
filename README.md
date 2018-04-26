# PrestaShop Technical Documentation

## Prerequisites

### [Hugo](https://gohugo.io/)

Install guide: https://gohugo.io/getting-started/installing

TL;DR:

* **Linux**: Use the binary in the `/bin` directory
* **Mac**: `brew install hugo`
* **Windows**: Grab the [release binary](https://github.com/gohugoio/hugo/releases)

### Node.js and NPM

This is only needed if you want to customize the style.

[Download Node here](https://nodejs.org/en/)

## Running the site locally

1. Switch to the `src` directory
    ```
    cd src
    ```

2. Launch Hugo
    ```
    hugo serve
    ```

3. Done! You can open up the site on your browser

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
