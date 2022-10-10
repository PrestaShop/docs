---
title: UIKit
weight: 70
---

# What's the PrestaShop UIKit?

The UIKit is a project extending Bootstrap 4 in order to provide some components with PrestaShop's colors. You can see every component on [this page](https://build.prestashop-project.org/prestashop-ui-kit/).

## How do we use the UIKit?

We use it by adding it into our [npm dependency](https://www.npmjs.com/package/prestakit), and then you've multiple possibilities to use it.

- You can import dist files, it means that you won't be able to use our variables outside of the UIKit.

```
@import "~prestakit/dist/css/bootstrap-prestashop-ui-kit";
```

- You are able to import source files, it means that you'll need to rebuild the UIKit inside your own styling architecture, but you'll be able to use every variables inside it.

```
@import "~prestakit/scss/application";
```

## Custom components

Some components are not provided from Bootstrap, they have been done for our own use, here is a list of them:

- ps-number-input
- custom-file-input
- growl (using jquery growl)
- ps-tags
- spinner
- ps-switch
- switch-input
- md-checkbox
- toast

## Where is the UIKit used?

It's mainly used on migrated pages, legacy pages rely on Bootstrap 3 for the moment and are not using UIKit at all. UIKit can also be used inside modules, even if they are on legacy pages, by overriding styles inside their particular markup.

## How to contribute?

You can contribute to UIKit on [its own repository](https://github.com/PrestaShop/prestashop-ui-kit) but keep in mind that your changes won't be effective until we provide a new release on npm and your changes won't be effective on the PrestaShop project until we update the dependency inside the new-theme directory.
