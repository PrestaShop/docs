---
Title: displayAfterBodyOpeningTag
hidden: true
hookTitle: Very top of pages
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-both-columns.tpl
      file: themes/classic/templates/layouts/layout-both-columns.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/templates/layouts/layout-both-columns.tpl
      file: themes/hummingbird/templates/layouts/layout-both-columns.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: Use this hook for advertisement or modals you want to load first

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayAfterBodyOpeningTag'}
```
