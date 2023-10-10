---
Title: actionCategoryUpdate
hidden: true
hookTitle: 'Category modification'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminProductsController.php'
        file: controllers/admin/AdminProductsController.php
locations:
    - 'back office'
type: action
hookAliases:
    - categoryUpdate
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed when a category is modified'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCategoryUpdate', ['category' => $category])
```
