---
menuTitle: actionMailAlterMessageBeforeSend
Title: actionMailAlterMessageBeforeSend
hidden: true
hookTitle: 
files:
  - classes/Mail.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionMailAlterMessageBeforeSend

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Mail.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Mail.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionMailAlterMessageBeforeSend', [
                'message' => &$message,
            ])
```