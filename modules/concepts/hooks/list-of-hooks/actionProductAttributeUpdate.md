---
menuTitle: actionProductAttributeUpdate
Title: actionProductAttributeUpdate
hidden: true
hookTitle: Product attribute update
files:
  - classes/Product.php
locations:
  - frontoffice
type:
  - action
hookAliases:
 - updateProductAttribute
---

# Hook actionProductAttributeUpdate

Aliases: 
 - updateProductAttribute



## Information

{{% notice tip %}}
**Product attribute update:** 

This hook is displayed when a product's attribute is updated
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php](classes/Product.php)

## Hook call in codebase

```php
Hook::exec('actionProductAttributeUpdate', ['id_product_attribute' => (int) $id_product_attribute])
```