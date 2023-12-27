---
Title: displayGDPRConsent
hidden: true
hookTitle: displayGDPRConsent
files:
    -
      module: contactform
      url: https://github.com/PrestaShop/contactform/blob/dev/views/templates/hook/contactform.tpl
      file: modules/contactform/views/templates/hook/contactform.tpl
    -
      module: productcomments
      url: https://github.com/PrestaShop/productcomments/blob/dev/views/templates/hook/post-comment-modal.tpl
      file: modules/productcomments/views/templates/hook/post-comment-modal.tpl
    -
      module: ps_emailalerts
      url: https://github.com/PrestaShop/ps_emailalerts/blob/dev/views/templates/hook/product.tpl
      file: modules/ps_emailalerts/views/templates/hook/product.tpl
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
      url: https://github.com/PrestaShop/classic-theme/blob/develop/modules/contactform/views/templates/widget/contactform.tpl
      file: themes/classic/modules/contactform/views/templates/widget/contactform.tpl
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
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/modules/contactform/views/templates/widget/contactform.tpl
      file: themes/hummingbird/modules/contactform/views/templates/widget/contactform.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/modules/productcomments/views/templates/hook/post-comment-modal.tpl
      file: themes/hummingbird/modules/productcomments/views/templates/hook/post-comment-modal.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/modules/ps_emailalerts/views/templates/hook/product.tpl
      file: themes/hummingbird/modules/ps_emailalerts/views/templates/hook/product.tpl
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
{hook h='displayGDPRConsent' id_module=$id_module}
```
