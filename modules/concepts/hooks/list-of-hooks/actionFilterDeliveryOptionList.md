---
menuTitle: actionFilterDeliveryOptionList
Title: actionFilterDeliveryOptionList
hidden: true
hookTitle: Modify delivery option list result
files:
  - classes/Cart.php
locations:
  - front office
type: action
hookAliases:
hasExample: true
---

# Hook actionFilterDeliveryOptionList

## Information

{{% notice tip %}}
**Modify delivery option list result:** 

This hook allows you to modify delivery option list
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Cart.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Cart.php)

## Parameters details

```php
    <?php
    [
        'delivery_option_list' => (array) &$delivery_option_list,
    ]
```

## Call of the Hook in the origin file

```php
Hook::exec(
    'actionFilterDeliveryOptionList',
    [
        'delivery_option_list' => &$delivery_option_list,
    ]
)
```

## Example implementation

For example :

- a module can decide to display or not a certain carrier depending on the customer group
- a module can decide to block a means of delivery for a specific customer or group of customers
- a module can decide to display or not a carrier according to the date?

In this example, we disable the express delivery carrier on saturdays and sundays because our delivery promise of 24 hours cannot be satisfied: 

```php
<?php
class MyCarrierConditionDisablerModule extends Module 
{
        
    public function install()
    {
        return parent::install() && $this->registerHook('actionFilterDeliveryOptionList');
    }

    public function hookActionCustomFilterDeliveryOptionList($params)
    {
        $deliveryOptionList = $params['delivery_option_list'];
        
        if(0 == date('w') || 6 == date('w')){ // sundays or saturdays
            // find carrier in $deliveryOptionList, and remove it
        }
    }
}
```