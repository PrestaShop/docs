---
menuTitle: displayFooterProduct
Title: displayFooterProduct
hidden: true
hookTitle: Product footer
files:
  - themes/classic/templates/catalog/product.tpl
locations:
  - frontoffice
types:
  - smarty
---

# Hook : displayFooterProduct

## Informations

{{% notice tip %}}
**Product footer:** 

This hook adds new blocks under the product's description
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - smarty

Located in: 
  - themes/classic/templates/catalog/product.tpl

## Hook call with parameters

```php
{hook h='displayFooterProduct' product=$product category=$category}
```