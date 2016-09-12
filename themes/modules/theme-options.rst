**************************************
Theme options module
***************************************

PrestaShop 1.7 removed many options from the coore because they were actually theme related.

We encourage every theme developer to provide theme option in a module. For example, you may want to
let your user choose the actions after a product was added to the cart: show a modal? redirect to the cart?

How to create an option module
--------------------------------

You can use `PrestaShop official module generator`_ to get the module boilerplate.


Declare your theme option
^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Then you should link your module to your theme, so PrestaShop is aware of these theme options.
Simply add an ``options` key in your theme.yml file. The value must be the module technical name (ie: the directory name)

.. code-block:: yml

  name: mytheme
  display_name: My Theme
  version: 1.0.0
  options: mythemeoption


// TODO create special hook for template assignment!


.. _PrestaShop official module generator: https://validator.prestashop.com/generator
