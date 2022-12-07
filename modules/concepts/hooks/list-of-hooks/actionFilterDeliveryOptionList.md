---
menuTitle: actionFilterDeliveryOptionList
Title: actionFilterDeliveryOptionList
hidden: true
hookTitle: Modify delivery option list result
files:
  - classes/Cart.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionFilterDeliveryOptionList

## Information

{{% notice tip %}}
**Modify delivery option list result:** 

This hook allows you to modify delivery option list
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Cart.php](classes/Cart.php)

## Parameters details

```php
    <?php
    [
        'delivery_option_list' => (array) &$delivery_option_list,
    ]
```

## Hook call in codebase

```php
Hook::exec(
            'actionFilterDeliveryOptionList',
            [
                'delivery_option_list' => &$delivery_option_list,
            ]
        )
```