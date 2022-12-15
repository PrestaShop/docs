---
menuTitle: actionAttributeDelete
Title: actionAttributeDelete
hidden: true
hookTitle: Deleting an attributes features value
files:
  - classes/ProductAttribute.php
locations:
  - front office
type: action
hookAliases:
 - afterDeleteAttribute
---

# Hook actionAttributeDelete

Aliases: 
 - afterDeleteAttribute



## Information

{{% notice tip %}}
**Deleting an attributes features value:** 

This hook is called while deleting an attributes features value
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/ProductAttribute.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ProductAttribute.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionAttributeDelete', ['id_attribute' => $this->id])
```