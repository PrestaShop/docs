***********************
Smarty
***********************

.. toctree::
    :maxdepth: 2
    :glob:

    *


[Note]
With PrestaShop 1.7, we chose to be secure by default: all HTML is escaped, you do not have to explicitely escape variables anymore. See for instance:

..  code-block:: smarty

  {$variableWithHtml noscript}
