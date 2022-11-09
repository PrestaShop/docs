---
menuTitle: actionAjaxDieBefore
Title: actionAjaxDieBefore
hidden: true
hookTitle: 
files:
  - classes/controller/Controller.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionAjaxDieBefore

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/Controller.php

## Hook call with parameters

```php
Hook::exec('actionAjaxDieBefore', ['controller' => $controller, 'method' => $method, 'value' => $value]);
```