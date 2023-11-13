---
Title: displayProductExtraContent
hidden: true
hookTitle: 'Add content to the product page'
files:
    - 
        theme: classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/catalog/product.tpl#L216'
        file: 'templates/catalog/product.tml'
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Product/ProductExtraContent.php'
        file: 'src/Core/Product/ProductExtraContent.php'
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Product/ProductExtraContentFinder.php'
        file: 'src/Core/Product/ProductExtraContentFinder.php'
locations:
    - 'front office'
type: display
hookAliases:
origin: core
array_return: false
check_exceptions: false
chain: false
description: 'Adds new field / content to the FO product page'
has_example: true
---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
protected $hookName = 'displayProductExtraContent';
protected $expectedInstanceClasses = ['PrestaShop\PrestaShop\Core\Product\ProductExtraContent'];
```

## Example implementation

This hook has been implemented as an example in our [modules examples repository - demoproductextracontent](https://github.com/PrestaShop/example-modules/tree/master/demoproductextracontent).

## Hook explained

This hook is a little more complicated than other ones. 

It starts by a render of extra contents, from the theme: 

```php
{foreach from=$product.extraContent item=extra key=extraKey}
    <div class="tab-pane fade in {$extra.attr.class}" id="extra-{$extraKey}" role="tabpanel" {foreach $extra.attr as $key => $val} {$key}="{$val}"{/foreach}>
        {$extra.content nofilter}
    </div>
{/foreach}
```

Then, the `product` entity uses a `ProductExtraContentFinder` to fetch all extra content. 

```php
class ProductExtraContentFinder extends HookFinder
{
    protected $hookName = 'displayProductExtraContent';
    protected $expectedInstanceClasses = ['PrestaShop\PrestaShop\Core\Product\ProductExtraContent'];
```

The `ProductExtraContentFinder` will look for modules implementing `displayProductExtraContent` methods, and will expect `ProductExtraContent` entities to be returned. 

```php
return (new PrestaShop\PrestaShop\Core\Product\ProductExtraContent())
    ->setTitle('example field')
    ->setContent('example content')
```

This content will be shown in a dedicated tab on the product page: 

![displayProductExtraContent](../screenshots/displayProductExtraContent.png)