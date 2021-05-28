---
title: Smarty Extensions
---

# Smarty Extensions

PrestaShop provides several smarty helper functions and modifiers.

## Functions

### {form_field}

The `{form_field}` function will help you build forms while keeping the form markup consistent. It can be compared to the back office helpers introduced in PrestaShop 1.5.

As a template designer you will find the markup of each elements in `_partials/form-fields.tpl`.

```smarty
  {form_field field=$field}
```

...where `$field` is an array, like this example:

```php
<?php
  $field = [
    'name' => 'user_email',
    'type' => 'email',
    'required' => 1,
    'label' => 'Email',
    'value' => null,
    'availableValues' => [],
    'errors' => [],
  ];
```

### {hook}

The `{hook}` function invokes a given named hook and displays its content (if any is returned).

```smarty
{hook h="displayBeforeSomething"}
```

Although not recommended, you can execute a hook for a specific module as well:

```smarty
{hook h="displayBeforeSomething" mod="mysupermodule"}
```

You can choose to exclude some modules, which won't be notified of the hook:

```smarty
{hook h="displayBeforeSomething" excl="foreveralone,derpmodule"}
```

### {l}

The `{l}` function allows you to insert translated text in your template using the [Translation system]({{< ref "/1.7/development/internationalization/translation/" >}}).

This function takes the following of arguments:

Name      | Required | Type | Example | Description
---       | ---      | ---  | --- | ---
`s`       | Yes      | String | `"Some text"` | Message to translate.
`d`       |          | String | `"Modules.Mymodule.Shop"` | Translation domain (when using the new translation system).
`mod`     |          | String | `"mymodule"` | Module name (when using the legacy translation system).
`sprintf` |          | Array  | `['replacement1', ...]` | Values to replace in the translated message.
`js`      |          | Bool   | true | **[Deprecated]** If true, slashes are added to escape quotes. Doesn't work when `d` is present.

Here are some examples:

```smarty
{l s="This is a text" d="Admin.Shipping.Feature"}
{l s="This is a text with a %s" d="Admin.Shipping.Feature" sprintf=[$replacement]}
{l s="This is a legacy text" mod="somemodule"}
```

If you need to escape quotes in the _translated_ text, do it like this:

```smarty
<script type="text/javascript">
  var thisIsAString = '{l|escape:"javascript" s="Don't do this at home" d="Modules.Mymodule"}';
</script>
``` 

### {render}

This function renders the specified template. Some variables coming from the controller might need to be passed to this function. 

So far, it is only used for forms (customer information and checkout).

```smarty
  {render file="customer/_partials/login-form.tpl" ui=$login_form}
```

### {url}

PrestaShop 1.7 introduces a new Smarty helper to generate URLs.
This will take care of SSL, domain name, virtual and physical base URI, parameters concatenation, and of course URL rewriting.

`{url}` uses the Link class internally.

{{% notice note %}}
  Please see the `$urls` dataset to find already regenerated urls (such as home, cart, login and so on).
{{% /notice %}}

{{% notice warning %}}
  While an instance of the Link object is still present in templates for backward compatibility purposes, **it is strongly recommended not to use it**. Use `{url}` instead.
{{% /notice %}}

Here is a few examples:

```smarty
  {url entity=address id=$id_address}
  {url entity=address params=['id_address' => $id_address]}
  {url entity=address id=$id_address params=['delete' => 1]}
  {url entity='sf' route='admin_module_manage' sf-params=['foo' => 'bar']}
```

...will respectively output:

```html
  http://prestashop.ps/it/address?id_address=3
  http://prestashop.ps/it/address?id_address=3
  http://prestashop.ps/it/address?id_address=3&delete=1
  http://prestashop.ps/it/admin/module/manage
```

### Widgets

PrestaShop 1.7 introduced a new way to display modules in a theme, called [Widgets]({{< ref "/1.7/modules/concepts/widgets" >}}). Instead of using a hook and hooking your module to it, the widget functions allow you explicitly manipulate your module from a template.

{{% notice warning %}}
**Avoid using this feature if you can.**
 
While this can be useful in some situations, it effectively couples your template to a module, which is not a good practice. Use it with care.
{{% /notice %}}

#### {widget}

This function lets you display content from the module in your template.

Here is an example from classic theme, it displays the shop contact details wherever you want.

```smarty
  <div id="sidebar">
    {widget name="ps_contactinfo"}
  </div>
```

Since the module may have a different behavior depending on which hook they are hooked on, you can pass the
hook name.

```smarty
  <div id="footer">
    {widget name="ps_contactinfo" hook="displayFooter"}
  </div>
```

#### {widget_block}

Even better, you can rewrite the template on the go. The module will use your Smarty code instead of loading
the template file.

Taking the Link list module as an example.
Instead of redefining `ps_linklist/views/templates/hook/linkblock.tpl` ([source](https://github.com/PrestaShop/ps_linklist/blob/v2.1.6/views/templates/hook/linkblock.tpl)), you can override it this way:

```smarty
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
```

## Modifiers

### Class name modifiers

In order to use the data from controller to generate class names, we added 2 modifiers: `classname` and `classnames`.

#### classname

The `classname` data modifier will ensure that your string is a valid class name.

It will:

1. Put it in lowercase.
2. Replace any non-ASCII characters (such as accented characters) with their ASCII equivalent ([see the code here ](https://github.com/PrestaShop/PrestaShop/blob/1.7.2.0/classes/Tools.php#L1248-L1350)).
3. Replace all non-alphanumerical characters with a single dash.
4. Ensure only one consecutive dash is used.

```smarty
  {assign var=attr value='Hérè-Is_a-Clàssnåme--@#$$ˆ*(&-----'}
  {$attr|classname}
```

...will output:

```
  here-is-a-classname-v
```

#### classnames

This data modifier takes an array, where the key is the class name and the value is a boolean indicating if it should be outputted or not.

Note that each class name is passed through the `classname` modifier.

```php
<?php
  $body_classes = [
    "lang-fr" => true,
    "rtl" => false,
    "country-FR" => true,
    "currency-EUR" => true,
    "layout-full-width" => true,
    "page-index" => true,
  ];
```

This way, this Smarty code:

```smarty
  <body class="{$page.body_classes|classnames}">
```

...will generate:

```html
  <body class="lang-fr country-fr currency-eur layout-full-width page-index">
```
