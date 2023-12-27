---
Title: displayFooterAfter
hidden: true
hookTitle: displayFooterAfter
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/_partials/footer.tpl
      file: themes/classic/templates/_partials/footer.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/templates/_partials/footer.tpl
      file: themes/hummingbird/templates/_partials/footer.tpl

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
{hook h='displayFooterAfter'}
```
