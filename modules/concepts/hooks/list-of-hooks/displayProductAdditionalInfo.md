---
Title: displayProductAdditionalInfo
hidden: true
hookTitle: 'Product page additional info'
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/catalog/_partials/quickview.tpl'
        file: 'Classic Theme: templates/catalog/_partials/quickview.tpl'
locations:
    - 'front office'
type: display
hookAliases:
    - productActions
    - displayProductButtons
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'This hook adds additional information on the product page'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayProductAdditionalInfo' product=$product}
```
