---
menuTitle: addWebserviceResources
Title: addWebserviceResources
hidden: true
hookTitle: Add extra webservice resource
files:
  - classes/webservice/WebserviceRequest.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : addWebserviceResources

## Informations

{{% notice tip %}}
**Add extra webservice resource:** 

This hook is called when webservice resources list in webservice controller
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/webservice/WebserviceRequest.php

## Hook call with parameters

```php
Hook::exec('addWebserviceResources', ['resources' => $resources], null, true, false);
```