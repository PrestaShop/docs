---
menuTitle: displayFooter
Title: displayFooter
hidden: true
hookTitle: Footer
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/_partials/footer.tpl'
        file: 'Classic Theme: templates/_partials/footer.tpl'
locations:
    - 'front office'
type: display
hookAliases:
    - footer
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'This hook displays new blocks in the footer'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayFooter'}
```
