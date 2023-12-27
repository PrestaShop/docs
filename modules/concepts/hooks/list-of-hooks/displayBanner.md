---
Title: displayBanner
hidden: true
hookTitle: Very top of pages
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/_partials/header.tpl
      file: themes/classic/templates/_partials/header.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/templates/_partials/header.tpl
      file: themes/hummingbird/templates/_partials/header.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: Use this hook for banners on top of every pages

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayBanner'}
```
