---
menuTitle: actionFeatureDelete
Title: actionFeatureDelete
hidden: true
hookTitle: Deleting attributes' features
files:
  - classes/Feature.php
locations:
  - front office
type: action
hookAliases:
 - afterDeleteFeature
---

# Hook actionFeatureDelete

Aliases: 
 - afterDeleteFeature



## Information

{{% notice tip %}}
**Deleting attributes' features:** 

This hook is called while deleting an attributes features
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Feature.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Feature.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionFeatureDelete', ['id_feature' => $this->id])
```