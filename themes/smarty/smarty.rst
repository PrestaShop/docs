***********************
Smarty
***********************


Helpers and modifier
======================

{url}
---------------

PrestaShop 1.7 introduce a new smarty helper to generate urls here are some examples.
This will take care of SSL, domain, virtual and physical base uri,  params concat and of course url rewritting.
{url} use the Link class internatly

[NOTE] for link to any controller without params, please see `$urls` dataset.


[warning] an instance of link is still passed to the templates for retrocompat' purpose since it was heavily used.
it is not recommended to use

.. code-block:: smarty

  {url entity=address id=$id_address}
  or
  {url entity=address params=['id_address' => $id_address]}

  and

  {url entity=address id=$id_address params=['delete' => 1]}

will render (this is an example with my config, but you get the idea)

.. code-block:: html

  http://prestashop.ps/it/address?id_address=3

  and

  http://prestashop.ps/it/address?id_address=3&delete=1


Widgets
----------

{widget}
^^^^^^^^^

PrestaShop 1.7  has introduce a new way to display modules. Instead of using a hook and hooking your module on it
the widget function let you display any content from module in your template

[NOTE] link to full widget system doc

If you want to displau the shop contact info using ps_contactinfo, you can write this

.. code-block:: smarty

  <div id="sidebar">
    {widget name="ps_contactinfo"}
  </div>

since some module have different template depending on which hook they are hooked on, you
can pass the hook name as well


.. code-block:: smarty

  <div id="sidebar">
    {widget name="ps_contactinfo" hook="displayLeftColumn"}
  </div>


{widget_block}
^^^^^^^^^^^^^^^

Even better you can rewrite the template on the go. the module will use your smarty code instead of loading
the template file.

With ps_linklist example, instead of using `ps_linklist/ps_linklist/views/templates/hook/linkblock.tpl`, you can override it this way:

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

ui as to come form controller. so far only used for forms (customer info and checkout).
needs to implement `FormInterface`

.. code-block:: smarty

  {render file='customer/_partials/login-form.tpl' ui=$login_form}


{form_field}
^^^^^^^^^^^^^^



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

in order to use data from controller to generate classnames we added these 2 modifiers


classname
^^^^^^^^^^

classname will ensure your string is a valid class name. it will:

1. lowercase
1. replace funny characters with latin non accented ones (see https://github.com/PrestaShop/PrestaShop/blob/develop/classes/Touls.php#L1297-L1393)
1. replace all alphnumerical char by one dash
1. ensure only one consecutive dash


classnames
^^^^^^^^^^

takes an array, key is the classname and the value is a boolean indicating if it should be displayed or not.

note that each class names are passed the classname filter

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
