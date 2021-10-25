---
title: Dispatching a Hook
weight: 20
---

# Dispatching a Hook

Hooks are placed everywhere throughout the software. Whenever a given hook is dispatched, the Hook component will check which modules subscribed to that hook and notify them by successively calling each subscriber's callback.

Hooks are dispatched using the `Hook::exec()` function.

```php
Hook::exec(
    string $hookName,
    array $arguments, 
    ?int $moduleId = null, 
    bool $returnArray = false, 
    bool $checkExceptions = true, 
    bool $usePush = false, 
    int $shopId = null, 
    bool $chain = false
): mixed 
```

This method returns the result of all hook notification callbacks. The return type will depend on the notification callbacks and the value of `$returnArray`.

##### Parameters

`$hookName`
:
Name of the hook to dispatch.

`$arguments`
:
Parameters to send with the hook event to subscribers.

`$moduleId`
:
If defined, only the specified module will be notified for this hook event.  
**Note:** the module needs to have subscribed to the hook already.

`$returnArray`
:
This parameter governs the return type for this method. By default, the return values from each callback will be concatenated and returned. If `$returnArray` is set to true, then this method will return an associative array of return values, indexed by module name.   
Note that this argument is incompatible with `$chain` and will be disabled automatically disabled if chaining is enabled.

`$checkExceptions`
:
Modules can opt out from being notified for a hook if it's triggered in specific pages (module hook exceptions). If this parameter is set to false, these exceptions will be ignored and the modules will be notified anyway.  
**Note:** if the hook is triggered in the Back office, disabling this feature will bypass access restrictions to modules, allowing modules to be notified of the hook event even when the current employee's access restrictions to that module wouldn't normally allow it.

`$usePush`
:
If enabled, the hook dispatcher will wait for the push file of any subscribed module to be updated before notifying it of the hook event.

`$shopId`
:
This parameter is related to multistore. If set, the shop context will be switched to the specified shop for the duration of the dispatch.

`$chain`
:
If this parameter is set to true, then the result of each subscriber callback will be used as parameters of the next subscriber's callback.

##### Example

```php
$id = Hook::exec('actionModifyZoning', ['address_id' => $addressID]);
```

In the example above, we dispatch the `actionModifyZoning` hook, along the `address_id` parameter. `$id` will contain the concatenation of all the values returned by subscribers' callbacks (if any).

## Dispatching a hook from a template

Hooks can be dispatched from templates as well.

### Smarty

```smarty
{hook h='displayProductPriceBlock' product=$product type="unit_price"}
```

### Twig

```twig
{{ renderhook('displayAdminProductsMainStepLeftColumnMiddle', { 'id_product': productId }) }}
```

## Creating a new hook

Dispatching a new hook doesn't require any special steps, you can simply choose a hook name, and call your new hook from wherever you need – even from within a module!

{{% notice tip %}}
Remember that hook names are global – choose your hook names carefully to reduce risks of collision with other modules or future Core hooks.
{{% /notice %}}
