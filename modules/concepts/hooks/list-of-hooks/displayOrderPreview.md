---
Title: displayOrderPreview
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/preview.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/preview.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'order_id' => (integer) Order Id
    );
```

## Call of the Hook in the origin file

```php
{{ renderhook('displayOrderPreview', {'order_id': orderId}) }}
```
