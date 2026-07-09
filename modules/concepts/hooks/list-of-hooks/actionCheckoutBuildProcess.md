---
Title: actionCheckoutBuildProcess
hidden: true
hookTitle: 'Build checkout process'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.2.x/src/Adapter/Order/Checkout/CheckoutProcessProviderResolver.php'
        file: src/Adapter/Order/Checkout/CheckoutProcessProviderResolver.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: true
check_exceptions: false
chain: false
origin: core
description: 'This hook is triggered before the checkout is rendered. Modules may return a checkout process provider. The provider is used only when exactly one enabled and valid provider is available.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCheckoutBuildProcess', [], null, true);
```
