---
Title: displayAfterProductThumbs
hidden: true
hookTitle: Display extra content below product thumbs
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/catalog/_partials/product-cover-thumbnails.tpl
      file: themes/classic/templates/catalog/_partials/product-cover-thumbnails.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/templates/catalog/_partials/product-cover-thumbnails.tpl
      file: themes/hummingbird/templates/catalog/_partials/product-cover-thumbnails.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook displays new elements below product images ex. additional media

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayAfterProductThumbs' product=$product}
```
