---
menuTitle: displayFeatureValuePostProcess
Title: displayFeatureValuePostProcess
hidden: true
hookTitle: On post-process in admin feature value
files:
  - controllers/admin/AdminFeaturesController.php
locations:
  - back office
type: display
hookAliases:
 - postProcessFeatureValue
---

# Hook displayFeatureValuePostProcess

Aliases: 
 - postProcessFeatureValue



## Information

{{% notice tip %}}
**On post-process in admin feature value:** 

This hook is called on post-process in admin feature value
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [controllers/admin/AdminFeaturesController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminFeaturesController.php)

## Call of the Hook in the origin file

```php
Hook::exec(
                'displayFeatureValuePostProcess',
                ['errors' => &$this->errors]
            )
```