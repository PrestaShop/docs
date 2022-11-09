---
menuTitle: actionAjaxDie
Title: actionAjaxDie
hidden: true
hookTitle: 
files:
  - classes/controller/Controller.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionAjaxDie

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/Controller.php

## Hook call with parameters

```php
Hook::exec('actionAjaxDie' . $controller . $method . 'Before', ['value' => $value]);
```