---
menuTitle: displayFeatureValuePostProcess
Title: displayFeatureValuePostProcess
hidden: true
hookTitle: On post-process in admin feature value
files:
  - controllers/admin/AdminFeaturesController.php
locations:
  - backoffice
type:
  - display
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
  - backoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminFeaturesController.php](controllers/admin/AdminFeaturesController.php)

## Hook call in codebase

```php
Hook::exec(
                'displayFeatureValuePostProcess',
                ['errors' => &$this->errors]
            )
```