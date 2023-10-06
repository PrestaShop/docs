---
menuTitle: displayHome
Title: displayHome
hidden: true
hookTitle: 'Homepage content'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/IndexController.php'
        file: controllers/front/IndexController.php
locations:
    - 'front office'
type: display
hookAliases:
    - home
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook displays new elements on the homepage'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('displayHome')
```
