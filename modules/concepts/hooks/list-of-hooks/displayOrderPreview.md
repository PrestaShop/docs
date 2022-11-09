---
menuTitle: displayOrderPreview
Title: displayOrderPreview
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/preview.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayOrderPreview

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/preview.html.twig

## Hook call with parameters

```php
{{ renderhook('displayOrderPreview', {'order_id': orderId}) }}
```