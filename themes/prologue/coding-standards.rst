Coding standard and guidelines
================================

General code guideline
~~~~~~~~~~~~~~~~~~~~~~

Intend with spaces for every language (PHP, HTML, CSS, etc.): 4 spaces for PHP files, 2 spaces for all other filetypes.

Use our `.editorconfig file <http://editorconfig.org/>`_  in order to easily configure your editor: https://github.com/PrestaShop/PrestaShop/blob/develop/.editorconfig


PHP files
~~~~~~~~~

You should follow the `PSR-2 standard <http://www.php-fig.org/psr/psr-2/>`_, just like PrestaShop does.

In general, we tend to follow `Symfony's coding standards <http://symfony.com/doc/current/contributing/code/standards.html>`_.


HTML file
~~~~~~~~~

Use HTML 5 tags:

* <br /> --> <br>,
* <nav>,
* <section>,
* etc.

All open tags must be closed in the same file (a <div> should **not** be opened in ``header.tpl`` then closed in ``footer.tpl``).
Subtemplates (templates meant to be included in another template) must reside inside a ``/_partials/`` folder.


CSS
~~~

Use CSS3.

We recommend that you follow the RSCSS structure: http://rscss.io/


JavaScript
~~~~~~~~~~

Make sure your linter tool follows our .eslint file: https://github.com/PrestaShop/PrestaShop/blob/develop/.eslintrc

If you wish to write ECMAScript 2015 (ES6) code, we advise you to use the Babel compiler: https://babeljs.io/

A good JS practice consists in splitting files per use, and then compiling them into one.

Learn more about the ES2015 standard: https://babeljs.io/docs/learn-es2015/
