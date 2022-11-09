---
menuTitle: actionCategoryUpdate
Title: actionCategoryUpdate
hidden: true
hookTitle: Category modification
files:
  - controllers/admin/AdminProductsController.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : actionCategoryUpdate

## Informations

{{% notice tip %}}
**Category modification:** 

This hook is displayed when a category is modified
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - controllers/admin/AdminProductsController.php

## Hook call with parameters

```php
Hook::exec('actionCategoryUpdate', ['category' => $category]);
```