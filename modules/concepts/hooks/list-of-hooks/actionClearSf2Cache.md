---
menuTitle: actionClearSf2Cache
Title: actionClearSf2Cache
hidden: true
hookTitle: Clear Sf2 cache
files:
  - src/Adapter/Cache/Clearer/SymfonyCacheClearer.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionClearSf2Cache

## Informations

{{% notice tip %}}
**Clear Sf2 cache:** 

This hook is called when the Symfony cache is cleared
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - src/Adapter/Cache/Clearer/SymfonyCacheClearer.php

## Hook call with parameters

```php
Hook::exec('actionClearSf2Cache');
```