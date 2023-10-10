---
Title: actionCategoryAdd
hidden: true
hookTitle: 'Category creation'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Category.php'
        file: classes/Category.php
locations:
    - 'front office'
type: action
hookAliases:
    - categoryAddition
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed when a category is created'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCategoryAdd', ['category' => $this])
```
