---
title: Overriding selectors
aliases:
  - /1.7/themes/overriding_selectors/
---

# Overriding selectors

When you write a theme, you often need to change the markup, but if you do this, you'll encounter some problems because core's and classic's javascript use some class in order to work.

Two selectors maps are available since `1.7.8` one on the core side `(/themes/_core/js/selectors.js)` and another one inside the classic theme `(/themes/classic/_dev/js/selectors.js)`.

That means that almost every selectors we use inside every JS files are inside these two files.

You can easily update these mapping because these 2 files send an event on dom ready : `selectorsInit` for the core mapping file, and `themeSelectorsInit` for the classic theme.
Also, if you place your file without these events, you need place it after the core/theme js bundle, it will work as it would with the event.

These selectors are mapped inside the `prestashop` object. That means that if you attach a method which override the `prestashop.selectors` or `prestashop.themeSelectors` object, you'll be able to change a lot of markup if you manage to override every selectors properly.
