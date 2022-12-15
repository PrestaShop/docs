---
menuTitle: actionFeatureValueSave
Title: actionFeatureValueSave
hidden: true
hookTitle: Saving an attributes features value
files:
  - classes/FeatureValue.php
locations:
  - front office
type: action
hookAliases:
 - afterSaveFeatureValue
---

# Hook actionFeatureValueSave

Aliases: 
 - afterSaveFeatureValue



## Information

{{% notice tip %}}
**Saving an attributes features value:** 

This hook is called while saving an attributes features value
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/FeatureValue.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/FeatureValue.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionFeatureValueSave', ['id_feature_value' => $this->id])
```