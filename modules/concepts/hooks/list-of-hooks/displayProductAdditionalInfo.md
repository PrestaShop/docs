---
menuTitle: displayProductAdditionalInfo
Title: displayProductAdditionalInfo
hidden: true
hookTitle: Product page additional info
files:
  - themes/classic/templates/catalog/_partials/quickview.tpl
locations:
  - frontoffice
types:
  - smarty
---

# Hook : displayProductAdditionalInfo

## Informations

{{% notice tip %}}
**Product page additional info:** 

This hook adds additional information on the product page
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - smarty

Located in: 
  - themes/classic/templates/catalog/_partials/quickview.tpl

## Hook call with parameters

```php
{hook h='displayProductAdditionalInfo' product=$product}
```