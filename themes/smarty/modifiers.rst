
Class name modifiers
------------------------

In order to use the data from controller to generate classnames, we added 2 modifiers: 'classname' and 'classnames'.


'classname' modifier
^^^^^^^^^^^^^^^^^^^^

The classname data modifier will ensure that your string is a valid class name.

It will:

1. Put it in lowercase.
2. Replace any non-ASCII characters (such as accented characters) with their ASCII equivalent. `See the code here <https://github.com/PrestaShop/PrestaShop/blob/develop/classes/Tools.php#L1252-L1354>`_.
3. Replace all alphanumerical characters with a single dash.
4. Ensure only one consecutive dash is used.


'classnames' modifier
^^^^^^^^^^^^^^^^^^^^^

This data modifier takes an array, where the key is the classname and the value is a boolean indicating if it should be displayed or not.

Note that each classname is passed through the 'classname' modifier.

.. code-block:: php

  $body_classes = [
    "lang-fr" => true,
    "rtl" => false,
    "country-FR" => true,
    "currency-EUR" => true,
    "layout-full-width" => true,
    "page-index" => true,
  ];


This way, this Smarty code:

.. code-block:: html

  <body class="{$page.body_classes|classnames}">


...will generate:

.. code-block:: html

  <body class="lang-fr country-fr currency-eur layout-full-width page-index">
