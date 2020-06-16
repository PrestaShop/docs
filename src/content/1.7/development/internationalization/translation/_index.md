---
title: Translation
weight: 10
---

# Translation

One of the main needs for localization is translating wordings to the another language. PrestaShop is capable of translating wordings to any language, as long as it has the appropriate translations available. 

PrestaShop 1.7 features a new translation system, based on the [Symfony Translation component](https://symfony.com/doc/3.4/translation.html).

{{% notice warning %}}
**This documentation is intended for Core and Native module translation.**

If you are a module developer, read the [module translation documentation]({{< ref "1.7/modules/creation/module-translation/_index.md" >}}) instead.
{{% /notice %}}

## Overview

The translation system is less complicated than it can seem to be at first glance. To start working with it, you should get familiarized with the following concepts:

**Wording**
: _(Also called "message")_. An abstraction of a phrase that will be translated to any given language. It's usually written as plain English, in order to make it easier to understand.

**Translation Domain**
: A group of wordings. Organizing messages in groups allows for an improved contextualization of wordings ([Read more][translation-domains]).

**Message Catalogue**
: A collection of wordings in a given language. Each supported language has its own catalogue which contains translations for all the wordings in that language.

**Default Message Catalogue**
: The base message catalogue on which the translated message catalogues are based. This is where we add new wordings.

**Catalogue Resource**
: A data source containing a catalogue. It can be an in-memory array, a database, a group of files...

**Translator**
: A service that allows translating wordings to a given language.

## How to translate wordings

{{% notice note %}}
This section provides an quick reference on how to use the Translator. For more information, read Symfony's documentation on [Using the Translator](https://symfony.com/doc/3.4/components/translation/usage.html).
{{% /notice %}}

### PHP files

To translate wordings in PHP files, you first need an instance of the `Translator` service (explained below). Then, you can use the `trans()` method to translate your wording:

```php
<?php
echo $translator->trans('This product is no longer available.', [], 'Shop.Notifications.Error');
``` 

The `trans()` method takes three arguments:

1. `$id` – The wording you want to translate. Keep in mind that it has to be _exactly_ the same as the one in the default catalogue, or the translation won't work.
2. `$parameters` – An array of replacements, if any. ([Learn more about translation placeholders](https://symfony.com/doc/3.4/components/translation/usage.html#component-translation-placeholders)).
3. `$domain` – The [translation domain][translation-domains] for that wording.

{{% notice warning %}}
Be aware that in Symfony-based Admin controllers, the second and third arguments have been swapped in order to allow `$replacements` to be optional. For more, see [FrameworkBundleAdminController](https://github.com/PrestaShop/PrestaShop/blob/1.7.6.0/src/PrestaShopBundle/Controller/Admin/FrameworkBundleAdminController.php#L275).
{{% /notice %}}

##### Inside controllers

Controllers include a helper method named `trans()` that calls the translator internally:

```php
<?php
// legacy controllers
$this->trans('This product is no longer available.', [], 'Shop.Notifications.Error');

// Symfony-based controllers (FrameworkBundleAdminController)
$this->trans('This product is no longer available.', 'Shop.Notifications.Error', []);
```

##### Outside controllers

If you are outside a controller, and after careful consideration you think you absolutely need some stuff translated, then you can add it as a dependency of your class:

```php
<?php
// SomeService.php

namespace PrestaShop\PrestaShop\Core\Foo\Bar;

use Symfony\Component\Translation\TranslatorInterface;

class SomeService
{
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }
}
```

Then, inject it into your service using the Dependency Container:

```yaml
# services.yml

prestashop.core.foo.bar.some_service:
    class: 'PrestaShop\PrestaShop\Core\Foo\Bar\SomeService'
    arguments:
        - '@translator'
```

And finally, use the translator at will:

```php
<?php
// SomeService.php

$this->translator->trans('This product is no longer available.', [], 'Shop.Notifications.Error');
```

### Smarty templates

In `.tpl` files, use the `l` (lower case "L") macro:

```html
<div>{l s='This product is no longer available.' d='Shop.Notifications.Error'}</div>
```

If you have have replacements to peform in your wording, then there are two options:

1. Anonymous placeholders (eg. `%s`)

    ```html
    <div>{l s='List of products by supplier %s' sprintf=[$supplier.name] d='Shop.Theme.Catalog'}</div>
    ```
2. Named placeholders (eg. `%my_placeholder%`)

    ```html
    <div>{l s='There are %products_count% items in your cart.' sprintf=['%products_count%' => $cart.products_count] d='Shop.Theme.Checkout'}</div>
    ```

### Twig templates

In `.twig` files, you can use the `trans` filter from Twig:

```twig
<div>{{ 'Sort by'|trans({}, 'Admin.Actions') }}</div>
```

For information on more advanced features, head on to the [Symfony translator component documentation](https://symfony.com/doc/current/translation.html#twig-templates).

## Read more

{{% children %}}

[translation-domains]: {{< relref "translation-domains.md" >}}
