---
Title: actionCategoryUpdate
hidden: true
hookTitle: 'Category modification'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Category.php'
        file: classes/Category.php
locations:
    - 'back office'
type: action
hookAliases: actionCategoryUpdate
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed when a category is modified'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCategoryUpdate', ['category' => new Category($movedCategory['id_category'])]);
```
