---
menuTitle: actionCartSummary
Title: actionCartSummary
hidden: true
hookTitle: 
files:
  - classes/Cart.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionCartSummary

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Cart.php](classes/Cart.php)

## Hook call in codebase

```php
Hook::exec('actionCartSummary', $summary, null, true)
```