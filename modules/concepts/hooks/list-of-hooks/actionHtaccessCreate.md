---
menuTitle: actionHtaccessCreate
Title: actionHtaccessCreate
hidden: true
hookTitle: After htaccess creation
files:
  - classes/Tools.php
locations:
  - front office
type: action
hookAliases:
 - afterCreateHtaccess
---

# Hook actionHtaccessCreate

Aliases: 
 - afterCreateHtaccess



## Information

{{% notice tip %}}
**After htaccess creation:** 

This hook is displayed after the htaccess creation
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Tools.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Tools.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionHtaccessCreate')
```