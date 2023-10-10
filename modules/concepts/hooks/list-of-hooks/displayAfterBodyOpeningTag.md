---
menuTitle: displayAfterBodyOpeningTag
Title: displayAfterBodyOpeningTag
hidden: true
hookTitle: 'Very top of pages'
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-both-columns.tpl'
        file: 'Classic Theme: templates/layouts/layout-both-columns.tpl'
locations:
    - 'front office'
type: display
origin: theme
hookAliases: 
array_return: false
check_exceptions: false
chain: false
description: 'Use this hook for advertisement or modals you want to load first'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayAfterBodyOpeningTag'}
```
