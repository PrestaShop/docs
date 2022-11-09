---
menuTitle: displayHeader
Title: displayHeader
hidden: true
hookTitle: Pages html head section
files:
  - classes/controller/FrontController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : displayHeader

## Informations

{{% notice tip %}}
**Pages html head section:** 

This hook adds additional elements in the head section of your pages (head section of html)
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/FrontController.php

## Hook call with parameters

```php
Hook::exec('displayHeader'),
```