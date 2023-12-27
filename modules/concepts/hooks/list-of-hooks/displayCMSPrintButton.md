---
Title: displayCMSPrintButton
hidden: true
hookTitle: displayCMSPrintButton
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/cms/page.tpl
      file: themes/classic/templates/cms/page.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/cms/page.tpl
      file: themes/hummingbird/templates/cms/page.tpl

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
{hook h='displayCMSPrintButton'}
```
