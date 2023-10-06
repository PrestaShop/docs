---
menuTitle: actionCategoryDelete
Title: actionCategoryDelete
hidden: true
hookTitle: 'Category deletion'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Category.php'
        file: classes/Category.php
locations:
    - 'front office'
type: action
hookAliases:
    - categoryDeletion
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed when a category is deleted'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCategoryDelete', ['category' => $this, 'deleted_children' => $deletedChildren])
```
