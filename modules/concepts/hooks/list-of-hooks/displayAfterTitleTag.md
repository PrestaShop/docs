---
Title: displayAfterTitleTag
hidden: true
hookTitle: 'After title tag'
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/_partials/head.tpl'
        file: 'Classic Theme: templates/_partials/head.tpl'
locations:
    - 'front office'
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'Use this hook to add content after title tag'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayAfterTitleTag'}
```
