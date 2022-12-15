---
menuTitle: displayProductAdditionalInfo
Title: displayProductAdditionalInfo
hidden: true
hookTitle: Product page additional info
files:
  - themes/classic/templates/catalog/_partials/quickview.tpl
locations:
  - front office
type: display
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
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/catalog/_partials/quickview.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/catalog/_partials/quickview.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayProductAdditionalInfo' product=$product}
```