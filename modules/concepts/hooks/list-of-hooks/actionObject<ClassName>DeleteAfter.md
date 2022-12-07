---
menuTitle: actionObject<ClassName>DeleteAfter
Title: actionObject<ClassName>DeleteAfter
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

# Hook actionObject<ClassName>DeleteAfter

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
Hook::exec('actionObject' . $this->getFullyQualifiedName() . 'DeleteAfter', ['object' => $this]);
```