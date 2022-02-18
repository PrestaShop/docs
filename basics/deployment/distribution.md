---
title: Creating your own distribution
weight: 35
---

# Creating your own PrestaShop distribution

A release is a build package which includes external libaries, static assets (like compiled javascript files) and modules.

A distribution is a special release that you can build with your own specific modules.

## Why create a distribution?

If you usually include (or exclude) modules in your PrestaShop deployments, creating your own distribution will allow you to save time when installing PrestaShop for your users. Any extra module bundled in the distribution will be installed and enabled automatically during PrestaShop's installation.

## How to create your distribution

The build process is described in [How to create a release][create-release].

To include modules in your distribution, put them in the `modules/` folder before you begin the build process. They will be bundled in the resulting package.

During the install process, every module inside `modules/` folder will be installed. Be careful to test that your module is compatible with this step.

[create-release]: {{< ref "/8/project/maintainers-guide/releasing-prestashop/create-build.md" >}}
