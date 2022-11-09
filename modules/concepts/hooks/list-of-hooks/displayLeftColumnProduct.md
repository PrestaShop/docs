---
menuTitle: displayLeftColumnProduct
Title: displayLeftColumnProduct
hidden: true
hookTitle: New elements on the product page (left column)
files:
  - themes/classic/templates/layouts/layout-both-columns.tpl
locations:
  - frontoffice
types:
  - smarty
---

# Hook : displayLeftColumnProduct

## Informations

{{% notice tip %}}
**New elements on the product page (left column):** 

This hook displays new elements in the left-hand column of the product page
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - smarty

Located in: 
  - themes/classic/templates/layouts/layout-both-columns.tpl

## Hook call with parameters

```php
{hook h='displayLeftColumnProduct' product=$product category=$category}
```