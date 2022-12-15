---
menuTitle: actionFeatureSave
Title: actionFeatureSave
hidden: true
hookTitle: Saving attributes' features
files:
  - classes/Feature.php
locations:
  - front office
type: action
hookAliases:
 - afterSaveFeature
---

# Hook actionFeatureSave

Aliases: 
 - afterSaveFeature



## Information

{{% notice tip %}}
**Saving attributes' features:** 

This hook is called while saving an attributes features
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Feature.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Feature.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionFeatureSave', ['id_feature' => $this->id])
```