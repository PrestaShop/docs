---
Title: actionLoggerLogMessage
hidden: true
hookTitle: 'Allows to make extra action while a log is triggered'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/log/AbstractLogger.php'
        file: classes/log/AbstractLogger.php
locations:
    - 'back office'
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows to make an extra action while an exception is thrown and the logger logs it'

---

{{% hookDescriptor %}}

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
