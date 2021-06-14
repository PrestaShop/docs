---
title: Guidelines and coding standards
menuTitle: Guidelines
aliases:
  - /1.7/themes/guidelines/
  - /themes/prologue/index.html
weight: 1
---

# Guidelines and coding standards

## Compatibility

##### PHP Code

Your PHP code should be compatible with [PHP compatibility chart](https://devdocs.prestashop.com/1.7/basics/installation/system-requirements/#php-compatibility-chart)

##### HTML / CSS / Javascript

Your HTML/CSS/JS code should work with at least:

- Edge
- Firefox 45
- Chrome 29.

Mobile-wise:
 
- iOS 8.4
- Android Browser 4.4

## Standards

##### General

Use spaces for indentation in every language (PHP, HTML, CSS, etc.):<br>4 spaces for PHP files, 2 spaces for all other file types.

Use our [.editorconfig](https://editorconfig.org/) file in order to easily configure your editor: https://github.com/PrestaShop/PrestaShop/blob/develop/.editorconfig

##### PHP files

You should follow the [PSR-2 standard](https://www.php-fig.org/psr/psr-2/), just like PrestaShop does.

In general, we tend to follow the [Symfony coding standards](https://symfony.com/doc/current/contributing/code/standards.html).

##### HTML files

Use HTML 5 tags:

* `<br />` → `<br>`
* `<nav>`
* `<section>`
* etc.

All open tags must be closed in the same file (a `<div>` should not be opened in `header.tpl` then closed in `footer.tpl`). Subtemplates (templates meant to be included in another template) must reside inside a `/_partials/` folder.

##### CSS files

Use CSS3.

We recommend that you follow the [RSCSS structure](https://rscss.io/)

##### Javascript

Make sure your linter tool follows our .eslint file: https://github.com/PrestaShop/PrestaShop/blob/develop/.eslintrc

If you wish to write ECMAScript 2015 (ES6) code, we recommend using the [Babel compiler](https://babeljs.io/) to maximize compatibility.

A good JS practice consists in splitting files per use, and then compiling them into one.

Learn more about the ES2015 standard: https://babeljs.io/docs/learn-es2015/
