---
menuTitle: actionProductOutOfStock
Title: actionProductOutOfStock
hidden: true
hookTitle: Out-of-stock product
files:
  - themes/classic/templates/catalog/_partials/product-details.tpl
locations:
  - frontoffice
types:
  - smarty
---

# Hook : actionProductOutOfStock

## Informations

{{% notice tip %}}
**Out-of-stock product:** 

This hook displays new action buttons if a product is out of stock
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - smarty

Located in: 
  - themes/classic/templates/catalog/_partials/product-details.tpl

## Hook call with parameters

```php
{hook h='actionProductOutOfStock' product=$product}
```