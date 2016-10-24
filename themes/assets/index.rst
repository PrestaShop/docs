****************
Asset Management
****************

PrestaShop 1.7 has significantly improved the way assets (CSS, JavaScript and image files) are managed.


We advise theme developer to compile most of there style and javascript into a single concatenated minified file
(see below the webpack section).
If you need to add special assets, for example an extra javacript library on the home or product page, there are a few
ways to do so.



Registering assets
=======================

In PrestaShop 1.7+, it's easy to register custom assets on each pages. The major improvement
is that you can easily manage it from your theme, without any modules.

We introduced new method to register assets and especially new cool options.

For instance you can register specifically your in the head or bottom, you can load it
with attributes like ``async`` or ``defer`` and you can even inline it easily.

My favorite option is the priority one, which makes it very easy to ensure everything is loaded in
the order you need.

.. note::

  Backward compatibility is kept for ``addJS``, ``addCSS``, ``addJqueryUI`` and ``addJqueryPlugin`` also
  now is the best time to update your libraries and use the new method.


Here is a list of option and what they do.


Options
-------------------------------

PrestaShop FrontController class provide 2 new methods ``registerStylesheet`` and ``registerJavascript``
to easily register new assets.

In order to have the most extensible signature, these 2 methods take 3 arguments. The
first one is the unique ID of the asset, the second one is the relative path and the third one
is an array of all other optonal parameters, described below.

**ID**

This unique identitier needed for each asset. This is useful to either override or unregister something
already loaded by the core or a native module.

**Relative path**

This is the path of your asset. In order to make your assets fully overridable and compatible
with parent/child feature you need to provide the path from the theme root directory
or the prestashop root directory if it's a module.

For example:

* 'assets/css/example.css' for something in your theme
* 'modules/modulename/css/example.cs' for something in your module

**Extra parameters for stylesheet**

+-----------+-------------------------------------+---------------------------------------------------------------+
| Name      | Values                              | Comment                                                       |
+-----------+-------------------------------------+---------------------------------------------------------------+
| media     | all|braille|embossed|handheld|      | no comment.                                                   |
|           |   print|projection|screen|speech|   |                                                               |
|           |   tty|tv (default: all)             |                                                               |
+-----------+-------------------------------------+---------------------------------------------------------------+
| priority  | 0-999 (default: 50)                 | 0 is the highest priority                                     |
+-----------+-------------------------------------+---------------------------------------------------------------+
| inline    | true|false (default: false)         | If true, your style will be printed inside ``<style>``        |
|           |                                     | inside your html ``<head>``. Use with caution.                |
+-----------+-------------------------------------+---------------------------------------------------------------+


**Extra parameters for javascript**

+-----------+-------------------------------------+---------------------------------------------------------------+
| Name      | Values                              | Comment                                                       |
+-----------+-------------------------------------+---------------------------------------------------------------+
| position  | head|bottom (default: bottom)       | JavaScript files should be loaded in the bottom as much as    |
|           |                                     | possible. Remember core.js is loaded first thing in the       |
|           |                                     | bottom so jQuery won't be loaded in the <head> part.          |
+-----------+-------------------------------------+---------------------------------------------------------------+
| priority  | 0-999 (default: 50)                 | 0 is the highest priority                                     |
+-----------+-------------------------------------+---------------------------------------------------------------+
| inline    | true|false (default: false)         | If true, your style will be printed inside                    |
|           |                                     | ``<script type="text/javascript">`` tags inside your html.    |
|           |                                     | Use with caution.                                             |
+-----------+-------------------------------------+---------------------------------------------------------------+
| attribute | async|defer|none (default: none)    | Load javascript file with the corresponding attribute         |
|           |                                     | (Read more: `Async vs Defer attributes`_)                     |
+-----------+-------------------------------------+---------------------------------------------------------------+


Registered by the core
-------------------------------

Every page of every theme load the following files:

* theme.css
* custom.css
* rtl.css (if a right-to-left language is detected)

* core.js
* theme.js
* custom.js

+---------------+-----------------+-----------+-------------------------------------------------------------------+
| Filename      | ID              | Priority  | Comment                                                           |
+---------------+-----------------+-----------+-------------------------------------------------------------------+
| theme.css     | theme-main      | 0         | Most (all?) of your theme style. Should be minified.              |
+---------------+-----------------+-----------+-------------------------------------------------------------------+
| rtl.css       | theme-rtl       | 900       | Loaded only for Right-To-Left language                            |
+---------------+-----------------+-----------+-------------------------------------------------------------------+
| custom.css    | theme-custom    | 1000      | Empty file loaded at the very end to allow user to override       |
|               |                 |           | some simple style.                                                |
+---------------+-----------------+-----------+-------------------------------------------------------------------+
| core.js       | corejs          | 0         | Provided by PrestaShop. Contains Jquery2, dispatches prestashop   |
|               |                 |           | events and holds PrestaShop logic.                                |
+---------------+-----------------+-----------+-------------------------------------------------------------------+
| theme.js      | theme-main      | 50        | Most of your theme javascript. Should embed lib required on       |
|               |                 |           | all pages and be minified.                                        |
+---------------+-----------------+-----------+-------------------------------------------------------------------+
| custom.js     | theme-custom    | 1000      | Empty file loaded at the very end to allow user to                |
|               |                 |           | override behavior or add simple script.                           |
+---------------+-----------------+-----------+-------------------------------------------------------------------+




