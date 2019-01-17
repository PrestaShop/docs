---
title: Module translation
weight: 7
aliases:
  - /1.7/modules/creation/module_translation
  - /module/05-CreatingAPrestaShop17Module/06-ModuleTranslation.html
---

Module translation
==================

The module's text strings are written in English, but you might want
French, Spanish or Polish shop owners to use your module too. You
therefore have to translate those strings into those languages, both the
front office and the back office strings. Ideally, you should translate
your module in all the languages that are installed on your shop. This
could be a tedious task, but a whole system has been put in place in
order to help you out.


The process of preparing text strings for translation is called internationalization, or i18n.

## Translation-ready strings

### PHP classes

#### Module main class
The translation of a string can be obtained with the `Module::l(...)` method.
In consequence, the method is available in the main class of the module.

```php
class MyModule extends Module
{
    public function __construct()
    {
        // [...]
        $this->displayName = $this->l('My module');
        $this->description = $this->l('Description of my module.');
```

#### Module controllers

`ModuleAdminController` & `ModuleFrontControllers` can access the module instance via the property `module`.
No instanciation is required.

```php
class ChequeValidationModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        // [...]
        $this->title = $this->module->l('My module title');
```

#### Other classes

Other classes may need to get the module instance as a parameter and store it for translations.

Another solution is retrieving the module object with `Module::getInstanceByName(<Module_name>)`.

Add a parameter to the `{l}` method to specify the class asking for translation.

```php
class CustomModuleClass 
{
    public $module;
    
    public function foo()
    {
        // [...]
        $this->module = Module::getInstanceByName(<Module_name>);
        $this->text = $this->module->l('My text to translate', 'CustomModuleClass');
```

### Templates

Strings in TPL files will need to be turned into dynamic content using
the `{l}` function call, which Smarty will replace by the translation
for the chosen language.

These parameters are also mandatory:

* `s` storing the string to be translated,
* `mod` giving translation context.

For instance, translating the string "Welcome to this page!" can be done like this:

```php
{l s='Welcome to this page!' mod='Modules.MyModule'}
```


In our sample module, the `mymodule.tpl` file...

```html
<li>
  <a href="{$base_dir}modules/mymodule/mymodule_page.php" title="Click this link">Click me!</a>
</li>
<!-- Block mymodule -->
<div id="mymodule_block_left" class="block">
  <h4>{l s='Welcome!' mod='Modules.MyModule'}</h4>
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
  <a href="{$base_dir}modules/mymodule/mymodule_page.php" title="{l s='Click this link' mod='mymodule'}">{l s='Click me!' mod='mymodule'}</a>
</li>
<!-- Block mymodule -->
<div id="mymodule_block_left" class="block">
  <h4>{l s='Welcome!' mod='mymodule'}</h4>
  <div class="block_content">
    <p>
      {if !isset($my_module_name) || !$my_module_name}
        {capture name='my_module_tempvar'}{l s='World' mod='mymodule'}{/capture}
        {assign var='my_module_name' value=$smarty.capture.my_module_tempvar}
      {/if}
      {l s='Hello %1$s!' sprintf=$my_module_name mod='mymodule'}   
    </p>   
    <ul>
      <li><a href="{$my_module_link}"  title="{l s='Click this link' mod='mymodule'}">{l s='Click me!' mod='mymodule'}</a></li>
    </ul>
  </div>
</div>
<!-- /Block mymodule -->
```

Notice that we always use the `mod` parameter. This is used by PrestaShop
to assert which module the string belongs to. The translation tool needs
it in order to match the string to translate with its translation. This
parameter is mandatory for module translation in templates.


## Translations management

