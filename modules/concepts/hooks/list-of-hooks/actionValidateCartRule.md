---
Title: actionValidateCartRule
hidden: true
hookTitle: 'Alter cart rule validation process'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/CartRule.php'
        file: classes/CartRule.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Allow modules to implement their own rules to validate a cart rule.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionValidateCartRule',
            [
                'cart_rule' => $this,
                'cart' => $cart,
                'alreadyInCart' => $alreadyInCart,
                'display_error' => $display_error,
                'check_carrier' => $check_carrier,
                'useOrderPrices' => $useOrderPrices,
                'isValidatedByModules' => &$isValidatedByModules,
                'isValidatedByModulesError' => &$isValidatedByModulesError,
            ]
        );
```
