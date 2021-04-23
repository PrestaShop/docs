# PrestaShop Technical Documentation

[![Build](https://github.com/PrestaShop/docs/actions/workflows/build.yml/badge.svg)](https://github.com/PrestaShop/docs/actions/workflows/build.yml)

This documentation is available at https://devdocs.prestashop.com/

## Contributing

Contributions are more than welcome! [Find out how](https://devdocs.prestashop.com/1.7/contribute/documentation/how/).

## Rendering the site locally

### By `docker-compose`

1. Clone the repository somewhere on your system:
    ```
    git clone https://github.com/PrestaShop/docs.git
    ```

2. Switch to the `docs` directory:
    ```
    cd docs
    ```

3. Create `.env` file by `.env.example`:
    ```
    cp .env.example .env
    ```

4. Launch Hugo service:
    ```
    docker-compose up hugo
    ```

### Natively

#### Prerequisites

##### [Hugo](https://gohugo.io/) v0.82+

TL;DR:

* **Mac and Linux**: `./bin/installHugo.sh`
* **Windows**: Grab the [release binary](https://github.com/gohugoio/hugo/releases)

Or read the [Official install guide](https://gohugo.io/getting-started/installing).

##### Node.js and NPM

> This is only needed if you want to customize the style.

[Download Node here](https://nodejs.org/en/)

#### Clone the repository somewhere on your system

```
git clone https://github.com/PrestaShop/docs.git
```

#### Launching the site

1. Switch to the `src` directory:
    ```
    cd /path/to/docs/src
    ```

2. Launch Hugo:
    ```
    hugo server
    ```
    > You may need to change the path to the `hugo` binary depending on where it is on your system


## Customizing the style

We use Sass for styling and Webpack for bundling.

Source files for the main css are in this directory:
```
src/themes/hugo-theme-learn/_src/sass
```

### How to build the theme

#### By `docker-compose`

1. Install NPM dependencies (only the first time)
    ```
    docker-compose run --rm npm install
    ```
    
2. Launch build
    ```
    docker-compose run --rm npm run build
    ```

#### Natively

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

#### Launch website

You can open up the site on your browser

    > It's usually available at http://localhost:1313
    
    Any change you perform on your data will be updated almost instantly.
    
## License

Content from this documentation is licensed under the [Creative Commons Attribution-ShareAlike 4.0 International License](https://creativecommons.org/licenses/by-sa/4.0/).
