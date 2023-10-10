---
menuTitle: displayBeforeBodyClosingTag
Title: displayBeforeBodyClosingTag
hidden: true
hookTitle: 'Very bottom of pages'
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-both-columns.tpl'
        file: 'Classic Theme: templates/layouts/layout-both-columns.tpl'
locations:
    - 'front office'
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'Use this hook for your modals or any content you want to load at the very end'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayBeforeBodyClosingTag'}
```
