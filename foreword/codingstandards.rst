Coding Standards
========================

Consistency is important, even more so when writing open-source code, since the
code belongs to millions of eyeballs, and bug-fixing relies on these teeming millions
to actually locate bugs and understand how to solve it.

This is why, when writing anything for PrestaShop, be it a theme, a module or a
core patch, you should strive to follow the following guidelines. They are the ones
that the PrestaShop developers adhere to, and following them is the surest way to
have your code be elegantly integrated in PrestaShop.



In short, having code consistency helps keeping the code readable and maintainable.


Starting with version 1.6.1.0, the PrestaShop Core codebase has switched to the
`PSR-1 coding standard`_ and `PSR-2 coding style guide`_. See the reasons why on the
`announcement article`_ on the Build PrestaShop deblog.

Existing modules and themes are not required to switch to PSR-1 and PSR-2.
PrestaShop's own modules and any newly-created community module are expected to adopt these guidelines.

If you want to update your PHP code to the PSR-1 and PSR-2 guidelines, you can use the
`PHP Coding Standards Fixer`_, which fixes most issues automatically.

For reference's sake, the old PrestaShop coding standards is kept in this page:
`Pre-PrestaShop 1.6.1.0 PHP Coding Standards`_. Please do not use it anymore!


.. note::

  As of May 10th, 2016, our chosen standards were further detailed. `Read the announcement article`_.

Here are the standards, conventions and guidelines that we choose to follow as
of May 10th, 2016 (for PrestaShop 1.6.1.5+ and PrestaShop 1.7):

* PHP code
  We keep `PSR-1`_ and `PSR-2`_, along with `a few nice details from Symfony`_.
* JavaScript code
  We choose to follow the Airbnb `JavaScript Style Guide`_.
* HTML & CSS code
  We choose to follow the `Mark Otto's coding standards`_. Mark is the creator of `the Bootstrap framework`_.
* Smarty / Twig code
  Same standards as with HTML & CSS.
* Commits & Pull-requests conventions
  `We choose to formalize best practices`_.
* SQL guidelines
  `Same as with PrestaShop 1.6`_.


About the code validator (PHP CodeSniffer)
==========================================

The CodeSniffer configuration file is not yet available. Thank you for your patience!


.. _PSR-1 coding standard: http://www.php-fig.org/psr/psr-1/
.. _announcement article: http://build.prestashop.com/news/prestashop-moves-to-psr-2/
.. _PSR-2 coding style guide: http://www.php-fig.org/psr/psr-2/
.. _Pre-PrestaShop 1.6.1.0 PHP Coding Standards: http://doc.prestashop.com/display/PS16/Pre-1.6.1.0+PHP+Coding+Standards
.. _PHP Coding Standards Fixer: https://github.com/FriendsOfPHP/PHP-CS-Fixer/tree/master
.. _Read the announcement article: http://build.prestashop.com/news/prestashop-coding-standards/
.. _PSR-1: http://www.php-fig.org/psr/psr-1/
.. _PSR-2: http://www.php-fig.org/psr/psr-2/
.. _a few nice details from Symfony : http://symfony.com/doc/current/contributing/code/standards.html
.. _JavaScript Style Guide : https://github.com/airbnb/javascript
.. _`Mark Otto's coding standards`: http://codeguide.co/
.. _the Bootstrap framework: http://getbootstrap.com/
.. _We choose to formalize best practices: http://doc.prestashop.com/pages/viewpage.action?pageId=51183718
.. _Same as with PrestaShop 1.6 : http://doc.prestashop.com/display/PS16/SQL+Guidelines
