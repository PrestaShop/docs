---
menuTitle: actionLoggerLogMessage
Title: actionLoggerLogMessage
hidden: true
hookTitle: Allows to make extra action while a log is triggered
files:
 - classes/log/AbstractLogger.php
locations:
 - back office
 - front office
type: action
hookAliases:
---

# Hook actionLoggerLogMessage {{< minver v="8.1" >}}

## Information

{{% notice tip %}}
**Allows to make extra action while a log is triggered** 
{{% /notice %}}

Hook locations:
- back office
- front office

Hook type: action

Located in:
- [classes/log/AbstractLogger.php](https://github.com/PrestaShop/PrestaShop/blob/8.1.x/classes/log/AbstractLogger.php)

## Call of the Hook in the origin file

```php
Hook::exec(
    'actionLoggerLogMessage',
    [
        'message' => $message,
        'level' => $level,
        'isLogged' => $level >= $this->level,
    ]
);
```
