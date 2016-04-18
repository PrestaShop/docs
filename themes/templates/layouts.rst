***************
Templates and layouts
***************

PrestaShop themes are based on the Smarty template engine: http://www.smarty.net/v3_overview

All templates files live in the `templates/` folder.
There is a functionnal split: there are checkout-related templates, customer-related templates, etc.

All files generate a whole HTML page, unless they are inside a `_partials` directry or subdirectory (see our coding standard).


Templates inheritance
===========================

Smarty 3.0 has a inheritance feature.

Here is an example from the Smarty documentation:

**parent.tpl**

.. code-block:: smarty

  <html>
    <head>
      <title>{block name=title}default title{/block}<title>
    </head>
    <body>
      {block name=body}default body{/block}
    </body>
  </html>

**child.tpl**

.. code-block:: smarty

  {extends file="parent.tpl"}

  {block name=title}My Child Title{/block}

  {block name=body}My Child Body{/block}


  The output of child.tpl will be:

.. code-block:: html

  <html>
    <head>
      <title>My Child.tpl Title<title>
    </head>
    <body>
      My Child.tpl Body
    </body>
  </html>
