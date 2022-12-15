---
menuTitle: actionProductSave
Title: actionProductSave
hidden: true
hookTitle: Saving products
files:
  - classes/Product.php
locations:
  - front office
type: action
hookAliases:
 - afterSaveProduct
---

# Hook actionProductSave

Aliases: 
 - afterSaveProduct



## Information

{{% notice tip %}}
**Saving products:** 

This hook is called while saving products
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Product.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionProductSave', ['id_product' => (int) $this->id, 'product' => $this])
```