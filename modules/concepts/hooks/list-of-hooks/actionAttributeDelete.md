---
menuTitle: actionAttributeDelete
Title: actionAttributeDelete
hidden: true
hookTitle: 'Deleting an attributes features value'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ProductAttribute.php'
        file: classes/ProductAttribute.php
locations:
    - 'front office'
type: action
hookAliases:
    - afterDeleteAttribute
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called while deleting an attributes features value'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionAttributeDelete', ['id_attribute' => $this->id])
```
