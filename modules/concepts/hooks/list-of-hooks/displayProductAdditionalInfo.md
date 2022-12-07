---
menuTitle: displayProductAdditionalInfo
Title: displayProductAdditionalInfo
hidden: true
hookTitle: Product page additional info
files:
  - themes/classic/templates/catalog/_partials/quickview.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
 - productActions
 - displayProductButtons
---

# Hook displayProductAdditionalInfo

Aliases: 
 - productActions
 - displayProductButtons



## Information

{{% notice tip %}}
**Product page additional info:** 

This hook adds additional information on the product page
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/catalog/_partials/quickview.tpl](themes/classic/templates/catalog/_partials/quickview.tpl)

## Hook call in codebase

```php
{hook h='displayProductAdditionalInfo' product=$product}
```