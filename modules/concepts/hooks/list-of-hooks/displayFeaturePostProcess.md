---
menuTitle: displayFeaturePostProcess
Title: displayFeaturePostProcess
hidden: true
hookTitle: On post-process in admin feature
files:
  - controllers/admin/AdminFeaturesController.php
locations:
  - back office
type: display
hookAliases:
 - postProcessFeature
---

# Hook displayFeaturePostProcess

Aliases: 
 - postProcessFeature



## Information

{{% notice tip %}}
**On post-process in admin feature:** 

This hook is called on post-process in admin feature
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [controllers/admin/AdminFeaturesController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminFeaturesController.php)

## Call of the Hook in the origin file

```php
Hook::exec(
                'displayFeaturePostProcess',
                ['errors' => &$this->errors]
            )
```