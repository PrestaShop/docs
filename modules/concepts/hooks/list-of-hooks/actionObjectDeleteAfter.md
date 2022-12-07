---
menuTitle: actionObjectDeleteAfter
Title: actionObjectDeleteAfter
hidden: true
hookTitle: 
files:
  - classes/ObjectModel.php
locations:
  - backoffice
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionObjectDeleteAfter

## Information

Hook locations: 
  - backoffice
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ObjectModel.php](classes/ObjectModel.php)

## Hook call in codebase

```php
Hook::exec('actionObjectDeleteAfter', ['object' => $this])
```