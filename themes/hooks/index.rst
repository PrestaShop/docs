***********
FO Hooks
***********

This section of the documentation is only about front office hooks: display and action.

All Hooks
------------

// TODO create page with table listing the content of the `hooks.json` file.


Creating a custom hook
--------------------

Creating a dynamic hook
^^^^^^^^^^^^^^^^^^^^^^^

When your module or theme calls a hook, PrestaShop executes it.

From a regular PHP file:

.. code-block:: php

  Hook::exec('MyCustomHook');


From a Smarty template:

.. code-block:: Smarty

  {hook h='MyCustomHook'}


Making your hook visible and reusable
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

If you want the user to be able to see your hook in PrestaShop's Position page (in the back office), it has to be registered.

You can register your hook from your theme's `theme.yml` file:

[SEE] theme-yml

.. code-block:: yaml

  global_settings:
    hooks:
      custom_hooks:
        - name: displayFooterBefore
          title: displayFooterBefore
          description: Add a widget area above the footer


You can also register your hook from a module:

.. code-block:: php
  // Create the function for the MyCustomHook hook
  public function MyCustomHook($params)
  {
      // method body
  }

  // Register the MyCustomHook hook
  Hook::register('MyCustomHook');

  // Call it from PHP
  Hook::exec('MyCustomHook');
