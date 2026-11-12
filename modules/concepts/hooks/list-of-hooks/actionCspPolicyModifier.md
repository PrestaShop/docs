---
Title: actionCspPolicyModifier
hidden: true
hookTitle: 'Modify the Content Security Policy'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/Csp/CspPolicyHookDispatcher.php'
        file: src/Adapter/Csp/CspPolicyHookDispatcher.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called while the storefront Content Security Policy is being built. A module receives the mutable policy object in the "policy" parameter and may add sources to it with addSource(). Contributions are additive only — a module cannot remove or replace a source another contributor added. It applies to the storefront surface only (the back-office policy is not extensible from modules). Available since 9.3, behind the "csp" feature flag.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCspPolicyModifier', ['policy' => $policy]);
```
