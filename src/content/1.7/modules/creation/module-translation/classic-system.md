---
title: Classic translation system
menuTitle: Classic system
weight: 2
---

# Classic module translation system

The classic translation system is a heritage from previous versions of PrestaShop and provides retrocompatibility with PrestaShop 1.6. If you plan on supporting only versions 1.7.6 and up, consider using the [New translation system]({{< ref "new-system.md" >}}).

{{% notice note %}}
**Native modules work differently**

In PrestaShop 1.7, native modules (the ones bundled with PrestaShop) use a different system.
Read more about it here: [Native module translation]({{< ref "1.7/development/internationalization/translation/native-module-translation.md" >}}).
{{% /notice %}}

## How it works

This system relies on the existence of translation dictionary files located inside the `translations` directory within a given module. These files can be generated using the Translation page in the Back Office (_International > Translations > Modify Translations_).

{{< figure src="../img/classic-translation-workflow.jpg" title="Translation workflow" >}}

In runtime, when the translation method is invoked, the Core uses the previously-generated dictionary file to look up the translation for the provided wording.

{{< figure src="../img/classic-translation-system.jpg" title="How wordings are translated at runtime" >}}

## Translating PHP files

In PHP files, translation is performed using the module's `l()` method.

This method accepts upt to three parameters:
     
- `$wording` – The wording you want to translate.
- `$specific` – The contextual file name. If not provided, it defaults to the current module's technical name. [Read more on contextualization](#contextualization)
- `$locale` – If provided, this language code is used as translation target instead of the contextual one.


### Module's main class

Since the module main class extends the `Module` class, you just use `$this->l()`.

```php
class mymodule extends Module
{
    public function __construct()
    {
        $this->displayName = $this->l('My module');
        $this->description = $this->l('Description of my module.');
    }
}
```

### Module controllers

`ModuleAdminController` and `ModuleFrontController` can access the module instance via the `$this->module` property.

```php
class MyModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        $this->title = $this->module->l('My module title');
    }
}
```

### Other classes

Other classes will need to retrieve the module's instance somehow. We recommend passing it as as a parameter in the constructor and storing it for later use.

```php
class CustomModuleClass 
{
    private $module;
    
    public function __construct(Module $module)
    {
        $this->module = $module
    }
    
    public function foo()
    {
        $this->text = $this->module->l('My text to translate');
    }
}
```

If you really need to, you can also retrieve a new instance of your module using `Module::getInstanceByName('mymodulename')`.

## Translating templates

Wordings in .tpl files can be translated using the `{l}` function call, which Smarty will replace by the translation in the current language.

This function accepts three parameters:

- `s` – The wording to be translated.
- `mod` – Your module's technical name.
- `sprintf` – Optional, it can be used to interpolate variables in your wording.

For instance, translating the string "Welcome to this page!" can be done like this:

```php
{l s='Welcome to this page!' mod='mymodule'}
```

In our sample module, the `mymodule.tpl` file...

```html
<li>
  <a href="{$base_dir}modules/mymodule/mymodule_page.php" title="Click this link">Click me!</a>
</li>
<!-- Block mymodule -->
<div id="mymodule_block_left" class="block">
  <h4>Welcome!</h4>
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
    <p>{l s='Hello,' mod='mymodule'}
       {if isset($my_module_name) && $my_module_name}
           {$my_module_name}
       {else}
           {l s='World' mod='mymodule'}
       {/if}
       !
    </p>
    <ul>
      <li><a href="{$my_module_link}"  title="{l s='Click this link' mod='mymodule'}">{l s='Click me!' mod='mymodule'}</a></li>
    </ul>
  </div>
</div>
<!-- /Block mymodule -->
```

As you can see, the basis of template file translation is to enclose them like this: 
```
{l s='The string' mod='name_of_the_module'}
```

Notice how the `mod` parameter is always provided. This parameter is mandatory for module translation in templates. It is used by PrestaShop to assert which module the string belongs to.

### Variable interpolation

The changes in `mymodule.tpl`'s link and title texts are straightforward to understand. But consider this block:

```
{l s='Hello,' mod='mymodule'}
{if isset($my_module_name) && $my_module_name}
   {$my_module_name}
{else}
   {l s='World' mod='mymodule'}
{/if}
!
```

Isn't there a better way to make this work?

We have two possible cases:

1. `"Hello " . $my_module_name . "!"`
2. `"Hello World!"`

This can first be improved by keeping the first case, and replacing the variable content to "World" as needed:

```
{if !isset($my_module_name) || !$my_module_name}
  {capture name='my_module_tempvar'}{l s='World' mod='mymodule'}{/capture}
  {assign var='my_module_name' value=$smarty.capture.my_module_tempvar}
{/if}
{l s='Hello,' mod='mymodule'} {$my_module_name$}!
```

This is a start! In this example, when `$my_module_name` is not defined, we capture the value of translating "World" and replace `$my_module_name` with that.

Now, when working in internationalization, it's better not to make assumptions regarding spacing and positioning of variables. For example, in French, there should be a non-breaking space before the exclamation mark (`!`), but other languages shouldn't. How can we handle this?

