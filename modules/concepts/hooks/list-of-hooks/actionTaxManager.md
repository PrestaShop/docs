---
Title: actionTaxManager
hidden: true
hookTitle: 'Tax Manager Factory'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/tax/TaxManagerFactory.php'
        file: classes/tax/TaxManagerFactory.php
locations:
    - 'front office'
type: action
hookAliases: taxManager
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is launched by the Tax Manager Factory'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$tax_manager = $module_instance->hookTaxManager([
    'address' => $address,
    'params' => $type,
]);
```
