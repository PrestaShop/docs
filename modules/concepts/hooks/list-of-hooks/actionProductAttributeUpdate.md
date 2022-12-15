---
menuTitle: actionProductAttributeUpdate
Title: actionProductAttributeUpdate
hidden: true
hookTitle: Product attribute update
files:
  - classes/Product.php
locations:
  - front office
type: action
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
  - front office

Hook type: action

Located in: 
  - [classes/Product.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionProductAttributeUpdate', ['id_product_attribute' => (int) $id_product_attribute])
```