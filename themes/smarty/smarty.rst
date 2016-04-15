***********************
Smarty
***********************


[Note]
With PrestaShop 1.7, we choose to be secure by default: all html is escaped, you do not have to explicitely escape variables anymore. See for instance:

..  code-block:: smarty

  {$variableWithHtml noscript}

  
Helpers and modifier
======================

{url}
---------------

PrestaShop 1.7 introduces a new Smarty helper to generate ULRs.
This will take care of SSL, domain name, virtual and physical base URI, parameters concatenation, and of course URL rewritting.

{url} uses the Link class internally.

[NOTE] To link to any controller without params, please see the `$urls` dataset.

[WARNING] An instance of link is still passed to the templates for retrocompatibility purposes, since it was heavily used. It is not recommended to use it.

Here is an example:

.. code-block:: smarty

  {url entity=address id=$id_address}
  or
  {url entity=address params=['id_address' => $id_address]}

  and

  {url entity=address id=$id_address params=['delete' => 1]}

...will render as:

.. code-block:: html

  http://prestashop.ps/it/address?id_address=3

  and

  http://prestashop.ps/it/address?id_address=3&delete=1


Widgets
----------

{widget}
^^^^^^^^^

PrestaShop 1.7 introduces a new way to display modules. Instead of using a hook and hooking your module to it,
the widget's function lets you display any content from the module in your template.

// TODO link to full widget system doc

For instance, if you want to display the shop's contact info from the  ps_contactinfo module, you can write this:

.. code-block:: smarty

  <div id="sidebar">
    {widget name="ps_contactinfo"}
  </div>

Since some module have different templates depending on which hook they are hooked on, you can pass the hook name as well:


.. code-block:: smarty

  <div id="sidebar">
    {widget name="ps_contactinfo" hook="displayLeftColumn"}
  </div>


{widget_block}
^^^^^^^^^^^^^^^

Even better, you can rewrite the template on the go. The module will use your Smarty code instead of loading
the template file.

Taking the ps_linklist module as an example, instead of using `ps_linklist/ps_linklist/views/templates/hook/linkblock.tpl`, you can override it this way:

.. code-block:: smarty

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
--------------

The interface elements (UI) have to come from the controller. So far, it is only used for forms (customer info and checkout).
needs to implement `FormInterface`

.. code-block:: smarty

  {render file='customer/_partials/login-form.tpl' ui=$login_form}


{form_field}
^^^^^^^^^^^^^^

Form fields are called this way:

.. code-block:: Smarty

  {form_field field=$field}

$field is an array like:

.. code-block:: Smarty

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
------------------------

In order to use the data from controller to generate classnames, we added 2 modifiers: 'classname' and 'classnames'.


classname
^^^^^^^^^^

The classname data modifier will ensure that your string is a valid class name. 

It will:

1. Put it in lowercase.
2. Replace any funny characters with latin non accented ones.
3. Replace all alphanumerical char by one dash.
4. Ensure only one consecutive dash is used.


classnames
^^^^^^^^^^

This data modifier takes an array, where the key is the classname and the value is a boolean indicating if it should be displayed or not.

Note that each classname is passed through the classname filter.

.. code-block:: php

  $body_classes = [
    "lang-fr" => true,
    "rtl" => false,
    "country-FR" => true,
    "currency-EUR" => true,
    "layout-full-width" => true,
    "page-index" => true,
  ];

.. code-block:: html

  <body class="{$page.body_classes|classnames}">
  will generate
  <body class="lang-fr country-fr currency-eur layout-full-width page-index">
