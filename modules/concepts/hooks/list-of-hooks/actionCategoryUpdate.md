---
menuTitle: actionCategoryUpdate
Title: actionCategoryUpdate
hidden: true
hookTitle: Category modification
files:
  - controllers/admin/AdminProductsController.php
locations:
  - back office
type: action
hookAliases:
 - categoryUpdate
---

# Hook actionCategoryUpdate

Aliases: 
 - categoryUpdate



## Information

{{% notice tip %}}
**Category modification:** 

This hook is displayed when a category is modified
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminProductsController.php](controllers/admin/AdminProductsController.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionCategoryUpdate', ['category' => $category])
```