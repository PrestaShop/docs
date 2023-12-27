---
Title: displayFooterProduct
hidden: true
hookTitle: Product footer
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/catalog/product.tpl
      file: themes/classic/templates/catalog/product.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/templates/catalog/product.tpl
      file: themes/hummingbird/templates/catalog/product.tpl

locations:
    - front office
type: display
hookAliases:
    - productfooter 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook adds new blocks under the product's description

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayFooterProduct' product=$product category=$category}
```
