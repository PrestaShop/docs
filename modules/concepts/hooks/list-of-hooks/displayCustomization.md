---
menuTitle: displayCustomization
Title: displayCustomization
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php'
        file: classes/Product.php
locations:
    - 'front office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('displayCustomization', ['customization' => $row], (int) $row['id_module'])
```
