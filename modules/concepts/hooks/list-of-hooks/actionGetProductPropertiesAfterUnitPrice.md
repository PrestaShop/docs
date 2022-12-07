---
menuTitle: actionGetProductPropertiesAfterUnitPrice
Title: actionGetProductPropertiesAfterUnitPrice
hidden: true
hookTitle: Product Properties
files:
  - classes/Product.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionGetProductPropertiesAfterUnitPrice

## Information

{{% notice tip %}}
**Product Properties:** 

This hook is called after defining the properties of a product
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php](classes/Product.php)

## Hook call in codebase

```php
Hook::exec('actionGetProductPropertiesAfterUnitPrice', [
            'id_lang' => $id_lang,
            'product' => &$row,
            'context' => $context,
        ])
```