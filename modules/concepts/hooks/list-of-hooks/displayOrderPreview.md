---
menuTitle: displayOrderPreview
Title: displayOrderPreview
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/preview.html.twig
locations:
  - back office
type: display
hookAliases:
---

# Hook displayOrderPreview

## Information

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/preview.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/preview.html.twig)

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