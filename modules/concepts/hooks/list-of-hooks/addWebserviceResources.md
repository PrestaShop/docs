---
Title: addWebserviceResources
hidden: true
hookTitle: 'Add extra webservice resource'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/webservice/WebserviceRequest.php'
        file: classes/webservice/WebserviceRequest.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: true
check_exceptions: false
chain: false
origin: core
description: 'This hook is called when webservice resources list in webservice controller'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('addWebserviceResources', ['resources' => $resources], null, true, false);
```
