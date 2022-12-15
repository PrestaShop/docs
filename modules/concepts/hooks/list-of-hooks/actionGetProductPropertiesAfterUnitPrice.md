---
menuTitle: actionGetProductPropertiesAfterUnitPrice
Title: actionGetProductPropertiesAfterUnitPrice
hidden: true
hookTitle: Product Properties
files:
  - classes/Product.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionGetProductPropertiesAfterUnitPrice

## Information

{{% notice tip %}}
**Product Properties:** 

This hook is called after defining the properties of a product
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Product.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionGetProductPropertiesAfterUnitPrice', [
            'id_lang' => $id_lang,
            'product' => &$row,
            'context' => $context,
        ])
```