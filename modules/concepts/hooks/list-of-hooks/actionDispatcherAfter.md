---
menuTitle: actionDispatcherAfter
Title: actionDispatcherAfter
hidden: true
hookTitle: After dispatch
files:
  - classes/Dispatcher.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionDispatcherAfter

## Informations

{{% notice tip %}}
**After dispatch:** 

This hook is called at the end of the dispatch method of the Dispatcher
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Dispatcher.php

## Hook call with parameters

```php
Hook::exec('actionDispatcherAfter', $params_hook_action_dispatcher);
```