***************
Templates
***************

All templates files lives in `templates/`.
there is a functionnal split: checkout-related templates, customer-related templates,...

All files generate a whole page unless they are inside a `_partials` directry or subdir (see coding standard)

PrestaShop themes are based on Smarty teplate engine http://www.smarty.net/v3_overview


Templates inheritance
===========================

Smarty 3.0 has a new inheritance feature

example from smarty documentation

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

The output of child.tpl will be

.. code-block:: html

  <html>
    <head>
      <title>My Child Title<title>
    </head>
    <body>
      My Child Body
    </body>
  </html>
