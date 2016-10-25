Views within PrestaShop
=================================

PrestaShop uses the Smarty template engine to generate its views:
http://www.smarty.net/.

Theme views
--------------------------------

The views are stored in ``.tpl`` files, and are used throughout
PrestaShop:

-  Front office view: the files belong to the enabled theme, which is
   located in the ``/themes/`` folder.
-  For instance, with the default theme:
   ``/themes/default-bootstrap/product.tpl``
-  Back office view: the files belong to the enabled theme, which is
   located in the ``/admin-dev/themes/`` folder.
-  For instance, the the default back office theme:
   ``/admin-dev/themes/default/template/controllers/products/information.tpl``

Module views
--------------------------------

Modules can add their own templates to adapt parts of the interface:

-  The front office:
   ``/modules/bankwire/views/templates/front/payment_execution.tpl``
-  The back office:
   ``/modules/blocklayered/views/templates/admin/view.tpl``

There's a third template folder, called ``/hook/``, which can be used
for view files that are tied to a specific hook. For instance,

Best practices
--------------------------------

A view name is generally the same as the name for the code using it. For
instance, ``404.php`` uses ``404.tpl``.

Overriding a view file
--------------------------------

Keep overrides for your own shop
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Overrides in PrestaShop are exclusive. This means that if your module
overrides one of PrestaShop's behaviors, another module will not be able
to use that behavior properly, or override it in an predictable way.

Therefore, overrides should only be used for your own local modules,
when you have a specific need that cannot be applied with it.

It is not recommended to use an override in a module that you intend to
distribute (for instance through the PrestaShop Addons marketplace), and
they are forbidden in partner modules.

How to
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

As there is no inheritance, there is no way to override a view. In order
to change a view, you must rewrite the template file, and place it in
your theme/module's folder, in the same path.

For views tied to a Helper, you can use the PrestaShop ``/override/``
folder.

For instance, if you want to change the way the front office order
template file: ``/admin-dev/themes/default/template/controllers/orders/helpers/view/view.tpl``

...you must copy the template file and its path to the override folder:
``/override/controllers/admin/templates/orders/helpers/view/view.tpl``

...then edit the copied template file to better suit your needs.

When adding an override file manually, do not forget to delete the
``/cache/class_index.php`` file so that PrestaShop can take your changes
into account.

See the "Overriding default behaviors" page for more information.
