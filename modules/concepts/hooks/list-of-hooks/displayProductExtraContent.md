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

This hook has been implemented as an example in our [example-modules repository - demoproductextracontent](https://github.com/PrestaShop/example-modules/tree/master/demoproductextracontent).

## Hook explained

This hook is a little more complicated than the other ones. It renders the provided content on the theme level. By default, it uses Bootstrap tabs to display it:

```php
{foreach from=$product.extraContent item=extra key=extraKey}
    <div class="tab-pane fade in {$extra.attr.class}" id="extra-{$extraKey}" role="tabpanel" {foreach $extra.attr as $key => $val} {$key}="{$val}"{/foreach}>
        {$extra.content nofilter}
    </div>
{/foreach}
```

In the front office, `ProductController` fetches all extra content using a `ProductExtraContentFinder`. 

```php
class ProductExtraContentFinder extends HookFinder
{
    protected $hookName = 'displayProductExtraContent';
    protected $expectedInstanceClasses = ['PrestaShop\PrestaShop\Core\Product\ProductExtraContent'];
```

The `ProductExtraContentFinder` will look for modules hooked into `displayProductExtraContent`  with the corresponding existing method, and will expect `ProductExtraContent` to be returned. 

```php
return (new PrestaShop\PrestaShop\Core\Product\ProductExtraContent())
    ->setTitle('example field')
    ->setContent('example content')
```

This content will be shown in a dedicated tab on the product page: 

![displayProductExtraContent](../screenshots/displayProductExtraContent.png)