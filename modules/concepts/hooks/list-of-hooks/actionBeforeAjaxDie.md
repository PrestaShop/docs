---
menuTitle: actionBeforeAjaxDie
Title: actionBeforeAjaxDie
hidden: true
hookTitle: 
files:
  - classes/controller/Controller.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionBeforeAjaxDie

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/Controller.php

## Hook call with parameters

```php
Hook::exec('actionBeforeAjaxDie' . $controller . $method, ['value' => $value]);
```