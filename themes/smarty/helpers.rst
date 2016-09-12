********************************
Helpers: functions and modifier
********************************


{url}
=================

PrestaShop 1.7 introduces a new Smarty helper to generate URLs.
This will take care of SSL, domain name, virtual and physical base URI, parameters concatenation,
and of course URL rewritting.

``{url}`` uses the Link class internally.

.. note::
  Please see the ``$urls`` dataset to find already regenerated urls (such as home, cart, login and so on).

.. warning::
  An instance of the Link object is still passed to the templates for backward compatibility purposes,
  since it was heavily used. **It is strongly recommended not to use it**.

Here is a few examples:

.. code-block:: smarty

  {url entity=address id=$id_address}
  {url entity=address params=['id_address' => $id_address]}
  {url entity=address id=$id_address params=['delete' => 1]}

...will respectively output:

.. code-block:: html

  http://prestashop.ps/it/address?id_address=3
  http://prestashop.ps/it/address?id_address=3
  http://prestashop.ps/it/address?id_address=3&delete=1


Widgets
=================

{widget}
-----------------------------

PrestaShop 1.7 introduces a new way to display modules in a theme. Instead of using a hook and hooking
your module to it, the widget's function lets you display any content from the module in your template.

This is a key feature of PrestaShop 1.7, make sure you :doc:`read the dedicated documentation <../modules/widget>`.

Here is an example from classic theme, it displays the shop contact details wherever you want.

.. code-block:: html+smarty

  <div id="sidebar">
    {widget name="ps_contactinfo"}
  </div>


Since the module may have a different behavior depending on which hook they are hooked on, you can pass the
hook name.

.. code-block:: html+smarty

  <div id="footer">
    {widget name="ps_contactinfo" hook="displayFooter"}
  </div>


{widget_block}
-----------------------------

Even better, you can rewrite the template on the go. The module will use your Smarty code instead of loading
the template file.

Taking the `ps_linklist module <https://github.com/PrestaShop/ps_linklist/tree/master>`_ as an example.
Instead of using ``ps_linklist/views/templates/hook/linkblock.tpl``, you can override it this way:

.. code-block:: html+smarty

  {widget_block name="ps_linklist"}
    {foreach $linkBlocks as $linkBlock}
      <ul>
        {foreach $linkBlock.links as $link}
          <li>
              <h4><a href="{$link.url}">{$link.title}</a></h4>
              <p>{$link.description}</p>
          </li>
        {/foreach}
      </ul>
    {/foreach}
  {/widget_block}


{render}
=================

Some elements coming from the controller might need to be passed to this function. So far, it is only used
for forms (customer information and checkout).

.. code-block:: smarty

  {render file='customer/_partials/login-form.tpl' ui=$login_form}


{form_field}
=================

``{form_field}`` function will help you building forms, it can be compared to the backoffice helpers introduced in
PrestaShop 1.5. It helps you keeping the form markup very consistent.

As a template designer you will find the markup of each elements in ``_partials/form-fields.tpl``.

.. code-block:: smarty

  {form_field field=$field}

...where ``$field`` is an array, like this example:

.. code-block:: php

  $field = [
    'name' => 'user_email',
    'type' => 'email',
    'required' => 1,
    'label' => 'Email',
    'value' => null,
    'availableValues' => [],
    'errors' => [],
  ];


Class name modifiers
======================

In order to use the data from controller to generate classnames, we added 2 modifiers: 'classname' and 'classnames'.


``classname``
-----------------------------

The classname data modifier will ensure that your string is a valid class name.

It will:

#. Put it in lowercase.
#. Replace any non-ASCII characters (such as accented characters) with their ASCII equivalent. `See the code here <https://github.com/PrestaShop/PrestaShop/blob/develop/classes/Tools.php#L1252-L1354>`_.
#. Replace all non-alphanumerical characters with a single dash.
#. Ensure only one consecutive dash is used.

.. code-block:: smarty

  {assign var=attr value='Hérè-Is_a-Clàssnåme--@#$$ˆ*(&-----'}
  {$attr|classname}

...will output:

.. code-block:: text

  here-is-a-classname-v


``classnames``
-----------------------------

This data modifier takes an array, where the key is the classname and the value is a boolean indicating if
it should be outputted or not.

Note that each class name is passed through the ``classname`` modifier.

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

.. code-block:: html+smarty

  <body class="{$page.body_classes|classnames}">


...will generate:

.. code-block:: html+smarty

  <body class="lang-fr country-fr currency-eur layout-full-width page-index">
