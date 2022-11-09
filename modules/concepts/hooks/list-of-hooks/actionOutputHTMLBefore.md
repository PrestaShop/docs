---
menuTitle: actionOutputHTMLBefore
Title: actionOutputHTMLBefore
hidden: true
hookTitle: Before HTML output
files:
  - classes/controller/FrontController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionOutputHTMLBefore

## Informations

{{% notice tip %}}
**Before HTML output:** 

This hook is used to filter the whole HTML page before it is rendered (only front)
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/FrontController.php

## Hook call with parameters

```php
Hook::exec('actionOutputHTMLBefore', ['html' => &$html]);
```