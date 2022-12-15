---
menuTitle: actionProductAttributeDelete
Title: actionProductAttributeDelete
hidden: true
hookTitle: Product attribute deletion
files:
  - classes/Product.php
locations:
  - front office
type: action
hookAliases:
 - deleteProductAttribute
---

# Hook actionProductAttributeDelete

Aliases: 
 - deleteProductAttribute



## Information

{{% notice tip %}}
**Product attribute deletion:** 

This hook is displayed when a product's attribute is deleted
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Product.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionProductAttributeDelete', ['id_product_attribute' => 0, 'id_product' => (int) $this->id, 'deleteAllAttributes' => true])
```