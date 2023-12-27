---
Title: displayNavFullWidth
hidden: true
hookTitle: Navigation
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/_partials/header.tpl
      file: themes/classic/templates/_partials/header.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/header.tpl
      file: themes/classic/templates/checkout/_partials/header.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/_partials/header.tpl
      file: themes/hummingbird/templates/_partials/header.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook displays full width navigation menu at the top of your pages

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayNavFullWidth'}
```
