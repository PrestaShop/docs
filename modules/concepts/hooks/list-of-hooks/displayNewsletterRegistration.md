---
Title: displayNewsletterRegistration
hidden: true
hookTitle: displayNewsletterRegistration
files:
    -
      module: ps_emailsubscription
      url: https://github.com/PrestaShop/ps_emailsubscription/blob/dev/views/templates/hook/ps_emailsubscription-column.tpl
      file: modules/ps_emailsubscription/views/templates/hook/ps_emailsubscription-column.tpl
    -
      module: ps_emailsubscription
      url: https://github.com/PrestaShop/ps_emailsubscription/blob/dev/views/templates/hook/ps_emailsubscription.tpl
      file: modules/ps_emailsubscription/views/templates/hook/ps_emailsubscription.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/modules/ps_emailsubscription/views/templates/hook/ps_emailsubscription-column.tpl
      file: themes/classic/modules/ps_emailsubscription/views/templates/hook/ps_emailsubscription-column.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/modules/ps_emailsubscription/views/templates/hook/ps_emailsubscription.tpl
      file: themes/classic/modules/ps_emailsubscription/views/templates/hook/ps_emailsubscription.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/modules/ps_emailsubscription/views/templates/hook/ps_emailsubscription-column.tpl
      file: themes/hummingbird/modules/ps_emailsubscription/views/templates/hook/ps_emailsubscription-column.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/modules/ps_emailsubscription/views/templates/hook/ps_emailsubscription.tpl
      file: themes/hummingbird/modules/ps_emailsubscription/views/templates/hook/ps_emailsubscription.tpl

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
{hook h='displayNewsletterRegistration'}
```
