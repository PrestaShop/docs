---
title: How to compile assets
weight: 70
---

# How to compile assets

Some components in PrestaShop, like Javascript or SCSS files, need to be compiled to be usable.

## Requirements

We use [Webpack](https://webpack.js.org/) to compile assets. You only need NodeJS 8.x ([get it here](https://nodejs.org/)), NPM will take care of it all.

## Assets that need to be compiled

- Back Office  
    - Default theme
        - SASS files\
          Located in `admin-dev/themes/default/sass`
    - New theme
        - SCSS files\
          Located in `admin-dev/themes/new-theme/scss`
        - JS files\
          Located in `admin-dev/themes/new-theme/js`
- Front Office
    - Core assets
        - JS files\
          Located in `themes/_core/js`
    - Classic theme
        - SCSS files\
          Located in `themes/classic/_dev/css`
        - JS files\
          Located in `themes/classic/_dev/js`

## Compiling assets

1. Switch to the root of the subproject

    Subproject | Path
    -----------|---------
    Default theme | `cd admin-dev/themes/default/`
    New theme     | `cd admin-dev/themes/new-theme/`
    FO Core       | `cd themes/`
    Classic theme | `cd themes/classic/_dev/`
    

2. Run npm install (first time only)

    ```bash
    npm install
    ```

3. Run webpack

    ```bash
    npm run build
    ```

### Watching for changes

You can also make webpack listen for changes and compile only what's needed as you work on your files:

```bash
npm run watch
```

{{% notice warning %}}
**Rebuild your changes before committing.**

The "watch" build will optimize your assets for development. Please remember to rebuild for production when you are done using `npm run build`.
{{% /notice %}}

## Troubleshooting

If `npm install` fails with error: `Failed at the ... postinstall script.`:

You maybe using node version 9 or 10, you should use node version 8.
