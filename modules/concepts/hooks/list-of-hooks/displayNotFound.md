---
Title: displayNotFound
hidden: true
hookTitle: displayNotFound
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/errors/not-found.tpl
      file: themes/classic/templates/errors/not-found.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/templates/errors/not-found.tpl
      file: themes/hummingbird/templates/errors/not-found.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayNotFound'}
```
