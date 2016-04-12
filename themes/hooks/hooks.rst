***********
Hooks
***********

Im only talking about front Hooks: displya and action

All Hooks
------------

INCLUDE JSON


Create custom hook
--------------------

Dynamic Hooks
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

When you call a hook, prestashop will execute it

Smarty:

.. code-block:: Smarty

  {hook h='MyCustomHookThatNobodyUses'}


.. code-block

  Hook::exec('MyCustomHookThatNobodyUses');


Declared, visible and reusable
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

If you want the user to be able to see it in Position page, it has to be registered

register in in your theme

[SEE] theme-yml

.. code-block:: yaml

  global_settings:
    hooks:
      custom_hooks:
        - name: displayFooterBefore
          title: displayFooterBefore
          description: Add a widget area above the footer


register it in your module

.. code-block:: php

  Hook::register(xx);
  // call it
  Hook::exec('MyHook');
