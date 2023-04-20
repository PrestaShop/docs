---
title: Upgrade Module internal behavior
weight: 20
aliases:
  - /8/development/upgrade-module/upgrade-module-internal-behavior
---

# Upgrade module internal behavior

## Entrypoints

The upgrade module aims to be a PrestaShop module AND be as independent as possible. Which means its content can be reached from several way:

- **autoupgrade.php**

This file is used to manage the module part of the project: installation, uninstallation, then automatic redirection to the next file.

- **AdminSelfUpgrade.php**

This controller uses the AdminController features from PrestaShop. It allows the upgrade configuration to be displayed in the back office. The merchant will see the configuration options.

In previous versions it was used to handle everything, displaying answers, handle and dispatching requests... 
In the latest version, its responsibilities were restricted, which should be displaying the configuration page.

- **ajax-upgradetab.php**

This file is called from ajax requests. This is the only file responsible of the initialization and upgrade / rollback steps. This file is not a PrestaShop controller for stability reasons during upgrade/rollback processes.

- **cli-upgrade.php**

This is the equivalent of `ajax-upgradetab.php` file for CLI calls. It will instantiate some specific features to the CLI, like a logger displaying informations on the fly. This entrypoint is also useful for testing, or for a user who does not want to use the web version.

## What version to use

The objective is to have a single module version to handle these PrestaShop upgrades:

- 1.7.x >> to >> 1.7.y
- 1.7 >> to >> 8.x

The other versions are not supported anymore. We recommend to use the previous versions of the module [available on GitHub](https://github.com/PrestaShop/autoupgrade/releases/tag/v4.12.0).

## Technical choices

### Compatibility with PrestaShop 1.7 & 8

Aim is to help as many merchants as possible to upgrade from 1.7 to 8. This required to do the following implementation choices:

- **Twig as template engine**

Even if Smarty is still provided by the core, it was decided to use an independent engine template.

This makes sure than replacing the core template engine won't break the module later.

- **Core classes avoided**

Dependencies between the core and the module are limited, because the upgrade will modify classes the modules might need, it is important to avoid relying on them.

A 100% independent module would be great, but because some features absolutely need the core, it is not achievable. So it was tried to avoiding, when possible, using the core logic. This is mainly until the UpgradeDb step, in order to avoid some undefined methods coming from the new files.

- **Separate requests**

The best compromise was to separate requests (even the CLI one) in several steps.

By doing so, a new fresh core can be started with its updated classes.

The class Upgrade was introduced to the core around version 1.7.1.0.

- **Interface still unfriendly**

So far the main objective has been to make the PHP code easier to understand and improve the robustness of the upgrade process where possible. The interface will be improved in future releases to be more user-friendly.

## New module structure

Most of the PHP classes in `classes` folder are mainly logic extracted from AdminSelfUpgrade, the class that was responsible of everything in previous versions. It has been split in smaller parts.

Classes are gathered by responsibilities:

- All classes responsible of the display (Twig related)
- Classes used for the module to work
- Classes interacting with PrestaShop core
- Tasks (Can be considered as controllers for upgrade, rollback etc.)

## Local temporary assets

In order to work properly, the upgrade module needs to write some files to your filesystem server. These files are stored in the following folders, all available in the `<admin folder>/autoupgrade` path.

### Folders

- `backup`: Folder in which the current state of the shop will be saved before upgrade. It contains files archive, DB structure & data.
- `download`: Destination folder of the downloaded PrestaShop archive, before unzip.
- `latest`: Working directory of the autoupgrade. This is where the "lastest" version of PrestaShop will be unziped, before copy.
- `tmp`: Temporary resources not specifically used for upgrade. For instance, logs will be stored in that folder.
