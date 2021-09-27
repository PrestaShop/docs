---
title: Creating your own distribution
weight: 35
---

# Creating you own PrestaShop distribution

A release is a build package with dependencies, assets and modules.

A distribution is a special release that you can build with your own specific modules.

## Why ?

The interest of creating your own distribution is that allows you to win some time when installing PrestaShop on your servers as you have already some modules already in you build package.

## How ?

For creating your own distribution, you must [create a release][create-release].

### Modules

If you want to embed some specific modules in your distribution, add them directly in the folder `modules/`. They will be automatically added to the build package and installed (and enabled) when you install your PrestaShop.

[create-release]: {{< ref "/1.7/project/maintainers-guide/releasing-prestashop/create-build.md" >}}