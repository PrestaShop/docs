---
menuTitle: actionCategoryAdd
Title: actionCategoryAdd
hidden: true
hookTitle: Category creation
files:
  - classes/Category.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionCategoryAdd

## Informations

{{% notice tip %}}
**Category creation:** 

This hook is displayed when a category is created
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Category.php

## Hook call with parameters

```php
Hook::exec('actionCategoryAdd', ['category' => $this]);
```