---
Title: actionSubmitAccountBefore
hidden: true
hookTitle: 'Before customer account creation'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/checkout/CheckoutPersonalInformationStep.php'
        file: classes/checkout/CheckoutPersonalInformationStep.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/front/RegistrationController.php'
        file: controllers/front/RegistrationController.php
locations:
    - 'front office'
type: action
hookAliases:
    - actionBeforeSubmitAccount
array_return: true
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before a customer account creation'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionSubmitAccountBefore', [], null, true), function ($carry, $item) { return $carry && $item; }, true )
```
