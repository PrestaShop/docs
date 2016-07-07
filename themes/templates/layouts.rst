***************
Templates and layouts
***************

PrestaShop template file are based on the `Smarty 3 template engine <http://www.smarty.net/v3_overview>`_.

All template files must be stored in the theme's `templates/` subfolder. For instance, the default theme has its template files in the following folder: `/themes/classic/templates`.

Templates are then split between various functionnaly-specific subfolders: checkout-related template files are stored in the `/templates/checkout` subfolder, customer-related templates are in `/templates/customer`, etc. Each of these folders can in turn have their own `_partials` subfolder.

Template files should be written so that a single .tpl can generate a whole HTML page -- unless they are inside a `_partials` folder or subfolder (see our coding standard, linked from the Prologue chapter of this documentation).


Templates inheritance
===========================

Smarty 3 has a a `template inheritance feature <http://www.smarty.net/inheritance>`_, which you can make use of in your own themes.

In their own words, "Template inheritance is an approach to managing templates that resembles object-oriented programming techniques. Instead of the traditional use of {include ...} tags to manage parts of templates, you can inherit the contents of one template to another (like extending a class) and change blocks of content therein (like overriding methods of a class.) This keeps template management minimal and efficient, since each template only contains the differences from the template it extends."

Here is an example from the Smarty documentation:

**parent.tpl file**

.. code-block:: smarty

  <html>
    <head>
      <title>{block name=title}default title{/block}<title>
    </head>
    <body>
      {block name=body}default body{/block}
    </body>
  </html>


**child.tpl file **

.. code-block:: smarty

  {extends file="parent.tpl"}
  {block name=title}My Child.tpl Title{/block}
  {block name=body}My Child.tpl Body{/block}


The output of `child.tpl` will be:

.. code-block:: html

  <html>
    <head>
      <title>My Child.tpl Title<title>
    </head>
    <body>
      My Child.tpl Body
    </body>
  </html>

You can have any number of child templates chained together, thus the concept of inheritance. 

This is the right way to "include" a template into another. Make good use of it!
