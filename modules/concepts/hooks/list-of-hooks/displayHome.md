---
menuTitle: displayHome
Title: displayHome
hidden: true
hookTitle: Homepage content
files:
  - controllers/front/IndexController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : displayHome

## Informations

{{% notice tip %}}
**Homepage content:** 

This hook displays new elements on the homepage
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - controllers/front/IndexController.php

## Hook call with parameters

```php
Hook::exec('displayHome'),
```