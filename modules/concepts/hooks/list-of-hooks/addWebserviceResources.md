---
menuTitle: addWebserviceResources
Title: addWebserviceResources
hidden: true
hookTitle: Add extra webservice resource
files:
  - classes/webservice/WebserviceRequest.php
locations:
  - front office
type: 
hookAliases:
---

# Hook addWebserviceResources

## Information

{{% notice tip %}}
**Add extra webservice resource:** 

This hook is called when webservice resources list in webservice controller
{{% /notice %}}

Hook locations: 
  - front office

Hook type: 

Located in: 
  - [classes/webservice/WebserviceRequest.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/webservice/WebserviceRequest.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

This hook has a `$check_exceptions` parameter set to `false` (check permission exceptions, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec('addWebserviceResources', ['resources' => $resources], null, true, false)
```