In PrestaShop, you can interpolate variables using using [sprintf replacement markers](https://php.net/sprintf), such as `%s` or `%1$s`. Using this feature, we could get rid of the explicit concatenation of "Hello, ", "$my_module_name" and "!":

```
{if !isset($my_module_name) || !$my_module_name}
  {capture name='my_module_tempvar'}{l s='World' mod='mymodule'}{/capture}
  {assign var='my_module_name' value=$smarty.capture.my_module_tempvar}
{/if}
{l s='Hello %s!' sprintf=[$my_module_name] mod='mymodule'}
```

### HTML content

You may need to add HTML content in your translated string. Writing it directly in the string (original or translated) won't work, as the special characters would be escaped to avoid XSS security issues.

Instead, you must replace some placeholders with the HTML code.

Let's take an example with a link in a string, which can be tricky to do. 
The first solution that comes to mind would be to concatenate the translated strings with raw HTML code.
But this solution is not recommended, because the words order could be different depending on the translation language.

```php
{l
  s='If you want a category to appear in the menu of your shop, go to [1]Modules > Modules & Services > Installed modules.[/1] Then, configure your menu module.'
  sprintf=[
    '[1]' => "<a href=\"{$link->getAdminLink('AdminModules')}\" target=\"_blank\">",
    '[/1]' => '</a>'
  ]
  mod='mymodule'
}
```

Let's look at the resulting string:

```html
If you want a category to appear in the menu of your shop, go to <a href="..." target="_blank">Modules &gt; Modules &amp; Services &gt; Installed modules.</a> Then, configure your menu module.
```

It remains quite simple, but you must make sure the parts `[1]` and `[/1]` still exist after translating it to other languages.

{{% notice tip %}}
You can use sprintf markers (like `%s` and `%d`) or replacement tokens (like `[1]` and `%something%`). If you chose the latter, just provide an associative array: 
`sprintf=['[1]' => 'some replacement, '%something%' => 'something else']`
{{% /notice %}}

## Contextualization

Sometimes the same wording would be translated differently when used in two different contexts. To allow translators to pick the best translation for each context, module developers can choose to contextualize wordings by specifying the file where it's used. When context is provided, translators can choose a different translation for each context.

Although contextualization is optional, we strongly suggest to contextualize all your wordings.

{{% notice note %}}
Contextualization works differently in the Core, see [Core Translation]({{< ref "/1.7/development/internationalization/translation/_index.md" >}}).
{{% /notice %}}

##### Contextualize translations in PHP files

Context is defined by setting the second parameter of `l()` to something of your choosing. By convention, we suggest using the name of the php file it's located in, like this:

```php
// in SomeFile.php

$module->l('Some wording', 'somefile');
```

{{% notice note %}}
When no context is provided, PrestaShop automatically sets it to your module's technical name
{{% /notice %}}

##### Contextualize translations in template files

Good news! Contextualization is performed automatically in template files, you don't need to do anything.


## Creating translation files

Translation dictionary files can be created inside the PrestaShop Back Office:

- Go to the "Translations" page under the "International" menu,
- In the "Modify translations" section, find the "Type of translation" drop-down and select "Installed modules translations",
- Choose the module you want to translate.
- Choose the language you want to translate the module into. The destination language must already be installed to enable translation
  in it.
- Click the "Modify" button.

The page that loads displays all the strings for all the selected module, grouped by [translation context](#contextualization). Groups where all wordings have already been translated appear collapsed, whereas groups where at least one string is missing appear expanded. In order to translate your module, simply fill out the empty fields.

Once all strings for your module are correctly translated, click on either the "Save and stay" button or the "Save" button at the bottom of
your list of strings.

PrestaShop then saves the translations in a file named using the `<language_coode>.php` format and located in you module's `translations` directory (for instance, `/mymodule/translations/fr.php`). 

The translation file looks like this:

```php
// fr.php

global $_MODULE;
$_MODULE = array();
$_MODULE['<{mymodule}prestashop>mymodule_2ddddc2a736e4128ce1cdfd22b041e7f'] = 'Mon module';
$_MODULE['<{mymodule}prestashop>mymodule_d6968577f69f08c93c209bd8b6b3d4d5'] = 'Description du module.';
$_MODULE['<{mymodule}prestashop>mymodule_533937acf0e84c92e787614bbb16a7a0'] = 'Êtes-vous certain de vouloir désinstaller ce module ? Vous perdrez tous vos réglages !';
$_MODULE['<{mymodule}prestashop>mymodule_0f40e8817b005044250943f57a21c5e7'] = 'Aucun nom fourni';
```

This file shouldn't be modified manually! It is meant to be edited through the PrestaShop translation interface.

Now that the module is translated to French translation, we can switch the interface to French and get the expected result: the module's wordings are now in French.

## Limitations

##### Language codes

The classic translation system identifies languages using a two-letter code referred to as "Language code" or "ISO code", based on the ISO-619-1 standard ([see the unofficial list here][iso-619-1]). 

Since this standard does not include regional language variants, like British English, Canadian French or Swiss German for example, PrestaShop supports them through nonstandard language codes (`gb`, `qc` and `dh` respectively). 

This historical choice is subject to debate because of the interoperability issues it raises. In order to fully address them, a later major version of PrestaShop will switch completely to [IETF language tags][ietf-language-tags] for language identification. 

In the meantime, refer to this list for the equivalences between language codes and IETF language tags: [Legacy to standard locales][legacy-to-standard].

[iso-619-1]: https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
[ietf-language-tags]: https://en.wikipedia.org/wiki/IETF_language_tag
[legacy-to-standard]: https://github.com/PrestaShop/PrestaShop/blob/1.7.6.x/app/Resources/legacy-to-standard-locales.json
