---
menuTitle: actionFeatureValueSave
Title: actionFeatureValueSave
hidden: true
hookTitle: Saving an attributes features value
files:
  - classes/FeatureValue.php
locations:
  - frontoffice
type:
  - action
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
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/FeatureValue.php](classes/FeatureValue.php)

## Hook call in codebase

```php
Hook::exec('actionFeatureValueSave', ['id_feature_value' => $this->id])
```