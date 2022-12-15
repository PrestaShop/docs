---
menuTitle: actionProductDelete
Title: actionProductDelete
hidden: true
hookTitle: Product deletion
files:
  - classes/Product.php
locations:
  - front office
type: action
hookAliases:
 - deleteproduct
---

# Hook actionProductDelete

Aliases: 
 - deleteproduct



## Information

{{% notice tip %}}
**Product deletion:** 

This hook is called when a product is deleted
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Product.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionProductDelete', ['id_product' => (int) $this->id, 'product' => $this])
```