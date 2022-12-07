---
menuTitle: actionValidateStepComplete
Title: actionValidateStepComplete
hidden: true
hookTitle: 
files:
  - classes/checkout/CheckoutDeliveryStep.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionValidateStepComplete

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/checkout/CheckoutDeliveryStep.php](classes/checkout/CheckoutDeliveryStep.php)

## Parameters details

```php
    <?php
    array(
      'step_name' => 'delivery',
      'request_params' => $requestParams,
      'completed' => &$isComplete,
    );
```

## Hook call in codebase

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