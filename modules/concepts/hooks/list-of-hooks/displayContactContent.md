---
menuTitle: displayContactContent
Title: displayContactContent
hidden: true
hookTitle: 'Content wrapper section of the contact page'
files:
    -
        url: 'https://github.com/PrestaShop/hummingbird/blob/develop/templates/contact.tpl'
        file: 'Hummingbird Theme: templates/contact.tpl'
    -
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/contact.tpl'
        file: 'Classic Theme: templates/contact.tpl'
locations:
    - 'front office'
type: display
hookAliases: null
origin: theme
array_return: false
check_exceptions: false
chain: false
description: "This hook displays new elements in the content wrapper of the contact page.\nThis replaces widget `contactform`."

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayContactContent'}
```
