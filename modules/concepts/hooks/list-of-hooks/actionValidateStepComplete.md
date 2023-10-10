---
menuTitle: actionValidateStepComplete
Title: actionValidateStepComplete
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/checkout/CheckoutDeliveryStep.php'
        file: classes/checkout/CheckoutDeliveryStep.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'step_name' => 'delivery',
      'request_params' => $requestParams,
      'completed' => &$isComplete,
    );
```

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionValidateStepComplete',
            [
                'step_name' => 'delivery',
                'request_params' => $requestParams,
                'completed' => &$isComplete,
            ],
            Module::getModuleIdByName($currentDeliveryOption['external_module_name'])
        )
```
