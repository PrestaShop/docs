---
menuTitle: actionCategoryDelete
Title: actionCategoryDelete
hidden: true
hookTitle: Category deletion
files:
  - classes/Category.php
locations:
  - front office
type: action
hookAliases:
 - categoryDeletion
---

# Hook actionCategoryDelete

Aliases: 
 - categoryDeletion



## Information

{{% notice tip %}}
**Category deletion:** 

This hook is displayed when a category is deleted
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Category.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Category.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionCategoryDelete', ['category' => $this, 'deleted_children' => $deletedChildren])
```