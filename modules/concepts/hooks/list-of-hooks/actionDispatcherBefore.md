---
menuTitle: actionDispatcherBefore
Title: actionDispatcherBefore
hidden: true
hookTitle: Before dispatch
files:
  - classes/Dispatcher.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionDispatcherBefore

## Informations

{{% notice tip %}}
**Before dispatch:** 

This hook is called at the beginning of the dispatch method of the Dispatcher
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Dispatcher.php

## Hook call with parameters

```php
Hook::exec('actionDispatcherBefore', ['controller_type' => $this->front_controller]);
```