Strings are delimited with single quotes. If a string contains single
quotes, they should be escaped using a backslash (`\`).

This way, strings can be directly translated inside PrestaShop:

-   Go to the "Translations" page under the "Localization" menu,
-   In the "Modify translations" drop-down menu, choose "Installed
    modules translations",
-   Choose the language you want to translate the module into. The
    destination language must already be installed to enable translation
    in it.
-   Click the "Modify" button.

The page that loads displays all the strings for all the
currently-installed modules. Modules that have all their strings already
translated have their fieldset closed, whereas if at least one string is
missing in a module's translation, its fieldset is expanded. In order to
translate your module's strings (the ones that were "marked" using the
`l()` method), simply find your module in the list (use the browser's
in-page search), and fill the empty fields.

Once all strings for your module are correctly translated, click on
either the "Save and stay" button or the "Save" button at the bottom of
your list of strings.

PrestaShop then saves the translations in a new file, named using the
`languageCode.php` format (for instance, `/mymodule/fr.php`). The
translation file looks like so:

fr.php

```php
global $_MODULE;
$_MODULE = array();
$_MODULE['<{mymodule}prestashop>mymodule_2ddddc2a736e4128ce1cdfd22b041e7f'] = 'Mon module';
$_MODULE['<{mymodule}prestashop>mymodule_d6968577f69f08c93c209bd8b6b3d4d5'] = 'Description du module.';
$_MODULE['<{mymodule}prestashop>mymodule_533937acf0e84c92e787614bbb16a7a0'] = 'Êtes-vous certain de vouloir désinstaller ce module ? Vous perdrez tous vos réglages !';
$_MODULE['<{mymodule}prestashop>mymodule_0f40e8817b005044250943f57a21c5e7'] = 'Aucun nom fourni';
```

This file must not be edited manually! It can only be edited through the
PrestaShop translation tool.

Now that we have a French translation, we can click on the French flag
in the front office, and get the expected result: the module's strings
are now in French.

They are also translated in French when the back office is in French.

## Complex translations

### Variables

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
{l s='Hello %s!' sprintf=$my_module_name mod='mymodule'}
```

But in our case, we also need to make sure that the `%s` is replaced by
"World" in case the `my_module_name` value does not exist... and we
must make "World" translatable too. This can be achieved by using Smarty
`{capture}` function, which collects the output of the template between
the tags into a variable instead of displaying, so that we can use it
later on. We are going to use it in order to replace the variable with
the translated "World" if the variable is empty or absent, using a
temporary variable. Here is the final code:

```
{if !isset($my_module_name) || !$my_module_name}
  {capture name='my_module_tempvar'}{l s='World' mod='mymodule'}{/capture}
  {assign var='my_module_name' value=$smarty.capture.my_module_tempvar}
{/if}
{l s='Hello %s!' sprintf=$my_module_name mod='mymodule'}
```

### HTML content

You may need to add HTML content in your translated string.
Writing it directly in the string (original or translated) won't work, as the
special characters would be escaped to avoid XSS security issues.

Instead, you must replace some placeholders with the HTML code.


Let's take an example with a link in a string, which can be tricky to do.
The first solution coming in mind would be the concatenation of translated
strings with raw HTML code.
But this solution is not recommended, because the words order could be
different depending on the language used.

```php
{l
  s='If you want a category to appear in the menu of your shop, go to [1]Modules > Modules & Services > Installed modules.[/1] Then, configure your menu module.'
  sprintf=[
  '[1]' => "<a href=\"{$link->getAdminLink('AdminModules')}\" class=\"_blank\">",
  '[/1]' => '</a>'
  ]
  mod='mymodule'
}
```

Let's look at the resulting string:

```text
If you want a category to appear in the menu of your shop, go to [1]Modules > Modules & Services > Installed modules.[/1] Then, configure your menu module.
```

It remains quite simple, but you must make sure the parts `[1]` and `[/1]` still exist after translating it to other languages.

## Native modules

On PrestaShop 1.7, the translation system has changed for native modules (= provided by PrestaShop core team).

Details on its implementation can be found [here]({{< ref "1.7/development/internationalization/translation/native-module-translation.md" >}}).
