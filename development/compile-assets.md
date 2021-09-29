---
title: How to compile assets
weight: 70
---

# How to compile assets

Some components in PrestaShop, like Javascript or SCSS files, need to be compiled to be usable.

## Requirements

PrestaShop uses [Webpack](https://webpack.js.org/) to compile assets, which requires NodeJS ([get it here](https://nodejs.org/)).

You will need a different NodeJS version depending on the PrestaShop version you're working with:

| PrestaShop Versions | NodeJS Versions | NPM Versions |
|---------------------|-----------------|--------------|
| 1.7.0~1.7.6         | 8.x             | 5.x          |
| 1.7.7               | 10.x            | 6.x          |
| 1.7.8               | 12.x and 14.x   | 6.x          |


If you are struggling to compile assets, you might be using the wrong NodeJs version. We strongly recommend you to use a version manager such as ['n'](https://www.npmjs.com/package/n) or [nvm](https://github.com/nvm-sh/nvm) so you can easily switch between NodeJS versions.

On Windows, you'll probably need to install `windows-build-tools` using `npm i --global windows-build-tools` in order to [make node-gyp work](https://github.com/nodejs/node-gyp#on-windows).

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

   | Subproject    | Path                             |
   | ------------- | -------------------------------- |
   | Default theme | `cd admin-dev/themes/default/`   |
   | New theme     | `cd admin-dev/themes/new-theme/` |
   | FO Core       | `cd themes/`                     |
   | Classic theme | `cd themes/classic/_dev/`        |

2) Run npm install (first time only)

   ```bash
   npm install
   ```

3) Run webpack

   ```bash
   npm run build
   ```

### Build all assets at once

{{< minver v="1.7.6" title="true" >}}

You can rebuild all the assets at once by executing this command from the project root:

```bash
./tools/assets/build.sh
# or alternatively, since 1.7.8:
make assets
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

You may be using an old version or one we don't support yet. Currently on 1.7.8, every folders containing a package.json is compatible with node 12.
How we manage to work with this, as well as working on previous PrestaShop version, is that we use a tool to easily swap between node version.

There are a lot of tools able to do this. At PrestaShop, we mainly use the ['n' package](https://www.npmjs.com/package/n?activeTab=versions) or [nvm](https://github.com/nvm-sh/nvm).
This is pretty easy to use, when you are working on a directory which need an older or newer node version, use one of these tools to switch and then `npm install && npm run build`.
