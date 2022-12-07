---
menuTitle: actionProductDelete
Title: actionProductDelete
hidden: true
hookTitle: Product deletion
files:
  - classes/Product.php
locations:
  - frontoffice
type:
  - action
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
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php](classes/Product.php)

## Hook call in codebase

```php
Hook::exec('actionProductDelete', ['id_product' => (int) $this->id, 'product' => $this])
```