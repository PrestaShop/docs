---
menuTitle: actionExportGDPRData
Title: actionExportGDPRData
hidden: true
hookTitle: 
files:
  - modules/psgdpr/psgdpr.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionExportGDPRData

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/psgdpr/psgdpr.php](modules/psgdpr/psgdpr.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionExportGDPRData', $customer, $module['id_module'])
```