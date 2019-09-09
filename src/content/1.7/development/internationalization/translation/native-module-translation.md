---
title: Native module translation
aliases:
  - /1.7/development/native_module_translation
  - /1.7/development/native-module-translation
---

# Native module translation

The module's text strings are written in English, but you might want
French, Spanish or Polish shop owners to use your module too. You
therefore have to translate those strings into those languages, both the
front office and the back office strings. Ideally, you should translate
your module in all the languages that are installed on your shop. This
could be a tedious task, but a whole system has been put in place in
order to help you out.

In short, PrestaShop 1.7 implements Symfony's translation system,
through the use of the `trans()` method, used to encapsulate the strings
to be translated. This method is applied in a different way depending of
the file type.

{{% notice warning %}}
**This system only works with native modules.**

See [here]({{< ref "1.7/modules/creation/module-translation/_index.md" >}}) for 3rd party modules.
{{% /notice %}}

The process of preparing text strings for translation is called internationalization, or i18n.

## Internationalizing strings in Smarty (.tpl) files

Strings in TPL files will need to be turned into dynamic content using
the `{l}` function call, which Smarty will replace by the translation
for the chosen language.

PrestaShop 1.6 used to require the `mod` parameter for context.
PrestaShop 1.7 now requires that parameter to be "`d`", and to use the
same domain as all the other strings in the module.

In our sample module, the `mymodule.tpl` file...

```html
<li>
  <a href="{$base_dir}modules/mymodule/mymodule_page.php" title="Click this link">Click me!</a>
</li>
<!-- Block mymodule -->
<div id="mymodule_block_left" class="block">
  <h4>{l s='Welcome!' d='Modules.MyModule'}</h4>
  <div class="block_content">
    <p>Hello,
       {if isset($my_module_name) && $my_module_name}
           {$my_module_name}
       {else}
           World
       {/if}
       !
    </p>
    <ul>
      <li><a href="{$my_module_link}" title="Click this link">Click me!</a></li>
    </ul>
  </div>
</div>
<!-- /Block mymodule -->
```

...becomes:

```html
<li>
  <a href="{$base_dir}modules/mymodule/mymodule_page.php" title="{l s='Click this link' d='Modules.MyModule'}">{l s='Click me!' d='Modules.MyModule'}</a>
</li>
<!-- Block mymodule -->
<div id="mymodule_block_left" class="block">
  <h4>{l s='Welcome!' d='Modules.MyModule'}</h4>
  <div class="block_content">
    <p>
      {if !isset($my_module_name) || !$my_module_name}
        {capture name='my_module_tempvar'}{l s='World' d='Modules.MyModule'}{/capture}
        {assign var='my_module_name' value=$smarty.capture.my_module_tempvar}
      {/if}
      {l s='Hello %1$s!' sprintf=$my_module_name d='Modules.MyModule'}
    </p>
    <ul>
      <li><a href="{$my_module_link}"  title="{l s='Click this link' d='Modules.MyModule'}">{l s='Click me!' d='Modules.MyModule'}</a></li>
    </ul>
  </div>
 </div>
 <!-- /Block mymodule -->
```

...and the `display.tpl` file:

```
Welcome to this page!
```

...becomes:

```
{l s='Welcome to this page!' d='Modules.MyModule'}
```

Notice that we always use the `d` parameter. This is used by PrestaShop
to assert which module the string belongs to. The translation tool needs
it in order to match the string to translate with its translation. This
parameter is mandatory for module translation.

Translating complex code
------------------------

As we can see, the basis of template file translation is to enclose them
in the `{l s='The string' mod='name_of_the_module'}`. The changes in
`display.tpl` and in `mymodule.tpl`'s link and title texts are thus easy
to understand. But added a trickier block of code for the "Hello World!"
string: an if/else/then clause, and a text variable. Let's explore this
code:

Here is the original code:

```
Hello,
  {if isset($my_module_name) && $my_module_name}
    {$my_module_name}
  {else}
    World
  {/if}
!
```
As you can see, we need to get the "Hello World" string translatable,
but also to cater for the fact that there is a variable. As explained in
the "Translations in PrestaShop 1.5" chapter, variables are to be marked
using `sprintf()` markers, such as `%s` or `%1$s`.

Making "Hello %s!" translatable words in easy: we just need to use this
code:

```
{l s='Hello %s!' sprintf=$my_module_name d='Modules.MyModule'}
```

But in our case, we also need to make sure that the %s is replaced by
"World" in case the "my\_module\_name" value does not exist... and we
must make "World" translatable too. This can be achieved by using Smarty
`{capture}` function, which collects the output of the template between
the tags into a variable instead of displaying, so that we can use it
later on. We are going to use it in order to replace the variable with
the translated "World" if the variable is empty or absent, using a
temporary variable. Here is the final code:

```
{if !isset($my_module_name) || !$my_module_name}
  {capture name='my_module_tempvar'}{l s='World' d='Modules.MyModule'}{/capture}
  {assign var='my_module_name' value=$smarty.capture.my_module_tempvar}
{/if}
{l s='Hello %s!' sprintf=$my_module_name d='Modules.MyModule'}
```
