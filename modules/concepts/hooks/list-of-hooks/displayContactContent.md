---
Title: displayContactContent
hidden: true
hookTitle: Content wrapper section of the contact page
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/contact.tpl
      file: themes/classic/templates/contact.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/contact.tpl
      file: themes/hummingbird/templates/contact.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook displays new elements in the content wrapper of the contact page

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayContactContent'}
```
