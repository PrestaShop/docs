# PrestaShop Technical Documentation

[![Build](https://github.com/PrestaShop/docs/actions/workflows/build.yml/badge.svg)](https://github.com/PrestaShop/docs/actions/workflows/build.yml)

This documentation is available at https://devdocs.prestashop.com/

## Contributing

Contributions are more than welcome! [Find out how](https://devdocs.prestashop.com/1.7/contribute/documentation/how/).

## Rendering the site locally

### Using `docker-compose`

1. Clone the repository somewhere on your system:
    ```
    git clone --recurse-submodules https://github.com/PrestaShop/docs.git
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

#### Setting up your environment

1. Install [Hugo](https://gohugo.io/). You will need v0.82+ (extended binary)
   
   * **Mac and Linux**: Run `./bin/installHugo.sh`
   * **Windows**: Grab the [release binary](https://github.com/gohugoio/hugo/releases)
   
   Or read the [Official install guide](https://gohugo.io/getting-started/installing).

2. Clone the repository somewhere on your system
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

3. Done! You can open up the site on your browser.

    > It's usually available at http://localhost:1313
    
    Any change you perform on your data will be updated almost instantly.


## Customizing the style

We use Sass for styling, bundled by Hugo itself.

The source files for the main css & js are in [the `assets` directory of the theme's repository](https://github.com/PrestaShop/ps-docs-theme/tree/main/assets).

## License

Content from this documentation is licensed under the [Creative Commons Attribution-ShareAlike 4.0 International License](https://creativecommons.org/licenses/by-sa/4.0/).
