---
menuTitle: actionFeatureValueDelete
Title: actionFeatureValueDelete
hidden: true
hookTitle: Deleting attributes' features' values
files:
  - classes/FeatureValue.php
locations:
  - front office
type: action
hookAliases:
 - afterDeleteFeatureValue
---

# Hook actionFeatureValueDelete

Aliases: 
 - afterDeleteFeatureValue



## Information

{{% notice tip %}}
**Deleting attributes' features' values:** 

This hook is called while deleting an attributes features value
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/FeatureValue.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/FeatureValue.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionFeatureValueDelete', ['id_feature_value' => $this->id])
```