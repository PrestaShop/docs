***********************
Helper functions
***********************



Helpers and modifier
======================

{url}
---------------

PrestaShop 1.7 introduces a new Smarty helper to generate URLs.
This will take care of SSL, domain name, virtual and physical base URI, parameters concatenation, and of course URL rewritting.

{url} uses the Link class internally.

[NOTE] To link to any controller without using parameters, please see the `$urls` dataset.

[WARNING] An instance of the Link object is still passed to the templates for retrocompatibility purposes, since it was heavily used. It is not recommended to use it.

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

PrestaShop 1.7 introduces a new way to display modules in a theme. Instead of using a hook and hooking your module to it,
the widget's function lets you display any content from the module in your template.

// TODO link to full widget system doc

For instance, if you want to display the shop's contact info from the ps_contactinfo module, you can write this:

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

Taking the `ps_linklist module <https://github.com/PrestaShop/ps_linklist/tree/master>`_ as an example. Instead of using `ps_linklist/ps_linklist/views/templates/hook/linkblock.tpl`, you can override it this way:

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

The elements of the user interface (UI) have to come from the controller. So far, it is only used for forms (customer information and checkout).

Your code needs to implement the `FormInterface` interface.

.. code-block:: smarty

  {render file='customer/_partials/login-form.tpl' ui=$login_form}


{form_field}
^^^^^^^^^^^^^^

Form fields are called this way:

.. code-block:: Smarty

  {form_field field=$field}

...where `$field` is an array, like this example:

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
