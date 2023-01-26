---
menuTitle: Using the Translator
title: Using the Translator to translate wordings
weight: 30
---

# Using the Translator to translate wordings

{{% notice note %}}
This section provides an quick reference on how to use the Translator. For more information, read Symfony's documentation on [Using the Translator](https://symfony.com/doc/4.4/components/translation/usage.html).
{{% /notice %}}

## PHP files

To translate wordings in PHP files, you first need an instance of the `Translator` service (explained below). Then, you can use the `trans()` method to translate your wording:

```php
<?php
echo $translator->trans('This product is no longer available.', [], 'Shop.Notifications.Error');
```

The `trans()` method takes three arguments:

1. `$id` – The wording you want to translate. Keep in mind that it has to be _exactly_ the same as the one in the default catalogue, or the translation won't work.
2. `$parameters` – An array of replacements, if any. ([Learn more about translation placeholders](https://symfony.com/doc/4.4/components/translation/usage.html#component-translation-placeholders)).
3. `$domain` – The [translation domain][translation-domains] for that wording.

{{% notice warning %}}
Be aware that in Symfony-based Admin controllers, the second and third arguments have been swapped in order to allow `$replacements` to be optional. For more, see [FrameworkBundleAdminController](https://github.com/PrestaShop/PrestaShop/blob/8.0.0/src/PrestaShopBundle/Controller/Admin/FrameworkBundleAdminController.php#L299).
{{% /notice %}}

### Inside controllers

Controllers include a helper method named `trans()` that calls the translator internally:

```php
<?php
// legacy controllers
$this->trans('This product is no longer available.', [], 'Shop.Notifications.Error');

// Symfony-based controllers (FrameworkBundleAdminController)
$this->trans('This product is no longer available.', 'Shop.Notifications.Error', []);
```

### Outside controllers

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

## Smarty templates

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

**Note:** The `l` macro does not support escaping the strings for javascript. Instead you can assign the translation to a variable and escape it afterwards:

```html
{assign var='translatedString' value={l s='Text containing single quote' d='Modules.Mymodule.Shop'}}
<script>var text='{$translatedString|escape:'javascript'}';</script>
```

## Twig templates

In `.twig` files, you can use the `trans` filter from Twig:

```twig
<div>{{ 'This product is no longer available.'|trans({}, 'Shop.Notifications.Error') }}</div>
```

You can also use named placeholders:

```twig
<div>{{ 'There are %products_count% items in your cart.'|trans({'%products_count%': cart.products_count}, 'Shop.Theme.Checkout') }}</div>
```

{{% notice note %}}
For information on more advanced Twig translation features, head on to the [Symfony translator component's documentation](https://symfony.com/doc/4.4/translation.html#twig-templates).
{{% /notice %}}