Registering in themes
------------------------------

By now you probably understood that this theme.yml file became the heart of PrestaShop themes.

To register assets, ceate a new key ``assets`` at the top level of your theme.yml, the register
your files according to your needs. Page identifier are based on the ``php_self`` property of
each controller (`example`_)


For example, if you want to add an external library on each page and a custom lib on the
product page:

.. code-block:: yaml

  assets:
    css:
      product:
        - id: product-extra-style
          path: assets/css/product.css
          media: all
          priority: 100
    js:
      all:
        - id: this-cool-lib
          path: assets/js/external-lib.js
          priority: 30
          position: bottom
      product:
        - id: product-custom-lib
          path: assets/js/product.js
          priority: 200
          attribute: async



Registering in modules
----------------------------

When developing a PrestaShop module, you may want to add specific styles for your templates.
The best way is to use the 2 method ``registerStylesheet`` and ``registerJavascript`` provided
by the parent FrontController class.


.. note::

  If you're developing a custom module that only works your themes, don't put any style or JS
  inside the module and put them in the theme files instead (theme.js and theme.css).



With a module front controller
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

If you develop a front controller, simply extend the `setMedia()` method. For instance:

.. code-block:: php

    public function setMedia()
    {
        parent::setMedia();

        if ('product' === $this->php_self) {
            $this->registerStylesheet(
                'module-modulename-style',
                'modules/'.$this->module->name.'/css/modulename.css',
                [
                  'media' => 'all',
                  'priority' => 200,
                ]
            );

            $this->registerJavascript(
                'module-modulename-simple-lib',
                'modules/'.$this->module->name.'/js/lib/simple-lib.js',
                [
                  'priority' => 200,
                  'attribute' => 'async',
                ]
            );
        }
    }


Without a front controller
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

If you only have your module's class, register your code on the `actionFrontControllerSetMedia` hook and
add your asset on the go inside the hook:


.. code-block:: php

    public function hookActionFrontControllerSetMedia($params)
    {
        // Only on product page
        if ('product' === $this->context->controller->php_self) {
            $this->context->controller->registerStylesheet(
                'module-modulename-style',
                'modules/'.$this->name.'/css/modulename.css',
                [
                  'media' => 'all',
                  'priority' => 200,
                ]
            );

            $this->context->controller->registerJavascript(
                'module-modulename-simple-lib',
                'modules/'.$this->name.'/js/lib/simple-lib.js',
                [
                  'priority' => 200,
                  'attribute' => 'async',
                ]
            );
        }

        // On every pages
        $this->context->controller->registerJavascript(
            'google-analytics',
            'modules/'.$this->name.'/ga.js',
            [
              'position' => 'head',
              'inline' => true,
              'priority' => 10,
            ]
        );
    }





Unregistering
------------------

That's the whole point of an id, you can unregister assets. For exemple if you want to improve
your theme/module compatibility with a module, you can unregister it's assets and handle it
your self.

Let's say you want to be fully compatible with a popular navigation module. You will create template
override of course but you could also remove the style that come with it and
bundle your specific style in your ``theme.css`` (since it's loaded on everypage).

To unregister an assets you need ot know it's ID.


In themes
^^^^^^^^^^^^^^^^^^^^

As of today the only to unregister an assets without any module is to place an
empty file where the module override would be.

If the module registers a javascript file placed in ``views/js/file.js`` you simply need
to create an empty file in ``modules/modulename/views/js/file.js``.

It works for both JS and CSS.


In modules
^^^^^^^^^^^^^^^^^^^^

Both methods ``unregisterJavascript`` and ``unregisterStylesheet`` take only one argument:
the unique ID of the resource you want to remove.


.. code-block:: php

    // In a front controller
    public function setMedia()
    {
        parent::setMedia();

        $this->unregisterJavascript('the-identifier');
    }

    // In a module class
    public function hookActionFrontControllerSetMedia($params)
    {
      $this->context->controller->unregisterJavascript('the-identifier');
    }





.. include:: webpack.rst




.. _example: https://github.com/PrestaShop/PrestaShop/blob/b2ba1c2ecd627e23993c9356165e0d1e842a2faa/controllers/front/ProductController.php#L35
.. _Async vs Defer attributes: http://www.growingwiththeweb.com/2014/02/async-vs-defer-attributes.html
