---
title: Introduction
weight: 1
---

# Introduction

## Technical principles behind a module

A PrestaShop module consists of a main PHP file with as many other PHP
files as needed, as well as the necessary template (`.tpl`) files and
assets (images, JavaScript, CSS, etc.) to display the module's
interface, whether to the customer (on the front office) or to the
merchant (on the back office).

Any PrestaShop module, once installed on an online shop, can interact
with one or more "hooks". Hooks enable you to hook/attach your code to
the current View at the time of the code parsing (i.e., when displaying
the cart or the product sheet, when displaying the current stock, etc.).
Specifically, a hook is a shortcut to the various methods available from
the `Module` object, as assigned to that hook.

## Modules' operating principles

Modules are the ideal way to let your talent and imagination as a
developer express themselves, as the creative possibilities are many and
you can do pretty much anything with PrestaShop's module API.

Modules can:

- Extend or modify existing PrestaShop features, like adding a field in a form, a block of text, or an independent component — without modifying PrestaShop's files. This allows merchants to update their shops without requiring to apply your changes again.
- Add new fully independent features (e.g. a new screen).
- Perform a task (like batch update, import, export...)
- Facilitate [interactions between the shop and external services]({{< relref "creation/external-services" >}}).
- Be made as configurable as necessary (the more configurable it is, the more likely it will be able to address the needs of a wider range of users).
- ...and much, much more!

## Main differences between 1.6 and 1.7 modules

PrestaShop 1.7 was built so that modules that were written for PS 1.6 can work almost as-is — save for minor changes and a cosmetic update, the template files being in need of adapting to the 1.7 default theme.

The major module development changes in PrestaShop 1.7 are explained in details [in this Build article](https://build.prestashop-project.org/news/module-development-changes-in-17/), and are integrated into this updated documentation. If you already know how to create a module that works with PS 1.6, we strongly advise you to read that article from top to bottom in order to get up to speed with 1.7 development.

Some native modules have had their names changed in PrestaShop 1.7. [See the full list here]({{< ref "/8/development/native-modules/_index.md#module-name-changes-since-16" >}}).

## Modules folder

PrestaShop's modules are found in the `modules` folder, located at the root of the PrestaShop main folder. This is true for both native modules (provided with PrestaShop) and any 3rd-party modules that are subsequently installed.

Modules can also be part of a theme if they are really specific to it. In that case, they would be located within the theme's own `modules` folder: `/themes/[my-theme]/modules`

Each module has its own sub-folder inside the `modules` folder: `/bankwire`, `/birthdaypresent`, etc.
