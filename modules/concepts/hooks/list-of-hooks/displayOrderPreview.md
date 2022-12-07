---
menuTitle: displayOrderPreview
Title: displayOrderPreview
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/preview.html.twig
locations:
  - backoffice
type:
  - display
hookAliases:
---

# Hook displayOrderPreview

## Information

Hook locations: 
  - backoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/preview.html.twig](src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/preview.html.twig)

## Parameters details

```php
    <?php
    array(
      'order_id' => (integer) Order Id
    );
```

## Hook call in codebase

```php
{{ renderhook('displayOrderPreview', {'order_id': orderId}) }}
```