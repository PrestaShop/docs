---
menuTitle: actionCategoryDelete
Title: actionCategoryDelete
hidden: true
hookTitle: Category deletion
files:
  - classes/Category.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionCategoryDelete

## Informations

{{% notice tip %}}
**Category deletion:** 

This hook is displayed when a category is deleted
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Category.php

## Hook call with parameters

```php
Hook::exec('actionCategoryDelete', ['category' => $this, 'deleted_children' => $deletedChildren]);
```